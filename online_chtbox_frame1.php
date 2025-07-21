<html>
<head>
<meta http-equiv="refresh" content="1">
</head>
<body>
<?php
session_start();

$con=mysqli_connect("localhost","root","");
$c=mysqli_select_db($con,"a310");
$sender_id=$_SESSION['username'];
$receiver_id=$_SESSION['receiver_id'];

$res=mysqli_query($con,"select *from chat where (receiver_id='$sender_id' or receiver_id='$receiver_id') and (sender_id='$sender_id' or sender_id='$receiver_id') order by msgtime");

$num=mysqli_num_rows($res);

for($i=0;$i<$num;$i++)
{
	$row=mysqli_fetch_array($res);
	if($row[0]==$sender_id)
		$color="green";
	else
		$color="red";
	echo "<font color='$color'>$row[0]</font> : $row[2]<br>";
}

?>



</body>
</html>
