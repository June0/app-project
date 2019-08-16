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
$idhouse=$_GET['idHouse'];
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

// 这里显示该房间所有传感器
$sql = "select * from `sensor` WHERE `idRoomname`={$_GET['idroomname']}";
$records = mysqli_query($conn, $sql);
?>
<table>
    <thead>
        <th>idSensor</th>
        <th>sensorname</th>
        <th>idRoomname</th>
        <th>idSensortype</th>
        <th>operation</th>
    </thead>
    <tbody>
        <?php
            $idroomname = $_GET['idroomname'];
            foreach ($records as $record) {
                $id = $record['idSensor'];
                ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $record['sensorname'] ;?></td>
                    <td><?php echo $record['idRoomname'] ;?></td>
                    <td><?php echo $record['idSensortype'] ;?></td>
                    <td>
                        <a href="add_sensor_data.php?sensor_id=<?php echo $id; ?>&idroomname=<?php echo $idroomname; ?>">Add Data</a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="view_sensor_data.php?sensor_id=<?php echo $id; ?>">View Data</a>
                    </td>
                </tr>
                <?php
            }
        ?>
    </tbody>
</table>
</body>
</html>

