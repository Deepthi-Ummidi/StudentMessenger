<html>
<head>
</head>
<body bgcolor="white"> 
<marquee BEHAVIOR=ALTERNATE scrollamount="5"><img src="img/Student_Messengr.png" width=412 height=68></font> </marquee>
<table width=100%>
<tr>
<td><a href="developers.html" target="_top">Developers Edge</a> </td><td></td><td></td><td></td><td></td>
<td><div align="right"><a href="home.html" target="_top"><?php

session_start();

if (isset($_SESSION['username'])) {

    echo htmlspecialchars($_SESSION['username']);

} else {

    echo "Guest";

}

?></a>
<a href="logout.php" target="_top">logout</a>
<a href="view_profile.php" target="_top">view profile</a></div></td>
</tr>
</table>
</body>
</html>

