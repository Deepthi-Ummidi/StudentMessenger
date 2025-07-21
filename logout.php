<?php

$con=mysqli_connect("localhost", "root", "");
$c=mysqli_select_db($con,"a310");
session_start();
$username=$_SESSION['username'];

mysqli_query($con,"UPDATE users SET status=0 WHERE user_id='$username'");


session_destroy(); //Destroys all data registered to a session
echo "YOU HAVE SUCCESSFULLY LOGGED OUT";
mysqli_query($con,"delete from chat where sender_id='$username'");
?><script>
	alert("LOGGED OUT SUCCESSFULLY");
	document.location="index.html";
  </script>



