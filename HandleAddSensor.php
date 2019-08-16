<?php
session_start();
	$username=$_SESSION['username'];
	$id=$_SESSION['id'];
	$idroom=$_SESSION['idroomname'];
	print "<h3>"."Welcome"." ".$_SESSION["username"]."</h3>"."<br>";										// printing username that value store in session variable
	print "<h3>"."Welcome"." ".$_SESSION["idroomname"]."</h3>"."<br>";												//Checking id value is coming or not
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
$sensor=$_POST["sensor"];
$instri="�C" ;
$outstr=mb_convert_encoding($instri,'UTF-8','GBK');
$datatype=array($outstr,"%","bool");
for($i=0;$i<count($sensor);$i++){
	
	$sql="INSERT INTO sensordata (idSensordata,sensorname,sensordata,idRoomname,DataType,idHAG) VALUES (NULL,'".$sensor[$i]."',NULL,'".$idroom."','".$datatype[$i]."','1')";
	$result = mysqli_query($conn,$sql);
	}
	
	alert("operate suc,next step is setting your rooms XD");

/*if (!$result)
  {
  die('Error: ' . mysqli_error());
  }
  else{
   
 
  }*/

function alert($tip = "") {
    $js = "<script>";
    if ($tip)
        $js .= "alert('" . $tip . "');</script>";
    
    
    echo $js;
    
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
<form action="HandleAddValue.php" method="post">
<?php
$dbname='appproject';
	$conn=mysqli_connect('localhost','root','',$dbname);
	if(!$conn){
		die("Connection failed". mysqli_connect_error());
	}
	$sql="select sensorname from sensordata where idRoomname='".$_SESSION['idroomname']."'";
	$result = mysqli_query($conn,$sql);

while($row=mysqli_fetch_array($result)){
	$sn=$row["sensorname"];
	$instri="�C" ;
	$outstr=mb_convert_encoding($instri,'UTF-8','GBK');
	if($sn=="lamp"){
		echo "<li>sensorName:".$sn."On:<input type='radio' name='".$sn."' value='on'>Off:<input type='radio' name='".$sn."' value='off'><br>";
	}else if($sn=="temp"){
		echo "<li>sensorName:".$sn."<input type='text' name='".$sn."'>".$outstr."<br>";
	}else{
		echo "<li>sensorName:".$sn."<input type='text' name='".$sn."'>%<br>";
	}
	$values[]=$sn;
	
}
$_SESSION['values']=$values;
mysqli_free_result($result);
mysqli_close($conn);



?>
<input type="submit" value="submit">



</form>
</body>
</html>

