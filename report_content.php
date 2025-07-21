<html>
<head>
</head>
<body>
<br>
<br>
<font color="black">
<table align=left height=70 width=700 style='border-collapse: collapse' >   
 </font>
<?php

$con=mysqli_connect("localhost", "root", "");
$c=mysqli_select_db($con,"a310");
$num=$_REQUEST["rid"];


$res=mysqli_query($con,"select * from reports where rid='$num'"); //changed by me
//print_r($res);
echo "<p><P>";
$num=mysqli_num_rows($res);
$check="checkbox";
$color1="white";
$color2="blue";
$nowrap="nowrap";


$row=mysqli_fetch_array($res);

				  echo "<tr><td bgcolor=$color1 >From: $row[2]</td></tr>
						<tr><td bgcolor=$color1 >Reported on : $row[0]</td></tr>
						<tr><td bgcolor=$color1 >Subject : $row[4]</td></tr>
						<tr><td bgcolor=$color1 >Content: </td></tr>
                      	<tr rowspan=10 colspan=6 ><td bgcolor=$color2> $row[1]</td></tr> ";					           
$user=$row[0];

?>
</table>

 
</body>
</html>

