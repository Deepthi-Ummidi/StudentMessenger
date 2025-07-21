<p>
<p>
<?php


session_start();
if(isset($_REQUEST['submit']))
{
	
	$con=mysqli_connect("localhost", "root", "");
	$c=mysqli_select_db($con,"a310");
	$dept=$_REQUEST["dept"];
	$username=$_SESSION['username'];
	$msg_body=$_REQUEST["msg_body"];
	$title=$_REQUEST["title"];
	$res=mysqli_query($con,"insert into topic_post(user_id,fid,post_text,type,post_title)
					  values('$username',$dept,'$msg_body','q','$title')");
			
	echo $username.$dept.$msg_body.$title;
	if($res>0)
	{
		?>
		<script>
			document.location="forum_home.html";
		</script>
		<?php
	}
}
?>
<form method="post" action="forum_newpost.php" target="c">
Title :<input type="text" name="title" size=50><br><br>
<font size=5><i>Type your Question here:</i></font><br>
<input type="hidden" name="dept" value="<?php echo $_REQUEST['dept'];?>">
<textarea rows="16" cols="90" name="msg_body"></textarea>
<br><br><br>
<input type="submit" value="SEND" name ="submit">
</form>

</body>
</html>