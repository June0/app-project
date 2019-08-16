<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="welcome2.css">
<link rel="stylesheet" href="registration.css" type="text/css">
<title>Insert title here</title>
</head>
<body>
<?php
	$username=$_SESSION['username'];
	$id=$_SESSION['id'];
	print "<h3>"."Welcome"." ".$_SESSION["username"]."</h3>"."<br>";										// printing username that value store in session variable
	//print "<h3>"."Welcome"." ".$_SESSION["id"]."</h3>"."<br>";												Checking id value is coming or not
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
	if(isset($_POST['update'])){
		$update = "update user set username='$_POST[username]', password='$_POST[password]', email='$_POST[email]', phone_no='$_POST[phone]', street='$_POST[street]', city='$_POST[city]', country='$_POST[country]' WHERE `user`.idUser='$_POST[id]'";
		if(mysqli_query($conn,$update)){
			echo "<script>alert('Database updated successfully')</script>";
		}
		else{
			echo "Error updating database". mysqli_error($conn);
		}
	}
	$sql = "SELECT * FROM user WHERE idUser= '$id'";
	$result = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<div id='content' align=center>";
		echo "<form action='' method=post>";
		echo "<fieldset style=width:80%>";
		echo "<legend>". "Profile Details" . "</legend>";
		echo "<label>" . "Username"."</label>" . "<input type='text' name='username' value='" . $row['username'] . "' <br>";
		echo "<label>" . "Password"."</label>" . "<input type='password' name='password' value='" . $row['password'] . "' <br>";
		echo "<label>" . "Email"."</label>" . "<input type='text' name='email' value='" . $row['email'] . "' <br>";
		echo "<label>" . "Phone"."</label>" . "<input type='number' name='phone' value='" . $row['phone_no'] . "' <br>";
		echo "<label>" . "Street"."</label>" . "<input type='text' name='street' value='" . $row['street'] . "' <br>";
		echo "<label>" . "City"."</label>" . "<input type='text' name='city' value='" . $row['city'] . "' <br>";
		echo "<label>" . "Country"."</label>" . "<input type='text' name='country' value='" . $row['country'] . "' <br>";
		echo  "<input type='hidden' name='id' value=" . $row['idUser'];
		echo "</br>";
		echo "<center>"."<input type='submit' name='update' value='Edit/Update'>"."</center>";
		echo "</fieldset>";
		echo "</form>";
		echo "</div>";	
	}
?>
</body>
</html>
