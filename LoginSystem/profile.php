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
<td><?=$_SESSION['fullname']?></td>
</tr>
                    
<tr>
<td>Work Email Address:</td>
<td><?=$_SESSION['email']?></td>
</tr>
                    
<tr>
<td>Department:</td>
<td><?=$_SESSION['department']?></td>
</tr>

<tr>
<td>Job Title:</td>
<td><?=$_SESSION['job_title']?></td>
</tr>
                
</table>
</div>
        
</div>
</body>
</html>