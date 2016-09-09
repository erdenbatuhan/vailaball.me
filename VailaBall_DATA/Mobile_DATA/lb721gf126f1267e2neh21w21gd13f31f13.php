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
    $rank = 0;

    /* ========== HASH CODES ========== */
    $unityHash = $_POST["form_hash"];
    $phpHash = "y17rct1y894bt1274128c41n2y7e12he9128bcr7g21wqbuqiubqwpqhex27egc12hr137r";

    // Make SQL Query
    $sql_query = "SELECT Username, Score FROM MobileUsers ORDER BY Score DESC";
    $sql_result = mysqli_query($connection, $sql_query);

    // Print Result
    if ($unityHash != $phpHash && false) {
        echo "Hash codes won't match up!";
    } else {
        for ($count = 1; $row = mysqli_fetch_assoc($sql_result); $count++) {  
            if (!strcmp($username, $row['Username']))
	        $rank = $count;

	    if (count <= 10)	
	    	echo $row['Username'] . "|" . $row['Score'] . "|";
	    else if ($rank)
            	break;
        }

	echo $rank;
    }

    // Close Connection
    mysqli_close($connection);
?>
