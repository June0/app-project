<?php
    session_start();
    $username=$_SESSION['username'];
    $idroom=$_GET['idroomname'];
    $_SESSION['idroomname']=$idroom;
    if (!empty($_POST)) {
        $dbConfig = require './config/db.php';
        $conn = mysqli_connect($dbConfig['host'], $dbConfig['user'], $dbConfig['pwd'], $dbConfig['db']);
        foreach ($_POST['sensor'] as $sensor) {
            list($sensorName, $sensorType) = explode(";", $sensor);
            $sql = "insert into `sensor`(`sensorname`, `idRoomname`, `idSensortype`, `idHAG`) VALUE ('$sensorName', $idroom, $sensorType, 0)";
            mysqli_query($conn, $sql);
        }
        header("Location: editroomdetail.php?idhouse=" . $_GET['idhouse']);
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
<form action="" method="post">
temperature:<input type="checkbox" name="sensor[]" value="temp;2"> <br>
humidity:<input type="checkbox" name="sensor[]" value="humi;1"><br>
lamp: <input type="checkbox" name="sensor[]" value="lamp;5"><br>
<input type="submit" class="submit button" name="submit" value="submit" />


</form>
</body>
</html>

