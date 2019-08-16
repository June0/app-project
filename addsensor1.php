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
	$dbname='appproject';
	$conn=mysqli_connect('localhost','root','',$dbname);
	if(!$conn){
		die("Connection failed". mysqli_connect_error());
	}
	$sensor=$_POST["sensor"];
	$sql1 = "SELECT * FROM sensortype WHERE idSensortype= '$sensor'";
	$result1 = mysqli_query($conn, $sql1);
	while ($row1 = mysqli_fetch_assoc($result1)) {
		$idtyperoom=$row1['idTyperoom'];
		$_SESSION['idtyperoom']=$idtyperoom;
		echo "Typeroom".$_SESSION['idtyperoom'];
	}
				
				$instri="°C" ;
				$outstr=mb_convert_encoding($instri,'UTF-8','GBK');
				$datatype=array($outstr,"%","bool");
	
				for($i=0;$i<count($sensor);$i++){
					
					$sql="INSERT INTO sensor (idSensor,sensorname,idRoomname,idSensortype,idHAG)VALUES(NULL,'".$sensor[$i]."','$idroom','$idsensortype','$idHAG')";
					$result = mysql_query($sql,$con);
					}
					
					
				
				if (!$result)
				  {
				  die('Error: ' . mysql_error());
				  }
				  else{
				   
				  alert("operate suc,next step is setting your rooms XD");
				  }
				
				function alert($tip = "") {
				    $js = "<script>";
				    if ($tip)
				        $js .= "alert('" . $tip . "');</script>";
				    
				    
				    echo $js;
				    
				}
				
				mysql_close($con)
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
				$con = mysql_connect("localhost", "root", "19940119jxy");
				
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				
				$db_selected = mysql_select_db("phpProject",$con);	
					$sql="select SensorName from sensordata where RoomName='".$_SESSION['roomname']."'";
					$result = mysql_query($sql,$con);
				
				while($row=mysql_fetch_array($result)){
					$sn=$row["SensorName"];
					$instri="¡ãC" ;
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
				mysql_free_result($result);
				mysql_close($con)
				
				
				
				?>
				<input type="submit" value="submit">
				
				
				
				</form>
				</body>
				</html>