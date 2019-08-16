<?php
session_start();
$username=$_SESSION['username'];
$id=$_SESSION['id'];
if(!isset($_SESSION["username"])){
	header("Location:login.html");
	exit();
}
//print "<h3>"."Welcome"." ".$_SESSION["id"]."</h3>"."<br>";
echo "<div id='header1'><h3>Welcome ".$_SESSION["username"]."<h3></div><br>";
echo "<div id='body'>";
echo "<div id='menu'>";
echo "<br>"."<ul>";
echo "<li>"."<a href='profile.php'>"."Edit Profile"."</a>"."</li>";
echo "<li>"."<a href='addhomepage1.php'>"."Add New House"."</a>"."</li>";
echo "<li>"."<a href='edithomedetail.php'>"."View House Detail"."</a>"."</li>";
//echo "<li>"."<a href='editroomdetail.php'>"."View Room Detail"."</a>"."</li>";
echo "<li>"."<a href='login.html'>"."Logout"."</a>"."</li>";
echo "</ul>";
echo "</div>";
echo "<div id='content'>";
echo "</div></div>"
?>

<!-- HTML Code -->
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="welcome2.css">
<script src="welcome1.js"></script>
<title>Insert title here</title>
</head>
<body>
</body>
</html>