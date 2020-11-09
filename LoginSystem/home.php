<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>

<html>

<head> 

<title> Home Page  </title>  

<link rel = "stylesheet" href="style.css">

</head>

<body class = "loggedin">
<nav class = "navtop">

<div> 
<h1> Emirates Airline Staff </h1>
<a href="profile.php">Profile</a>
<a href="logout.php">Logout</a>
</div>

</nav>

<div class="content">

<h2>Home Page</h2>
<p>Welcome to Emirates Airlines' Staff Homepage, <?=$_SESSION['fullname']?>!</p>

</div>

</body>

</html>