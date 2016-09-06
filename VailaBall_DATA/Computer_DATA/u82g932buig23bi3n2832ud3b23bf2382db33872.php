<?php
    /* ========== VARIABLES FOR HOST ========== */
    $hostName     = "localhost";
    $hostUser     = "root";
    $hostPassword = "fgvttv5yybb1";
    $database     = "VailaBall";

    /* ========== VARIABLES FOR USER ========== */
    $id = $_POST["form_id"];
    $username = $_POST["form_username"];
    $password = $_POST["form_password"];
    $levelsCompleted = $_POST["form_levelsCompleted"];
    $skin = $_POST["form_skin"];

    // Make Connection
    $connection = new mysqli($hostName, $hostUser, $hostPassword, $database);

    // Check Connection
    if (!$connection)
        die("Connection Failed. ". mysqli_connect_error());
        
    // Make SQL Query
    $sql_query = "UPDATE ComputerUsers SET Username = '$username', Password = '$password', LevelsCompleted = $levelsCompleted, Skin = $skin WHERE ID = $id";
    $sql_result = mysqli_query($connection, $sql_query);

    // Close Connection
    mysqli_close($connection);
?>
