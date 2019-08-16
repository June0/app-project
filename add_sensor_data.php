<?php
if (!empty($_POST)) {
    $dbConfig = require './config/db.php';
    $conn=mysqli_connect($dbConfig['host'], $dbConfig['user'], $dbConfig['pwd'], $dbConfig['db']);
    $date = date('Y-m-d H:i:s');
    $sql = "insert into `sensordata`(`idSensor`, `Data`, `Date`) VALUE ({$_POST['sensor_id']}, '{$_POST['data']}', '$date')";
    mysqli_query($conn, $sql);
    header("Location: viewsensor.php?idroomname=" . $_POST['idroomname']);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Sensor Data</title>
</head>
<body>
<form action="" method="post">
    <input type="hidden" name="sensor_id" value="<?php echo $_GET['sensor_id']; ?>">
    <input type="hidden" name="idroomname" value="<?php echo $_GET['idroomname']; ?>">
    <div>
        <label for="data">Data：</label>
        <input type="text" name="data" required>
    </div>
    <input type="submit" value="submit">
</form>
</body>
</html>