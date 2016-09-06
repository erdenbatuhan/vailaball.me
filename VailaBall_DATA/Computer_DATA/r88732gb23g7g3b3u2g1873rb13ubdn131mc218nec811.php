<?php
    /* ========== VARIABLES FOR HOST ========== */
    $hostName     = "localhost";
    $hostUser     = "root";
    $hostPassword = "fgvttv5yybb1";
    $database     = "VailaBall";

    /* ========== VARIABLES FOR USER ========== */
    $username = $_POST["form_username"];
    $password = $_POST["form_password"];

    // Make Connection
    $connection = new mysqli($hostName, $hostUser, $hostPassword, $database);

    // Check Connection
    if (!$connection)
        die("Connection Failed. ". mysqli_connect_error());
    
    // Make SQL Query
    if ($username && $password) {
        $sql_query = "INSERT INTO Users (Username, Password, LevelsCompleted, Skin) VALUES ('$username', '$password', 0, 0)";
        $sql_result = mysqli_query($connection, $sql_query);
    }

    // Close Connection
    mysqli_close($connection);
?>
