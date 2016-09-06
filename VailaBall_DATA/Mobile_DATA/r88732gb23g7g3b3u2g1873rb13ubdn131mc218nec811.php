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
    $username = $_POST["form_username"];
    $password = $_POST["form_password"];

    /* ========== HASH CODES ========== */
    $unityHash = $_POST["form_hash"];
    $phpHash = "y17rct1y894bt1274128c41n2y7e12he9128bcr7g21wqbuqiubqwpqhex27egc12hr137r";
    
    // Make SQL Query
    $sql_query = "SELECT Username FROM Users WHERE Username = '$username'";
    $sql_result = mysqli_query($connection, $sql_query);
    $num_of_rows = mysqli_num_rows($sql_result);

    // Check Results and Make SQL Query
    if (!$username || !$password) {
        echo "Username or password cannot be empty.";
    } else {
        if ($unityHash != $phpHash) {
            echo "Hash codes won't match up!";
        } else {
            if ($num_of_rows) {
                echo "Username that you typed already exists.";
            } else {
                $sql_query = "INSERT INTO Users (Username, Password, Score) VALUES ('$username', '$password', 0)";
                $sql_result = mysqli_query($connection, $sql_query);

                echo "Register succeeded!";
            }
        }
    }
    
    // Close Connection
    mysqli_close($connection);
?>
