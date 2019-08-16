<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="welcome2.css">
<link rel="stylesheet" href="registration.css" type="text/css">
<title>Adding Home Address</title>
</head>
<body>
<?php
	session_start();
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
	/*echo "<form name=myForm onsubmit='return validateMyForm()' action='' method=post>";
	echo "<div align=center>";
	echo "<fieldset style=width:80%>";
	echo "<legend>". "Address" . "</legend>";
	echo "<label>" . "House no"."</label>" . "<input type=text name=house" . " <br>";
	echo "<label>" . "Street"."</label>" . "<input type=text name=street" . " <br>";
	echo "<label>" . "City"."</label>" . "<input type=text name=city" . " <br>";
	echo "<label>" . "Pincode"."</label>" . "<input type=number name=pincode" . " <br>";
	echo "<label>" . "Country"."</label>" . "<input type=text name=country" . " <br>";
	echo "</br>";
	echo "<center>"."<input type=submit name=home value=Add Address Details>"."</center>";
	echo "</fieldset>";
	echo "</div>";
	echo "</form>";*/
		$house=$_POST['house'];
		$street=$_POST['street'];
		$city=$_POST['city'];
		$pincode=$_POST['pincode'];
		$country=$_POST['country'];
	/*$sql1="SELECT idUser from user where username='".$_SESSION["username"]."'";
	$result1 = mysqli_query($conn,$sql1);
	$row1=mysqli_fetch_assoc($result1);*/
			$sql="INSERT INTO house (house_no,street,city,pincode,country,idUser) VALUES('$house','$street','$city','$pincode','$country','$_SESSION[id]')";
			if(mysqli_query($conn,$sql)){
				echo "<script>alert('House added successfully');location.href='edithomedetail.php'</script>";
			}
			else{
				echo "Error creating database". mysqli_error($conn);
			}
			/*function alert($tip = "", $type = "", $url = "") {
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
			}*/
			
	mysqli_close($conn);
	/*$sql1 = "SELECT * FROM house WHERE idUser= '$id'";
	$result = mysqli_query($conn, $sql1);
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<form action='' method=post>";
		echo "<div align=center>";
		echo "<fieldset style=width:80%>";
		echo "<legend>". "Address" . "</legend>";
		echo "<label>" . "House no"."</label>" . "<input type=text name=house value=" . $row['house_no'] . " <br>";
		echo "<label>" . "Street"."</label>" . "<input type=text name=street value=" . $row['street'] . " <br>";
		echo "<label>" . "City"."</label>" . "<input type=text name=city value=" . $row['city'] . " <br>";
		echo "<label>" . "Pincode"."</label>" . "<input type=number name=pincode value=" . $row['pincode'] . " <br>";
		echo "<label>" . "Country"."</label>" . "<input type=text name=country value=" . $row['country'] . " <br>";
		echo  "<input type=hidden name=id value=" . $row['idUser'];
		echo "</br>";
		echo "<center>"."<input type=submit name=update value=Edit/Update>"."</center>";
		echo "</fieldset>";
		echo "</div>";
		echo "</form>";
	}*/
	
?>
</body>
</html>
