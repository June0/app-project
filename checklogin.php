<?php
	session_start();
	$dbConfig = require './config/db.php';
	$conn=mysqli_connect($dbConfig['host'], $dbConfig['user'], $dbConfig['pwd'], $dbConfig['db']);
	if (!$conn)
	  {
	  die('Could not connect: ' . mysqli_connect_error());
	  }
	  
	$username=trim($_POST['username']);
	$password=trim($_POST['password']);

	$sql ="SELECT password,username,idUser FROM user WHERE username='$username'";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)){
		$row = mysqli_fetch_assoc($result);
			if(($row["password"]==$password) && ($row["username"]==$username)){
				$_SESSION['username']=$username;
				$id=$row['idUser'];
				$_SESSION['id']=$id;
				echo "<script>alert('Login successfull');location.href='welcome.php'</script>";
			
			}
			else{
				echo "<script>alert('Login failed');location.href='login.html'</script>";
			}
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
?>
