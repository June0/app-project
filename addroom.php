<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="addroom1.css" type="text/css">
<title>Insert title here</title>
</head>
<body>
	<?php
	session_start();
	$username=$_SESSION['username'];
	$idhouse=$_SESSION['idhouse'];
	print "<h3>"."Welcome"." ".$_SESSION["username"]."</h3>"."<br>";										// printing username that value store in session variable
	//print "<h3>"."Welcome"." ".$_SESSION["id"]."</h3>"."<br>";												Checking id value is coming or not
	echo "<br>"."<ul>";
	echo "<li>"."<a href='profile.php'>"."Edit Profile"."</a>"."</li>";
	echo "<li>"."<a href='addhomepage1.html'>"."Add New Home"."</a>"."</li>";
	echo "<li>"."<a href='edithomedetail.php'>"."View Home Detail"."</a>"."</li>";
	echo "<li>"."<a href='login.html'>"."Logout"."</a>"."</li>";
	$dbname='appproject';
	$conn=mysqli_connect('localhost','root','',$dbname);
	if(!$conn){
		die("Connection failed". mysqli_connect_error());
	}
	$livingroom=$_POST['living'];
	$bedroom=$_POST['bedroom'];
	$kitchen=$_POST['kitchen'];
	$bathroom=$_POST['bathroom'];
	$toilet=$_POST['toilet'];
	$sql="INSERT INTO room (idRoom,livingroom,kitchen,bedroom,bathroom,toilet,idHouse) VALUES(NULL,'$livingroom','$kitchen','$bedroom','$bathroom','$toilet','$_SESSION[idhouse]')";
	if(mysqli_query($conn,$sql)){
		alert("registed suc","jump","");
	}
	else{
		echo "Error creating database". mysqli_error($conn);
	}
	function alert($tip = "", $type = "", $url = "") {
		$js = "<script>";
		if ($tip)
			$js .= "alert('" . $tip . "');";
			switch ($type) {
					
				case "jump" : //跳转
					if ($url)
						$js .= "window.location.href='" . $url . "';";
						break;
				default :
					break;
			}
			$js .= "</script>";
			echo $js;
			if ($type) {
				exit();
			}
	}
		
	mysqli_close($conn)
			
	?>
</body>
</html>

