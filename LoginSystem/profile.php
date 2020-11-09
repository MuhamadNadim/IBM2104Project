<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'employees';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the fullname, department, and job title info stored in sessions so 
// instead we can get the results from the database.
$stmt = $con->prepare('SELECT email, fullname, department, job_title FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($email, $fullname, $department, $job_title);
$stmt->fetch();
$stmt->close();
?>

<html>

<head> <title> Profile Page </title> </head>

<link rel = "stylesheet" href="style.css">

<body class="loggedin">
<nav class="navtop">

<div>
<h1>Emirates Airline Staff</h1>
<a href="home.php">Home</a>
<a href="profile.php">Profile</a>
<a href="logout.php">Logout</a>
</div>
            
</nav>
        
<div class="content">
            
<h2>Profile Page</h2>

<div>
<p>Your account details are below:</p>
<table>
                    
<tr>
<td>Full Name:</td>
<td><?=$fullname?></td>
</tr>
                    
<tr>
<td>Work Email Address:</td>
<td><?=$email?></td>
</tr>
                    
<tr>
<td>Department:</td>
<td><?=$department?></td>
</tr>

<tr>
<td>Job Title:</td>
<td><?=$job_title?></td>
</tr>
                
</table>
</div>
        
</div>
</body>
</html>