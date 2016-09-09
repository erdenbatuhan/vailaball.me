<!DOCTYPE html>
<html lang="tr">
<head>
    <title> Leaderboard - A Vaila Ball </title>
    <link rel="stylesheet" href="../include/css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="../include/css/styleutiful.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <script src="../include/js/bootstrap.js"></script>
</head>
<body style="background-color: whitesmoke;">
    <nav class="navbar navbar-light navbar-fixed-top bg-primary" style="border-radius: 0px; border-bottom-style: groove; border-bottom-color: black; border-bottom-width: 3px;">
        <div class="container-fluid">
            <a class="navbar-brand" style="color: whitesmoke;" href="../"><h3>A Vai<span>la Ball</span></h3></a>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <p class="navbar-btn">
                         <a href="../Download" class="btn btn-success btn-sm" role="button" aria-pressed="true"> Download </a>
                    </p>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
	<div class="text-center">
        <br><br><br>
        <hr style="border-top: 1px solid #3c763d;">
			<h1 style="color: darkred;"> LEADERBOARD </h1>
        <hr style="border-top: 1px solid #3c763d;">
	</div>
  <table id="table" class="table table-hover table-mc-light-blue">
      <thead>
        <tr>
          <th>Rank</th>
          <th>Username</th>
          <th>Score</th>
        </tr>
      </thead>
      <tbody>
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
    $sql_query = "SELECT ID, Username, Score FROM MobileUsers ORDER BY Score DESC";
    $sql_result = mysqli_query($connection, $sql_query);

    // Print Result
	for ($count = 1; $row = mysqli_fetch_assoc($sql_result); $count++) {
		echo $GET['ID'];
		if ($_GET['ID'] == $row['ID'])
			echo "<tr>
					<td data-title='Rank' style='color: red;'>" . $count . "</td>
					<td data-title='Username' style='color: red;'>" . $row['Username'] . "</td>
					<td data-title='Score' style='color: red;'>" . $row['Score'] . "</td>
				  </tr>";
		else
			echo "<tr>
					<td data-title='Rank'>" . $count . "</td>
					<td data-title='Username'>" . $row['Username'] . "</td>
					<td data-title='Score'>" . $row['Score'] . "</td>
				  </tr>";
	}

    // Close Connection
    mysqli_close($connection);
?>
      </tbody>
    </table>
</div>
<br><br><br><br>
    <?php include "../footer.php"  ?>
</body>
</html>