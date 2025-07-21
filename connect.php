<?php
$servername='localhost';  // hostname or ip of server
$mysql_login="root"; // username and password to log onto db server
$mysql_password="";
$dbname='a310';  // name of database

////////////// Do not  edit below////////
function connecttodb($servername,$dbname,$mysql_login,$mysql_password)
{
	global $link;
	$link=mysqli_connect ("$servername","$mysql_login","$mysql_password");
	if(!$link){die("Could not connect to MySQL");}
		mysqli_select_db($link,"$dbname") or die ("could not open db".mysqli_error($link));
}

connecttodb($servername,$dbname,$mysql_login,$mysql_password);

echo"Iam in connect.php";
?>