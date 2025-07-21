<?php
 
$con=mysqli_connect("localhost","root","");
$c=mysqli_select_db($con,"a310");
$userid=$_POST['user_id'];
$password=$_POST['password'];
$con_password=$_POST['con_password'];
$fnam=$_POST['first_name'];
$lnam=$_POST['last_name'];
$coun=$_POST['country'];
$zip=$_POST['zipcode'];
$s_bran=$_POST['branch'];
$addr=$_POST['address'];
$state=$_POST['state'];
$sex=$_POST['sex'];
$year=$_POST['year'];
$month=$_POST['month'];
$day=$_POST['day'];
$dob=$year.'-'.$month.'-'.$day;
echo $sex;
print("\n$sex $dob");
if (strcmp($password,$con_password))
{
	?>
	<script>
	alert("Passwords does not match. Please try again. ");
	document.location="register.html";
	</script>
	<?php
}

if(empty($userid) or empty($password) or empty($fnam) or empty($lnam) or empty($zip) or empty($s_bran))
{
	 ?>
        <script>
        alert("Please enter all fields ");
        document.location="register.html";
        </script>
        <?php
}


$r=mysqli_query($con,"insert into users (user_id,password,fname,lname,zipcode,s_branch,address,country,state,sex,dob) values('$userid','$password','$fnam','$lnam',$zip,'$s_bran','$addr','$coun','$state','$sex','$dob')");
if($r)
{
	?>
	<script>
	alert("successfully registered");
	document.location="register_success.html";
	</script>
	<?php
}
else
{
	?>
	<script>
	alert("User id already exists. Please try another one.");
	document.location="register.html";
	</script>
	<?php
}

mysqli_close($con);
?>

