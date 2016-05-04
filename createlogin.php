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
	$fname = mysqli_real_escape_string($db,$_POST['fname']);
	$lname = mysqli_real_escape_string($db,$_POST['lname']);
	$confirm = mysqli_real_escape_string($db,$_POST['cpword']);
	//echo $usr . " " .$pass; //ucomment to check the POST values for usrname and pass
	$date = date("Y-m-d");
	$insertquery = "INSERT INTO Users (id,UserName,Password,confirmed,signup_date) VALUES (NULL, '$usr', '$pass','Y', '$date')";
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
<!--<html>
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
-->
<html>
<head>
	<title> Create Log In </title>
	<style>
		body {
	width: 100%;
	margin: auto;
	}
	.container {
		width: 950px;
		margin: 0 auto;
		top = 0;
	}
	.header {
		background: #6396bc;
		width: 100%;
		top: 0;
		position: fixed;
	}
	.logo {
		float: left;
		font-family: "Halevetica";
		font-size: 15px; 
	}
	a{
		text-decoration: none;
		color: #fff;
	}
	li{
		list-style: none;
		float: left;
		margin-left: 15px;
		padding-top: 10px;
	}
	.nav{
		float: right;
	}
	.input{
		text-align: center;
		font-family: "Times New Roman"
		text-decoration: 
	}
	</style>
</head>	
<body>
	<div class="header"> 
		<div class="container">

			<div class="logo">
				<h1><a href="#"><center> Create Log In </center></a></h1>
			</div> 

			<div class="nav">
				<ul>
					<li><a href="http://people.eecs.ku.edu/~cbernosk/BlogSite/login.php"> Already have an account? </a></li>
					<li><a href="http://people.eecs.ku.edu/~cbernosk/BlogSite/index.html"> Return </a></li>
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
		<form action"http://people.eecs.ku.edu/~cbernosk/BlogSite/index.html" method="post">
			First Name: <input type = "text" name = "fname" style = "width: 40%" required><br><br>
			Last Name: <input type = "text" name = "lname" style = "width: 40%" required><br><br>
			E-mail: <input type = "text" name = "username" style = "width: 43%" required><br><br>
			Password: <input type = "password" name = "password" style = "width: 41%" required><br><br>
			Confirm - Password <input type = "password" name = "cpword" style = "width: 35%" required><br><br>
		</form>
		<button style = "width: 15%" name="signup_button"> Submit </button>
	</div>
	</div>
</body>
</html>