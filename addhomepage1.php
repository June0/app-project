<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Insert title here</title>
<link rel="stylesheet" type="text/css" href="welcome2.css">
<script src="addhomepage.js"></script>
<link rel="stylesheet" href="registration.css" type="text/css">
</head>
<body>
	<form name="myForm" onsubmit="return validateMyForm()" action="addhome.php" method="post">
	<?php
	session_start();
	$username=$_SESSION['username'];
	echo "<div id='header1'><h3>Welcome ".$_SESSION["username"]."<h3></div><br>";
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
				<legend>Address</legend>
				<label>House no</label> <input type="text" name="house"> <br>
				<label>Street</label> <input type="text" name="street"> <br>
				<label>City</label><input type="text" name="city"> <br>
				<label>Pincode</label><input type="number" name="pincode"> <br>
				<label>Country</label><input type="text" name="country"> <br>
				<input type="submit" name="home" value="Add Address Details">
			</fieldset>
		</div>
	</form>
</body>
</html>