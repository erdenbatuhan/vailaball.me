<!DOCTYPE html>
<html lang="tr">
<head>
    <title> Leaderboard - A Vaila Ball </title>
    <link rel="stylesheet" href="../include/css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="../include/css/styleutiful.css">
	<link rel="stylesheet" href="../include/css/table-responsive.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <script src="../include/js/bootstrap.js"></script>
    <script src="../include/js/table-responsive.js"></script>
</head>
<body style="background-color: whitesmoke;">
    <nav class="navbar navbar-light navbar-fixed-top bg-primary" style="border-radius: 0px; border-bottom-style: groove; border-bottom-color: black; border-bottom-width: 3px;">
        <div class="container-fluid">
            <a class="navbar-brand" style="color: whitesmoke;" href="../"><h3>A Vai<span>la Ball</span></h3></a>
        </div>
    </nav>
    <div id="demo" class="container text-center">
        <br>
        <hr style="border-top: 1px solid #3c763d;">
  <h1 style="color: darkred;"> LEADERBOARD </h1>
        <hr style="border-top: 1px solid #3c763d;">
  <div class="table-responsive-vertical shadow-z-1">
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
    $sql_query = "SELECT Username, Score FROM MobileUsers ORDER BY Score DESC";
    $sql_result = mysqli_query($connection, $sql_query);

    // Print Result
	for ($count = 1; $row = mysqli_fetch_assoc($sql_result); $count++)
		echo "<tr>
				<td data-title='Rank'>" . $count . "</td>
				<td data-title='Username'>" . $row['Username'] . "</td>
				<td data-title='Score'>" . $row['Score'] . "</td>
			  </tr>";

    // Close Connection
    mysqli_close($connection);
?>
      </tbody>
    </table>
  </div>
</div>
<br><br><br><br>
    <nav class="navbar navbar-light navbar-fixed-bottom bg-danger footer" style="border-radius: 0px; padding-top: 10px;">
        <div class="container text-center">
            <a href="https://www.facebook.com/batuhanerden" target="_blank"><span class="fa fa-facebook sep grow---"></span></a>
			<a href="https://www.twitter.com" target="_blank"><span class="fa fa-twitter sep grow---"></span></a>
			<a href="https://www.linkedin.com/in/batuhan-erden-76686b117?authType=NAME_SEARCH&authToken=6tCO&locale=en_US&trk=tyah&trkInfo=clickedVertical%3Amynetwork%2CclickedEntityId%3A488850558%2CauthType%3ANAME_SEARCH%2Cidx%3A1-1-1%2CtarId%3A1472827096958%2Ctas%3Abatuhan%20erden" target="_blank"><span class="fa fa-linkedin sep grow---"></span></a>
			<a href="https://github.com/erdenbatuhan/" target="_blank"><span class="fa fa-github sep grow---"></span></a>
        </div>
    </nav>
</body>
</html>