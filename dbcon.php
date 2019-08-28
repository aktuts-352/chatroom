<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
$server="localhost";
$db_user="root";
$db_pass="";
$database="chatroom";
$con=mysqli_connect($server,$db_user,$db_pass,$database);
if(!$con)
{
die("Connection failed" . mysqli_connect_error());
}
else
{
//echo "database connection successful";
}
?>
</body>
</html>
