<?php

$con=mysqli_connect("localhost","root","");
$c=mysqli_select_db($con,"a310");
session_start();
$field=$_POST['field'];
$field_value=$_POST['field_value'];
$user=$_SESSION['username'];
mysqli_query($con,"update users set $field='$field_value' where user_id='$user'");
?>

<script>
alert("updated successfully");
document.location="edit_profile.html";
</script>
