<html>
<head>
</head>
<body> 
<br>
<br>
<br>
<br>
<br><h1>Hi 
<?php

session_start();
if (isset($_SESSION['username'])) {
    echo htmlspecialchars($_SESSION['username']);
} else {
    echo "Guest";
}
?><img src="img/smiley-face-flat.png" width=50 height=50>
</h1>
<h2>Welcome to student messenger.</h2><h3>Click one of the links from the left pane to perform tasks.</h3>
</body>
</html>
