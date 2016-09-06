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

    // Make SQL Query
    $sql_query = "SELECT * FROM ComputerUsers";
    $sql_result = mysqli_query($connection, $sql_query);

    // Fetch Results
    if (mysqli_num_rows($sql_result) > 0)
        while ($row = mysqli_fetch_assoc($sql_result))
            echo $row['ID']              . "|" . 
                 $row['Username']        . "|" . 
                 $row['Password']        . "|" . 
                 $row['LevelsCompleted'] . "|" . 
                 $row['Skin']            . ";" ;
    else
        echo "null|null|null|null|null;";

    // Close Connection
    mysqli_close($connection);
?>
