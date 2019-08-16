<?php
    $dbConfig = require './config/db.php';
    $conn=mysqli_connect($dbConfig['host'], $dbConfig['user'], $dbConfig['pwd'], $dbConfig['db']);
    $sql = "select * from sensordata WHERE idSensor=" . $_GET['sensor_id'];
    $records = mysqli_query($conn, $sql);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Sensor Data</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>idSensordata</th>
                <th>idSensor</th>
                <th>Data</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($records as $record) {
                    ?>
                    <tr>
                        <td><?php echo $record['idSensordata']; ?></td>
                        <td><?php echo $record['idSensor']; ?></td>
                        <td><?php echo $record['Data']; ?></td>
                        <td><?php echo $record['Date']; ?></td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>