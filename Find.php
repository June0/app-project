<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
<form action="Check.php?id=1" method="post">
<?php
session_start();
$idhouse=$_SESSION['idhouse'];

$dbname='appproject';
	$conn=mysqli_connect('localhost','root','',$dbname);
	if(!$conn){
		die("Connection failed". mysqli_connect_error());
	}
$sql="select roomname from roomname where idHouse='$idhouse'";
$result = mysqli_query($conn,$sql);
echo "<select name='roomname'>";
while($row=mysqli_fetch_array($result)){
	$sn=$row["roomname"];
	echo "<option>".$sn."</option>";
	
}
echo "</select>";


if (!$result)
  {
  die('Error: ' . mysqli_error());
  }
  

mysqli_close($conn);
?>
<input type="submit" value="submit">



</form><br>

<form action="Check.php?id=2" method="post">
<?php

$rn=$_SESSION['idroomname'];
$dbname='appproject';
	$conn=mysqli_connect('localhost','root','',$dbname);
	if(!$conn){
		die("Connection failed". mysqli_connect_error());
	}
$sql="select sensorname from sensordata ";
$result = mysqli_query($conn,$sql);
echo "<select name='sensorname'>";
while($row=mysqli_fetch_array($result)){
	$sn=$row["sensorname"];
	echo "<option>".$sn."</option>";
	
}
echo "</select>";


if (!$result)
  {
  die('Error: ' . mysqli_error());
  }
  

mysqli_close($conn);
?>
<input type="submit" value="submit">



</form>

</body>
</html>
