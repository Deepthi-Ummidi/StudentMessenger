
<html>
<head>
</head>
<body>
<form method="post" action="online_chtbox_frame2.php">
<textarea rows=6 cols=50 name="msg"></textarea>
<input type="submit" value="Post Scrap">
</form>



<?php

if(isset($_REQUEST["msg"]))
{
	session_start();
	$con=mysqli_connect("localhost","root","");
	$c=mysqli_select_db($con,"a310");
	$sender_id=$_SESSION['username'];
	$receiver_id=$_SESSION['receiver_id'];
	$msg=$_POST['msg'];

	$res=mysqli_query($con,"insert into chat (sender_id,receiver_id,msg) values('$sender_id','$receiver_id','$msg')");
}
?>


</body>
</html>
