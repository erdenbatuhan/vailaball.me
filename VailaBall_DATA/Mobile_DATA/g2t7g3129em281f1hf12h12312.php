<?php
    /* ========== VARIABLES FOR HOST ========== */
    $hostName     = "localhost";
    $hostUser     = "root";
    $hostPassword = "fgvttv5yybb1";
    $database     = "VailaBall";

    // Make Connection
    $connection = new mysqli($hostName, $hostUser, $hostPassword, $database);

    // Check Connection
    if (!$connection)
        die("Connection Failed. ". mysqli_connect_error());
 
    /* ========== VARIABLES FOR USER ========== */
    $username = $_POST["form_username"];

    /* ========== HASH CODES ========== */
    $unityHash = $_POST["form_hash"];
    $phpHash = "y17rct1y894bt1274128c41n2y7e12he9128bcr7g21wqbuqiubqwpqhex27egc12hr137r";

    // Make SQL Query
    $sql_query = "SELECT ID, Username, Score FROM MobileUsers WHERE Username = '$username'";
    $sql_result = mysqli_query($connection, $sql_query);

    // Print Result
    if ($unityHash != $phpHash)
        echo "Hash codes won't match up!";
    else if ($row = mysqli_fetch_assoc($sql_result))
        echo $row['ID'] . "|" . $row['Username'] . "|" . $row['Score'];

    // Close Connection
    mysqli_close($connection);
?>