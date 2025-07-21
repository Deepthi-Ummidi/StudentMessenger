<?php



$servername='localhost';  // hostname or ip of server
$mysql_login="root"; // username and password to log onto db server
$mysql_password="";
$dbname='a310';  // name of database

////////////// Do not  edit below////////
function connecttodb($servername,$dbname,$mysql_login,$mysql_password)
{
        global $link;
        $link=mysqli_connect ("$servername","$mysql_login","$mysql_password");
        if(!$link){die("Could not connect to MySQL");}
                mysqli_select_db($link,"$dbname") or die ("could not open db".mysqli_error($link));
}

connecttodb($servername,$dbname,$mysql_login,$mysql_password);

session_start();



//echo "WELCOME".$_SESSION['username'];
//$con=mysql_connect("localhost","a310","a310");
//$c=mysql_select_db("a310");

$username=$_REQUEST['username'];
$pass=$_REQUEST['password'];



$res=mysqli_query($link,"select username, password from admin where username='$username' and password='$pass'");
$rows=mysqli_num_rows($res);

if($rows>0)
{
        ?>
        <script>
                document.location="admin_home.html";
        </script>
        <?php
        $_SESSION['username']=$user=$_REQUEST['username'];
        $password=$_REQUEST['password'];
        mysqli_query($con,"UPDATE users SET status=1 WHERE user_id='$user'");
}
else
{
        ?>
        <script>
                alert("invalid username or password. Please enter again");
                document.location="admin_index.html";
        </script>
        <?php
}
mysqli_close($con);
?>

