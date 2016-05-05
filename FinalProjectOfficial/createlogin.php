<?php
session_start();
include("config.php");
date_default_timezone_set('America/Chicago');
//if user has a logged session going on it redirects them to succeslog.php
if(isset($_SESSION['login_user'])!=""){
	header("Location: successlog.php");
}
if(isset($_POST['signup_button'])){
	//prevents code injection
	$usr = mysqli_real_escape_string($db,$_POST['username']);
	$pass = mysqli_real_escape_string($db,$_POST['password']);
	$fname = mysqli_real_escape_string($db,$_POST['fname']);
	$lname = mysqli_real_escape_string($db,$_POST['lname']);
	$confirm = mysqli_real_escape_string($db,$_POST['cpword']);
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
<script>
function checkPass(){
	var p1 = document.getElementById('p1').value;
	var p2 = document.getElementById('p2').value;

	if(p1 != p2 || p2 == ""){
		alert("Passwords Don't Match");
		event.preventDefault();
	}
	return true;
}
</script>
<head>
	<title> Create Log In </title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<div class="header">
		<div class="container">

			<div class="logo">
				<h1><a href="#"><center> Create Log In </center></a></h1>
			</div>

			<div class="nav">
				<ul>
					<li><a href="login.php"> Already have an account? </a></li>
					<li><a href="index.php"> Return </a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="container">
	<div class="content">
		<br/><br/><br/><br/>
		<div class = "picture">
			<img src = "background.jpg" class = "background" height = "45px" width = "950px"></img>
		</div>
	</div>
	<div class = "input">
		<form action="" onsubmit ="return checkPass()"  method="post">
			User Name: <input type = "text" name = "username" style = "width: 40%" required><br><br>
			Password: <input id ="p1" value="" type = "password" name = "password"  style = "width: 41%" required><br><br>
			Confirm: <input id="p2" value="" type = "password" name = "cpword"  style = "width: 35%" required><br><br>
			<button type="submit" style = "width: 15%" name="signup_button"> Submit </button>
		</form>
	</div>
	</div>
</body>
</html>
