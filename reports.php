<?php
session_start();
$reporter=$_SESSION['username'];
$user=$_POST['user'];
$subject=$_POST['subject'];
$reason=$_POST['reason'];
$con=mysqli_connect("localhost", "root", "");
$c=mysqli_select_db($con,"a310");
$res=mysqli_query($con,"select user_id from users where user_id='$user'");
$num=mysqli_num_rows($res);
if(empty($user) or empty($subject) or empty($reason))
{
	?>
        <script>
        alert("Enter all fields");
        document.location="reports.html";
        </script>
        <?php
}
else
{
	if($num>0)
	{
		mysqli_query($con,"insert into reports values('$user','$reason','$reporter','','$subject')");
		?>
		<script>
		alert("Successfully reported..");
		document.location="reports.html";
		</script>
		<?php
	}
	else
	{
		?>
		<script>
		alert("user id doesnot exist");
		document.location="reports.html";
		</script>
		<?php
	}
}
?>
