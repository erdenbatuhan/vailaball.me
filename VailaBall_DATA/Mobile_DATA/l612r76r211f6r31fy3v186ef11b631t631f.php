<?php
    /* ========== VARIABLES FOR HOST ========== */
    $hostName     = "localhost";
    $hostUser     = "root";
    $hostPassword = "fgvttv5yybb1";
    $database     = "FlappyBall";

    // Make Connection
    $connection = new mysqli($hostName, $hostUser, $hostPassword, $database);

    // Check Connection
    if (!$connection)
        die("Connection Failed. ". mysqli_connect_error());
 
    /* ========== VARIABLES FOR USER ========== */
    $username = protectNicknameFromInjection($_POST["form_username"]);
    $password = protectPasswordFromInjection($_POST["form_password"]);

    /* ========== HASH CODES ========== */
    $unityHash = $_POST["form_hash"];
    $phpHash = "y17rct1y894bt1274128c41n2y7e12he9128bcr7g21wqbuqiubqwpqhex27egc12hr137r";

    // Make SQL Query
    $sql_query = "SELECT * FROM Users WHERE Username = '$username'";
    $sql_result = mysqli_query($connection, $sql_query);
    $num_of_rows = mysqli_num_rows($sql_result);
    
    // Check Results
    if (!$username || !$password) {
        echo "Username or password cannot be empty.";
    } else {
        if ($unityHash != $phpHash) {
            echo "Hash codes won't match up!";
        } else {
            if ($num_of_rows) {
                $row = mysqli_fetch_assoc($sql_result);

                if (!strcmp($password, md5(trim($row["Password"]))))
                    echo "Login succeeded!";
                else
                    echo "Password that you typed is wrong.";
            } else {
                echo "Username that you typed is wrong.";
            }
        }
    }

    // Close Connection
    mysqli_close($connection);

    // ================ Nickname protection against SQL injection ================
    function protectNicknameFromInjection($sql, $formUse = true) {
        $sql = preg_replace("/(from|select|insert|delete|where|drop table|show tables|,|'|#|\*|--|\\\\)/i", "", $sql);
        $sql = trim($sql);
        $sql = strip_tags($sql);
        
        if(!$formUse || !get_magic_quotes_gpc())
            $sql = addslashes($sql);

        return $sql;
    }

    // ================ Password protection against SQL injection ================
    function protectPasswordFromInjection($sql, $formUse = true) {
        $sql = preg_replace("/(from|select|insert|delete|where|drop table|show tables|,|'|#|\*|--|\\\\)/i", "", $sql);
        $sql = trim($sql);
        $sql = strip_tags($sql);

        if(!$formUse || !get_magic_quotes_gpc())
            $sql = addslashes($sql);

        $sql = md5(trim($sql));

        return $sql;
    }
?>