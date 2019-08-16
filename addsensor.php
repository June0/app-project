<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="welcome2.css">
<link rel="stylesheet" href="registration.css" type="text/css">
<title>Add Sensor</title>
</head>
<body>
	<form name="myForm" onsubmit="return validateMyForm()" action="addsensor1.php" method="post">
		<?php 
			session_start();
			$username=$_SESSION['username'];
			$idroom=$_GET['idroomname'];
			$_SESSION['idroomname']=$idroom;
			//$_SESSION['idhouse']=$idhouse;
			echo "<div id='header1'><h3>Welcome ".$_SESSION["username"]."<h3></div><br>";
			$dbname='appproject';
			$conn=mysqli_connect('localhost','root','',$dbname);
			if(!$conn){
				die("Connection failed". mysqli_connect_error());
			}
			$sql = "SELECT * FROM roomname WHERE idRoomname= '$idroom'";
			$result = mysqli_query($conn, $sql);
			while ($row = mysqli_fetch_array($result)) {
				echo "<div id='header1'><h3>Add sensor on room whose name is ". $row['roomname']."<h3></div><br>";
			}
			//echo "Add sensor on room ". $_SESSION['idroomname'];
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

						Temperature:<input type="checkbox" name="sensor[]" value="temp"> <br>
						Humidity:<input type="checkbox" name="sensor[]" value="humi"><br>
						Light: <input type="checkbox" name="sensor[]" value="lamp"><br>
						<input type="submit" class="submit button" name="submit" value="submit" />	
					</fieldset>
			</div>
		</form>
</body>
</html>

