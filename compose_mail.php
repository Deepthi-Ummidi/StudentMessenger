<?php


session_start();

$con=mysqli_connect("localhost","root","");
$c=mysqli_select_db($con,"a310");
$toaddr=$_POST['to_address'];
$fromaddr=$_SESSION['username'];
$sub=$_POST['subject'];
$tex=$_POST['msg_body'];


$t=mysqli_query($con,"select user_id from users where user_id ='$toaddr'");
$f=mysqli_query($con,"select user_id from users where user_id ='$fromaddr'");
$tr=mysqli_num_rows($t);
$tf=mysqli_num_rows($f);
if($tr==0)
{
	?>
	<script>
	alert("to address does not exist..");
	document.location="compose_mail.html";
	</script>
	<?php
}
else if($tf==0)
{
	?>
	<script>
	alert("from address does not exist..");	
	document.location="compose_mail.html";
	</script>
	<?php
}
else
{
	$suc=mysqli_query($con,"insert into messages (receiver_id,sender_id,msg_sub,msg_body) values('$toaddr','$fromaddr','$sub','$tex')");
	
	
	if($suc)	
	{	
		ECHO "<script>";              //here we are sending toaddress to another document 
		ECHO "document.location=\"compose_mail_success.php?toaddr= $toaddr\"";
		ECHO "</script>";
	?>
		<?php
	}
	else
	{
		?>
		<script>
		alert("mail cannot be send");
		</script>
		<?php
	}
}
mysqli_close($con);
?>

