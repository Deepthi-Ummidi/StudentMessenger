<html>
<body>
<br>
<font size=5 color="green">List of users...</font><br><br>
<font color="pink">
<table align=left height=70 width=700 style='border-collapse: collapse' >
<tr>
        <td bgcolor="black"  width="120">User_id</td>
        <td bgcolor="black"  width="120">First name</td>
        <td bgcolor="black"  width="120">Last name</td>
	<td bgcolor="black"  width="120">State</td>
	<td bgcolor="black"  width="120">Branch</td>
	<td bgcolor="black"  width="120">Sex</td>
	<td bgcolor="black"  width="120">DOB</td>
	<td bgcolor="black"  width="120">Status</td>
</tr>
</font>

<?php

$con=mysqli_connect("localhost", "root", "");
$c=mysqli_select_db($con,"a310");

$res=mysqli_query($con,"select * from users");
$num=mysqli_num_rows($res);


$check="checkbox";
$color1="#ffffff";
$color2="#eeeeee";
$nowrap="nowrap";

for($i=0;$i<$num;$i++)
{
        $row=mysqli_fetch_array($res);
	   if($i%2)
	   {
          echo "<tr>
                  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[0]</td> 
                  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[2]</td> 
				  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[3]</td> 
				  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[5]</td> 
				  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[8]</td> 
				  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[9]</td> 
				  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[10]</td> 
				  <td bgcolor=$color1 nowrap=$nowrap width=120>$row[11]</td> 
				  </tr> ";
        }
		else
		{
                 echo "<tr>
                     <td bgcolor=$color2 nowrap=$nowrap width=120>$row[0]</td> 
				     <td bgcolor=$color2 nowrap=$nowrap width=120>$row[2]</td> 
					 <td bgcolor=$color2 nowrap=$nowrap width=120>$row[3]</td> 
					 <td bgcolor=$color2 nowrap=$nowrap width=120>$row[5]</td> 
					 <td bgcolor=$color2 nowrap=$nowrap width=120>$row[8]</td> 
					 <td bgcolor=$color2 nowrap=$nowrap width=120>$row[9]</td> 
					 <td bgcolor=$color2 nowrap=$nowrap width=120>$row[10]</td> 
					 <td bgcolor=$color2 nowrap=$nowrap width=120>$row[11]</td>  
				     </tr> ";

        }

}
?>
</table>
</body>
</html>
