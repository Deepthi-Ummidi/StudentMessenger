<html>
<head>
</head>
<body>

<br>

<?php

$con=mysqli_connect("localhost", "root", "");
$c=mysqli_select_db($con,"a310");
if(isset($_POST['submit'])) //checking if the form is submitted or not. 
{ 

	$box=$_REQUEST['box'];
    echo "You have successfully deleted the selected reports!!! <br>";
    foreach($box as $key=>$value)
		$result=mysqli_query($con,"DELETE from reports where rid='$value' "); 
}
?>
<form method="post" action="admin_reports.php" target="c">
<font color="#ffffff">
<table align=left height=70 width=700 style='border-collapse: collapse' >
<tr>
        <td bgcolor="#6e6f7b"  width="20"></td>
	<td bgcolor="#6e6f7b"  width="20">From</td>
        <td bgcolor="#6e6f7b" width="120">Reported on</td>
	<td bgcolor="#6e6f7b" width="120">Subject</td>
        
</tr>
</font>
<?php

//$user=$_COOKIE["session_id"];
session_start();
$user=$_SESSION['username'];
$res=mysqli_query($con,"select * from reports"); //changed by me

echo "<p><P>";
$num=mysqli_num_rows($res);
$check="checkbox";
$color1="#ffffff";
$color2="#eeeeee";
$nowrap="nowrap";

for($i=0;$i<$num;$i++)
{
        $row=mysqli_fetch_array($res);
	   if($i%2){
          echo "<tr>
                  <td bgcolor=$color1 nowrap=$nowrap width=10><input type=$check name=box[] value=$row[3]></td> 
                  <td bgcolor=$color1 nowrap=$nowrap width=20>$row[2]</td>
		  <td bgcolor=$color1 nowrap=$nowrap width=20>$row[0]</td> 
                  <td bgcolor=$color1 nowrap=$nowrap width=120><a href=report_content.php?rid=$row[3]>$row[4]</a></td>
		</tr>";
        }else{
                 echo "<tr>
                        <td bgcolor=$color2 nowrap=$nowrap width=10><input type=$check name=box[] value=$row[3] ></td> 
			<td bgcolor=$color2 nowrap=$nowrap width=20>$row[2]</td>
                        <td bgcolor=$color2 nowrap=$nowrap width=20>$row[0]</td> 
                        <td bgcolor=$color2 nowrap=$nowrap width=120><a href=report_content.php?rid=$row[3]>$row[4]</a></td> 
                       </tr>";

        }

}

?>

</table>
<DIV STYLE="POSITION:ABSOLUTE; LEFT:30; TOP:300">
<input type="submit"  name="submit" value="delete">
</div>
</form>

</body>
</html>

