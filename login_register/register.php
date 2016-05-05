<?php
include("config.php");
session_start();
date_default_timezone_set('America/Chicago');

//if user has a logged session going on it redirects them to succeslog.php
if(isset($_SESSION['login_user'])!=""){
	header("Location: successlog.php");
}

if(isset($_POST['signup_button'])){
	//prevents code injection
	$usr = mysqli_real_escape_string($db,$_POST['username']);
	$pass = mysqli_real_escape_string($db,$_POST['password']);

	//echo $usr . " " .$pass; //ucomment to check the POST values for usrname and pass

	$date = date("Y-m-d");
	$insertquery = "INSERT INTO Blog_Users (id,UserName,Password,confirmed,signup_date) VALUES (NULL, '$usr', '$pass','Y', '$date')";
		//need a method to check if username and password are valid for registration, with a boolean return
		if($usr != "" && $pass != "" && mysqli_query($db,$insertquery)){
?>
			<script>alert('Registration Successful');</script>
<?php
		}
		else{
?>
				<script>alert('ERROR While Registering');</script>
<?php
		}
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration System</title>

</head>
<body>
	<center>
		<div id="login-form" align="center">
			<form action ="" method="post">

					<label>UserName :</label><input type="text" name="username" required /><br /><br />
					<label>Password :</label><input type="password" name="password" required /><br /><br />

					<button type="submit" name="signup_button">Sign Me Up</button><br /><br />
					<a href="login.php">Sign In Here</a>
			</form>
		</div>
	</center>
</body>
