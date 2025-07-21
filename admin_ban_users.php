<?php


$con=mysqli_connect("localhost", "root", "");
$c=mysqli_select_db($con,"a310");

$user=$_POST['user'];
$res=mysqli_query($con,"select user_id from users where user_id='$user'");
$num=mysqli_num_rows($res);
if($num>0)	
{
	mysqli_query($con,"delete from users where user_id='$user'");
	?>
	<script>
	alert("You have successfully deleted the user");
	document.location="admin_ban_users.html";
	</script>
	<?php
}
else
{
	?>
	<script>
	alert("user_id doesnot exist..");
	document.location="admin_ban_users.html";
	</script>
	<?php
}
?>

