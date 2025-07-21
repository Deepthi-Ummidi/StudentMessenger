<html>
<body>
<br>
<font size=5 color="green">Your profile</font>
<font color="#ffffff">
<table align=left height=70 width=700 style='border-collapse: collapse' >
<tr>
        <td bgcolor="#6e6f7b"  width="120">User_id</td>
        <td bgcolor="#6e6f7b"  width="120">First name</td>
        <td bgcolor="#6e6f7b"  width="120">Last name</td>
		<td bgcolor="#6e6f7b"  width="120">Address</td>
		<td bgcolor="#6e6f7b"  width="120">State</td>
		<td bgcolor="#6e6f7b"  width="120">Country</td>
		<td bgcolor="#6e6f7b"  width="120">Zipcode</td>
		<td bgcolor="#6e6f7b"  width="120">Branch</td>
		<td bgcolor="#6e6f7b"  width="120">Sex</td>
		<td bgcolor="#6e6f7b"  width="120">DOB</td>
		</tr>
</font>

<?php

$con=mysqli_connect("localhost", "root", "");
$c=mysqli_select_db($con,"a310");
session_start();
$user=$_SESSION['username'];
echo $user;
$res=mysqli_query($con,"select * from users where user_id='$user'");
$row=mysqli_fetch_array($res);


$check="checkbox";
$color1="#ffffff";
$color2="#eeeeee";
$nowrap="nowrap";

         echo "<tr>
                  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[0]</td> 
                  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[2]</td> 
				  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[3]</td> 
				  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[4]</td>
				  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[5]</td> 
 				  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[6]</td>
  				  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[7]</td>
				  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[8]</td> 
				  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[9]</td> 
				  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[10]</td> 
				  				  
				  </tr> ";

?>
</table>
<font size=5><div STYLE="POSITION:ABSOLUTE; LEFT:15; TOP:200">
<a href="edit_profile.html">edit my profile</a><br><a href="home.html">back</a></div></font>


</body>
</html>
