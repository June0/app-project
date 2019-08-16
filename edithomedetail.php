<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" type="text/css" href="welcome2.css">
 <!--  <link rel="stylesheet" href="registration.css" type="text/css">-->
<!--  <link rel="stylesheet" type="text/css" href="edithomedetailpage.css">-->
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
	echo "</ul><br><br>";
    $dbConfig = require './config/db.php';
    $conn=mysqli_connect($dbConfig['host'], $dbConfig['user'], $dbConfig['pwd'], $dbConfig['db']);
	if(!$conn){
		die("Connection failed". mysqli_connect_error());
	}
	if(isset($_POST['update'])){
		$update = "update house set house_no='$_POST[house]', street='$_POST[street]', city='$_POST[city]', pincode='$_POST[pincode]', country='$_POST[country]' WHERE idHouse='$_POST[idhouse]'";
		if(mysqli_query($conn,$update)){
			echo "<script>alert('Database updated successfully')</script>";
		}
		else{
			echo "Error updating database". mysqli_error($conn);
		}
	}
	/*if(isset($_POST['addroom'])){
		$sql1 = "Select * from house where idHouse='$_POST[idhouse]'";
		$result1 = mysqli_query($conn, $sql1);
		while ($row1 = mysqli_fetch_array($result1)) {
			$idhouse=$row1['idHouse'];
			$_SESSION['idhouse']=$idhouse;
			echo $_SESSION['idhouse'];
		}
			
	}*/
	$sql = "SELECT * FROM house WHERE idUser= '$id'";
	$result = mysqli_query($conn, $sql);
	echo "<table border=1 align=center>     																	
	 <tr>
	 <th>House No</th>
	 <th>Street</th>
	 <th>City</th>
	 <th>Pincode</th>
	 <th>Country</th>
	 </tr>";
	while ($row = mysqli_fetch_array($result)) {
		echo "<form action='' method='post'>";
		/*$idhouse=$row['idHouse'];
		$_SESSION['idhouse']=$idhouse;*/
		echo "<tr>";
		echo "<td>" . "<input type='text' name='house' value='" . $row['house_no'] . "' </td>";
		echo "<td>" . "<input type='text' name='street' value='" . $row['street'] . "' </td>";
		echo "<td>" . "<input type='text' name='city' value='" . $row['city'] . "' </td>";
		echo "<td>" . "<input type='number' name='pincode' value='" . $row['pincode'] . "' </td>";
		echo "<td>" . "<input type='text' name='country' value='" . $row['country'] . "' </td>";;
		echo "<td>" . "<input type='hidden' name='id' value='" . $row['idUser'] . "' </td>";
		echo "<td>" . "<input type='text' name='idhouse' value='" . $row['idHouse'] . "' </td>";
		echo "<td>" . "<input type='submit' name='update' value='Update'>". " </td>";
		//echo "<td>" . "<input type='submit' name='addroom' value='Add Room'>". " </td>";
		//echo "<td>" . "<input type='button' onclick=location.href='roomtype1.php'?".$row['idHouse']. "value='Add Room' >" . "</button>" . "</td>";
		echo "<td>" . "<a name='addroom' href=roomtype1.php?idhouse=".$row['idHouse'].">Add Room</a></td>";
		echo "<td>" . "<a name='viewroom' href=editroomdetail.php?idhouse=".$row['idHouse'].">View Room</a></td>";
		echo "</tr>";
		echo "</form>";
	}
	echo "</table>"."</br>";
?>
</body>
</html>
