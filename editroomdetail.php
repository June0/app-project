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
<title>View Room Detail</title>
</head>
<body>
<?php
	$username=$_SESSION['username'];
	$id=$_SESSION['id'];
	$idhouse=$_GET['idhouse'];
	print "<h3>"."Welcome"." ".$_SESSION["username"]."</h3>"."<br>";										// printing username that value store in session variable
	//print "<h3>"."Welcome"." ".$_GET["idhouse"]."</h3>"."<br>";												//Checking id value is coming or not
$dbConfig = require './config/db.php';
$conn=mysqli_connect($dbConfig['host'], $dbConfig['user'], $dbConfig['pwd'], $dbConfig['db']);
	if(!$conn){
		die("Connection failed". mysqli_connect_error());
	}
	$sql1 = "SELECT * FROM house WHERE idHouse= '$idhouse'";
	$result1 = mysqli_query($conn, $sql1);
	while ($row1 = mysqli_fetch_array($result1)) {
		echo "<div id='header1'><h3>Rooms present in house no ". $row1['house_no']."<h3></div><br>";
	}
	echo "<br>"."<ul>";
	echo "<li>"."<a href='profile.php'>"."Edit Profile"."</a>"."</li>";
	echo "<li>"."<a href='addhomepage1.php'>"."Add New Home"."</a>"."</li>";
	echo "<li>"."<a href='edithomedetail.php'>"."View House Detail"."</a>"."</li>";
	//echo "<li>"."<a href='editroomdetail.php'>"."View Room Detail"."</a>"."</li>";
	echo "<li>"."<a href='login.html'>"."Logout"."</a>"."</li>";
	echo "</ul><br><br>";
	
	if(isset($_POST['update'])){
		$update = "update roomname set roomname='$_POST[room]'WHERE idHouse='$_POST[idhouse]'";
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
	$sql = "SELECT * FROM roomname WHERE idHouse= '$idhouse'";
	$result = mysqli_query($conn, $sql);
	echo "<table border=1 align=center>     																	
	 <tr>
	 <th>Name of the Room</th>
	 </tr>";
	while ($row = mysqli_fetch_array($result)) {
		echo "<form action='' method='post'>";
//		$idhouse=$row['idHouse'];
//		$_SESSION['idhouse']=$idhouse;
		echo "<tr>";
		echo "<td>" . "<input type='text' name='room' value='" . $row['roomname'] . "' </td>";
		echo "<td>" . "<input type='hidden' name='idhouse' value='" . $row['idHouse'] . "' </td>";
		echo "<td>" . "<input type='hidden' name='idtyperoom' value='" . $row['idTyperoom'] . "' </td>";
		echo "<td>" . "<input type='hidden' name='idroomname' value='" . $row['idRoomname'] . "' </td>";
		echo "<td>" . "<input type='submit' name='update' value='Update'>". " </td>";
		//echo "<td>" . "<input type='submit' name='addroom' value='Add Room'>". " </td>";
		//echo "<td>" . "<input type='button' onclick=location.href='roomtype1.php'?".$row['idHouse']. "value='Add Room' >" . "</button>" . "</td>";
		echo "<td>" . "<a name='addsensor' href=sensoradd.php?idroomname=".$row['idRoomname'] ."&idhouse=" . $idhouse . ">Add Sensor</a></td>";
        echo "<td>" . "<a name='addsensor' href=viewsensor.php?idroomname=".$row['idRoomname'].">View Sensor</a></td>";
		echo "</tr>";
		echo "</form>";
	}
	echo "</table>"."</br>";
?>
</body>
</html>

