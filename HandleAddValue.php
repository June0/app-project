<html>
<head>
<meta charset="ISO-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="welcome2.css">
<link rel="stylesheet" href="registration.css" type="text/css">
<title>Adding Sensor</title>
</head>
<body>
<?php
session_start();
			$username=$_SESSION['username'];
			$idroom=$_SESSION['idroomname'];
$values=$_SESSION['values'];
//print_r($values);

$dbname='appproject';
	$conn=mysqli_connect('localhost','root','',$dbname);
	if(!$conn){
		die("Connection failed". mysqli_connect_error());
	}
for($i=0;$i<count($values);$i++){
$sql="UPDATE sensordata SET sensordata = '".$_POST["$values[$i]"]."' WHERE sensorname = '".$values[$i]."' and idRoomname='$idroom';";	
$a=mysqli_query($conn,$sql);
}



$sql="select sensorname,sensordata,DataType from sensordata where idRoomname='$idroom'";
$result = mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)){
	$sn=$row["sensorname"];
	$data=$row["sensordata"];
	$type=$row["DataType"];
	//$instri="¡ãC" ;
	//$outstr=mb_convert_encoding($instri,'UTF-8','GBK');
	
		echo "<li>sensorName:".$sn."Data:".$data.$type."</li>";
		
	
	
	
}if (!$result)
  {
  die('Error: ' . mysqli_error());
  }
  else{
   
  alert("operate suc, XD");
  }

function alert($tip = "") {
    $js = "<script>";
    if ($tip)
        $js .= "alert('" . $tip . "');</script>";
    
    
    echo $js;
    
}

mysqli_close($conn);

?>
<br/><a href="Find.php">check sensor information</a>
</body>
</html>