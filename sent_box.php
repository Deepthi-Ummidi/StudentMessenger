<html>
<head>
</head>
<body>
<?php
session_start();
$con=mysqli_connect("localhost", "root", "");
$c=mysqli_select_db($con,"a310");
if(isset($_POST['submit'])) //checking if the form is submitted or not. 
{ 

	$box=$_REQUEST['box'];
    echo "You have successfully deleted the selected mails!!! <br>";
	//echo" your inbox has " 
    foreach($box as $key=>$value) 
		$result=mysqli_query($con,"DELETE from messages where msg_id='$value' "); 
}
?>
<br>
<br>
<br>
<form method="post" action="sent_box.php" target="c">
<font color="#ffffff">
<table align=left height=70 width=100% style='border-collapse: collapse'>
<tr>
        <td bgcolor="#6e6f7b"  width="10"></td>
        <td bgcolor="#6e6f7b"  width="20">To</td>
        <td bgcolor="#6e6f7b" width="120">Subject</td>
        <td bgcolor="#6e6f7b"  width="120">Date and Time</td>
</tr>
</font>
<?php
$user=$_SESSION['username'];
$res=mysqli_query($con,"select * from messages where sender_id='$user' order by msg_time desc"); //changed by me

echo "<p><P>";
$num=mysqli_num_rows($res);
$color1="#ffffff";
$color2="#eeeeee";
$nowrap="nowrap";
$link="";
for($i=0;$i<$num;$i++)
{
        $row=mysqli_fetch_array($res);
	   if($i%2){
                echo "<tr>
                        <td bgcolor=$color1 nowrap=$nowrap width=10><input type=\"checkbox\" name=box[] value=$row[0]></td> 
                        <td bgcolor=$color1 nowrap=$nowrap width=20>$row[1]</td> 
                        <td bgcolor=$color1 nowrap=$nowrap width=120><a href=mail_content.php?msg_id=$row[0]>$row[4]</a></td> 
                        <td bgcolor=$color1 nowrap=$nowrap width=120>$row[5]</td></tr> ";
        }else{
                 echo "<tr>
                        <td bgcolor=$color2 nowrap=$nowrap width=10><input type=\"checkbox\" name=box[] value=$row[0]></td> 
                        <td bgcolor=$color2 nowrap=$nowrap width=20>$row[1]</td> 
                        <td bgcolor=$color2 nowrap=$nowrap width=120><a href=mail_content.php?msg_id=$row[0]>$row[4]</a></td> 
                        <td bgcolor=$color2 nowrap=$nowrap width=120>$row[5]</td></tr> ";

        }

}
?>
</table>
<DIV STYLE="POSITION:ABSOLUTE; LEFT:30; TOP:300">
<input type="submit" name="submit" value="delete">
</div>

</form>
<div  STYLE="POSITION:ABSOLUTE; LEFT:30; TOP:400"><img src="img/u18270846.jpg"></div>
</body>
</html>

