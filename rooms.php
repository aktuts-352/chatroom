<?php
//get parameters

$roomname = $_GET['roomname'];

//connecting database

include "dbcon.php";

//execute sql to check whether room exists

$sql = "SELECT * FROM `rooms` WHERE roomname= '$roomname'";
$result=mysqli_query($con,$sql);
if($result)
{
    //check if room exists
	if(mysqli_num_rows($result)==0)
	{
	    $message = "This room does not exist.Try ceating a new one";
        echo '<script language="javascript">';
        echo 'alert("'.$message.'");';
        echo 'window.location="http://localhost/chatwebsite";';
        echo '</script>'; 
	}
}
else
{
  echo "Error:". mysqli_error($con);
}

 
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style>
body {
  margin: 0 auto;
  max-width: 800px;
  padding: 0 20px;
}

.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
.anyclass
{

height:350px;
overflow-y:scroll;
}
</style>
</head>
<body>
 <header class="masthead mb-auto">
    <div class="inner">
      <h3 class="masthead-brand">ChatRoom</h3>
      <nav class="nav nav-masthead justify-content-center">
        <a class="nav-link active" href="#">Home</a>
        <a class="nav-link" href="#">Features</a>
        <a class="nav-link" href="#">Contact</a>
      </nav>
    </div>
  </header>
<h2>Chat Messages - <?php echo $roomname;?></h2>

<div class="container">
<div class="anyclass">
  <img src="/w3images/bandmember.jpg" alt="Avatar" style="width:100%;">
  <p>Hello. How are you today?</p>
  <span class="time-right">11:00</span>
</div>
</div>
<input type="text" class="form-control" name="usermsg" id="usermsg" placeholder="Type message"/><br>
<button class="btn btn-default" name="submitmsg" id="submitmsg">Send</button>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

<script type="text/javascript">
    //if users submit the form
	var clientmsg = $("$usermsg").val();
	$("#submitmsg").click(function(){
  $.post("postmsg.php", {text:clientmsg, room:'<?php echo $roomname ;?>', ip:'<?php echo $_SERVER['REMOTE_ADDR'];?>'}),
       function(data,status){
	     document.getElementsByClassName('anyclass')[0].innerHTML = data;
	   });
	   return false;
});
</script>
</body>
</html>
