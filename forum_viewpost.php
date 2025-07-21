<h4><a href=forum_home.html>forum home</a></h4>

<?php

session_start();
$con=mysqli_connect("localhost", "root", "");
$c=mysqli_select_db($con,"a310");
$post_id=$_REQUEST["post_id"];
if(isset($_REQUEST['reply']))
{
	$dept=$_REQUEST["dept"];
	$username=$_SESSION['username'];
	$msg_body=$_REQUEST["msg_body"];
	$title=$_REQUEST["title"];
	$res=mysqli_query($con,"insert into topic_post(user_id,fid,post_text,type,post_title)
					  values('$username',$dept,'$msg_body','r','$title')");
			
//	echo $username.$dept.$msg_body.$title;
	if($res>0)
	{
		?>
		<script>
			document.location="forum_viewpost.php?post_id=<?php echo $post_id; ?>";
		</script>
		<?php
	}
}
//to show questions in a department = fid////
//$post_id=$_REQUEST["post_id"];
$res=mysqli_query($con,"select post_title from topic_post where post_id='$post_id'");
$row=mysqli_fetch_array($res);
$title=$row[0];

$res=mysqli_query($con,"select user_id,post_text,post_title,post_time,type from topic_post where post_title='$title'");
$num=mysqli_num_rows($res);

$color1="#ffffff";
$color2="#eeeeee";

?>


<?php
for($i=0;$i<$num;$i++)
{
	$row=mysqli_fetch_array($res);

	echo "<table border=1 cellpadding=2 cellspacing=0 width=100%>
			<tr><td bgcolor=$color2><b>Title: </b>$row[2]</td></tr>
			<tr><td bgcolor=$color1 >
				<table border=0 cellpadding=5 cellspacing=0 width=100%>
				<tr><td bgcolor=$color1  width=100%><b>Author:</b>&nbsp;$row[0]&nbsp;&nbsp;&nbsp;($row[3])<br>
		$row[1]</td></tr></table></td>
	</tr>";
	
	echo "</table><p><br>";
	
}
?>
<form method="post" action="forum_viewpost.php?post_id=<?php echo $post_id;?>" target="c">
<input type="hidden" name="title" value="<?php echo $title;?>" size=50>
<font size=5><h3><i> Reply here:</i></h3></font><br>
<input type="hidden" name="dept" value="<?php echo $_REQUEST['dept'];?>">
<textarea rows="10" cols="90" name="msg_body"></textarea>
<br><br><br>
<input type="submit" value="reply" name ="reply">
</form>




