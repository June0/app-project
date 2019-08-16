<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Specify Room Type</title>
<link rel="stylesheet" type="text/css" href="welcome2.css">
<link rel="stylesheet" href="registration.css" type="text/css">
<script src="roomtype2.js"></script>
</head>
<body>
<form name="myForm" onsubmit="return validateMyForm()" action="roomtype.php" method="post">
	<?php 
	session_start();
	$username=$_SESSION['username'];
	$idhouse=$_GET['idhouse'];
	$_SESSION['idhouse']=$idhouse;
	echo "<div id='header1'><h3>Welcome ".$_SESSION["username"]."<h3></div><br>";
    $dbConfig = require './config/db.php';
    $conn=mysqli_connect($dbConfig['host'], $dbConfig['user'], $dbConfig['pwd'], $dbConfig['db']);
	if(!$conn){
		die("Connection failed". mysqli_connect_error());
	}
	$sql = "SELECT * FROM house WHERE idHouse= '$idhouse'";
	$result = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_array($result)) {
		echo "<div id='header1'><h3>Add room on house no ". $row['house_no']."<h3></div><br>";
	}
	
	?>									
	<ul>
		<li><a href="profile.php">Edit Profile</a></li>
		<li><a href="addhomepage1.php">Add New House</a></li>
		<li><a href="edithomedetail.php">View House Detail</a></li>
		<!--  <li><a href="editroomdetail.php">View Room Detail</a></li>-->
		<li><a href="login.html">Logout</a></li>
	</ul>
	<div id="content" align="center">
			<fieldset style="width:80%">
				<legend>Specify Room Type</legend>
				<select name="roomtype">
					  <option  value="Living Room">Living Room</option>
					  <option  value="Bedroom">Bedroom</option>
					  <option  value="Kitchen">Kitchen</option>
					  <option  value="Bathroom">Bathroom</option>
					  <option  value="Toilet">Toilet</option>
					  <option value="Other">Other</option>
					</select>
				<label>Name of Room</label> <input type="text" name="roomname"> <br>
				<input type="submit" name="room" value="Add Room">
			</fieldset>
		</div>
	</form>

</body>
</html>