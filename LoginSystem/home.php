<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;

// We don't have the fullname info stored in sessions so 
// instead we can get the results from the database.
$stmt = $con->prepare('SELECT fullname FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($fullname);
$stmt->fetch();
$stmt->close();	
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
<p>Welcome back, <?$_SESSION['name']?>!</p>

</div>

</body>

</html>