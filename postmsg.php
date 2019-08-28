<?php
//connecting to the database
include "dbcon.php";

$msg=$_POST['text'];
$room=$_POST['room'];
$ip=$_POST['ip'];

$sql = "INSERT INTO `msgs` (`sno`, `msg`, `room`, `ip`, `stime`) VALUES ('$msg', '$room', '$ip', CURRENT_TIMESTAMP);";
   mysqli_query($con,$sql);
   mysqli_close($con);

?>