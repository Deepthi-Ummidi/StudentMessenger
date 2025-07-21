<html>
<head>
</head>
<body>
<h1>Your friends list:</h1>
<div style="position:absolute  top=33"><hr color="blue"></div>
<table  width=600 height=10 style='border-collapse: collapse'>
<?php

$con=mysqli_connect("localhost", "root", "");
$c=mysqli_select_db($con,"a310");

session_start();
$user=$_SESSION['username'];
if(isset($_POST['Add'])) //checking if the form is submitted or not. 
{ 

	$contactt=$_POST["contact"];
	$res=mysqli_query($con,"select user_id from users where user_id='$contactt'");
	$num=mysqli_num_rows($res);
	if($num>0)	
	{
		echo "You have successfully added your friends!!! <br>";
		$result=mysqli_query($con,"INSERT INTO contacts VALUES('$user','$contactt') "); 
	}
	else
	{
		?>
		<script>
		alert("user_id doesnot exist..");
		document.location="contacts.php";
		</script>
		<?php
	}

}
if(isset($_POST['delete'])) //checking if the form is submitted or not. 
{ 

	$box=$_REQUEST['box'];
    echo "You have successfully deleted the selected mails!!! <br>";
	//echo" your inbox has " 
    foreach($box as $key=>$value) echo "<br>";
	$result=mysqli_query($con,"DELETE from contacts where contact_id='$value' "); 
}


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

echo "<p><P>";
$num=mysqli_num_rows($res);
$color1="#6e6eeg";
$color2="#eeeeee";
$nowrap="nowrap";
echo "<tr ><td bgcolor=$color1></td><td  bgcolor=$color1>First Name</td><td bgcolor=$color1>Last Name</td><td  bgcolor=$color1>User id</td></tr>";
?>
<form method="post"  action="contacts.php" target="c"> 
<?php ;//it is here for collecting check box values
for($i=0;$i<$num;$i++)
{
        $row=mysqli_fetch_array($res);
		$fname=getfname($row[1],$con);
		$lname=getlname($row[1],$con);
	    echo "<tr>
				<td width=10><input type=\"checkbox\"  name=box[] value=$row[1]></td> 
		<td>$fname</td><td>$lname</td><td>$row[1]</td>";/*<td><form method=\"post\" 	action=\"compose_mail.html\" target=\"c\"><input type=\"submit\" value=\"send mail\"></form></td></tr> ";*/
}
?>
<tr><td><input type="submit" name="delete" value=" Delete "></td></tr>
</form>
</table> 

<font size=5>
<br>To add a new contact
enter user name of your friend<br></font>
<form method="post"  action="contacts.php" target="c"> 

<br>User Name: <input type="text" name="contact"> 
<input type="submit" name="Add" value=" Add ">
</form>
<img src="img/cartoon_friends.gif">
</body>
</html>
