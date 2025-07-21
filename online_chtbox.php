<html>
<head>
<frameset rows="70%,*">
<?php
$user=$_REQUEST['cht_user'];
session_start();
$_SESSION['receiver_id']=$user;
?>
<frame src="online_chtbox_frame1.php" noresize>
<frame src="online_chtbox_frame2.php" noresize>
<title><?php echo $user ?></title>
</head>
<body>
</body>
</html>
