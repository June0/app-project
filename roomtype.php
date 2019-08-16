<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="welcome2.css">
<link rel="stylesheet" href="registration.css" type="text/css">
<title>Adding Room</title>
</head>
<body>
	<?php
	session_start();
	$username=$_SESSION['username'];
	$id=$_SESSION['id'];
	$idhouse=$_SESSION['idhouse'];
	print "<h3>"."Welcome"." ".$_SESSION["username"]."</h3>"."<br>";										// printing username that value store in session variable
	print "<h3>"."Welcome"." ".$_SESSION["idhouse"]."</h3>"."<br>";												//Checking id value is coming or not
	echo "<br>"."<ul>";
	echo "<li>"."<a href='profile.php'>"."Edit Profile"."</a>"."</li>";
	echo "<li>"."<a href='addhomepage1.php'>"."Add New House"."</a>"."</li>";
	echo "<li>"."<a href='edithomedetail.php'>"."View House Detail"."</a>"."</li>";
	//echo "<li>"."<a href='editroomdetail.php'>"."View Room Detail"."</a>"."</li>";
	echo "<li>"."<a href='login.html'>"."Logout"."</a>"."</li>";
	echo "</ul>";
$dbConfig = require './config/db.php';
$conn=mysqli_connect($dbConfig['host'], $dbConfig['user'], $dbConfig['pwd'], $dbConfig['db']);
	if(!$conn){
		die("Connection failed". mysqli_connect_error());
	}
	$roomtype=$_POST['roomtype'];
	$roomname=$_POST['roomname'];
	$sql1 = "SELECT * FROM typeroom WHERE typename= '$roomtype'";
	$result = mysqli_query($conn, $sql1);
	while ($row = mysqli_fetch_assoc($result)) {
		$idtyperoom=$row['idTyperoom'];
		$_SESSION['idtyperoom']=$idtyperoom;
		echo "Typeroom".$_SESSION['idtyperoom'];
	}
	$sql="INSERT INTO roomname (roomname,idHouse,idTyperoom) VALUES('$roomname','$idhouse','$_SESSION[idtyperoom]')";
	if(mysqli_query($conn,$sql)){
		echo "<script>alert('Room added successfully');location.href='edithomedetail.php'</script>";
	}
	else{
		echo "Error creating database". mysqli_error($conn);
	}
	mysqli_close($conn);
	
	?>