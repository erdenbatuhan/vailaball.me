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
    $score = $_POST["form_score"];

    /* ========== HASH CODES ========== */
    $unityHash = $_POST["form_hash"];
    $phpHash = "y17rct1y894bt1274128c41n2y7e12he9128bcr7g21wqbuqiubqwpqhex27egc12hr137r";

    // Make SQL Query
    if ($unityHash != $phpHash) {
        echo "Hash codes won't match up!";
    } else {
        $sql_query = "UPDATE Users SET Score = $score WHERE Username = '$username'";
        $sql_result = mysqli_query($connection, $sql_query);
        echo "Saving succeeded!";
    }

    // Close Connection
    mysqli_close($connection);
?>
