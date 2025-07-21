<html>
<head>
</head>
<body>
<h1>Your Online  friends:</h1>
<div style="position:absolute top=33"><hr color="blue"></div>
<table  width=600 height=10 style='border-collapse: collapse'>
<?php

$con=mysqli_connect("localhost", "root", "");
$c=mysqli_select_db($con,"a310");

session_start();
$user=$_SESSION['username'];

function getfname($user_id,$con)
{
	$restult=mysqli_query($con,"select fname from users where user_id='$user_id'"); //changed by me
	$row1=mysqli_fetch_array($restult);
	return $row1[0];
}
function getlname($user_id,$con)
{
	$restult=mysqli_query($con,"select lname from users where user_id='$user_id'"); //changed by me
	$row1=mysqli_fetch_array($restult);
	return $row1[0];
}


$res=mysqli_query($con,"select * from contacts where user_id='$user'"); //changed by me

echo "<p><p>";
$num=mysqli_num_rows($res);
$color1="#6e6eeg";
$color2="#eeeeee";
$nowrap="nowrap";
echo "<table width=600 height=10 style='border-collapse: collapse'>";
echo "<tr><td  bgcolor=$color1>First Name</td><td bgcolor=$color1>Last Name</td><td  bgcolor=$color1>User id</td></tr>";

//it is here for collecting check box values
for($i=0;$i<$num;$i++)
{
	
	    $row=mysqli_fetch_array($res);
		$fname=getfname($row[1],$con);
		$lname=getlname($row[1],$con);
		$checkStatus=mysqli_query($con,"select status from users where status=1 and user_id='$row[1]'");
	    $row1=mysqli_fetch_array($checkStatus);
		if($row1)
		echo "<tr>	<td>$fname</td>
			<td>$lname</td>
			<td><a href=online_chtbox.php?cht_user=$row[1] target=\"_blank\">$row[1]</a></td> </tr>";
}
?>
</table> 

<font size=5>
<br>
<img src="img/Big_Smil1.gif">

</body>
</html>
