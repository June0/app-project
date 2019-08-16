<?php
	session_start();
	$dbname='appproject';
	$conn=mysqli_connect('localhost','root','',$dbname);
	if(!$conn){
		die("Connection failed". mysqli_connect_error());
	}
	$username=$_POST['username'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$street=$_POST['street'];
	$city=$_POST['city'];
	$country=$_POST['country'];
	$sql="INSERT INTO user (username,password,email,phone_no,street,city,country) VALUES('$username','$password','$email','$phone','$street','$city','$country')";
	if(mysqli_query($conn,$sql)){
		echo "<script>alert('Register sucessfully');location.href='index.html'</script>";
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
	
	mysqli_close($conn)
?>