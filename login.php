<?php
	include("config.php");
	session_start();
	//if user has a session going on it redirects them to succeslog.php
	if(isset($_SESSION['login_user'])!=""){
		header("Location: successlog.php");
	}
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		//prevents code injection
		$usr = mysqli_real_escape_string($db,$_POST['username']);
		$pass = mysqli_real_escape_string($db,$_POST['password']);
		$myquery = "SELECT id FROM Users WHERE UserName = '$usr' and Password = '$pass'";
		$start = 1;
		$result = mysqli_query($db,$myquery);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$active = $row['active'];
		//if successful there should be 1 row fetched
		//If unsuccesful it may be the case usernames are duplicated
		$count = mysqli_num_rows($result);
		if($count == 1) {
			$_SESSION['login_user'] = $usr;
			header("location: successlog.php");
		}else {
			$error = "Invalid Login";
		}
	}
?>
<!--<html>
	<head>
	</head>
	<body>
		<div align = "center">
			<div>
			<div>Login</div>
				<div>
					<form action = "" method = "post">
						<label>UserName :</label><input type = "text" name = "username" class = "box"/><br /><br />
						<label>Password :</label><input type = "password" name = "password" class = "box" /><br/><br />
						<input type = "submit" value = " Submit "/><br />
					</form>
					<div><?php echo $error; ?></div>
				</div>
			</div>
			<a href="register.php">Sign Up</a>
		</div>

	</body>
</html>-->

<html>
<head>
	<title> Log In </title>
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
				<h1><a href="#"><center> Log In </center></a></h1>
			</div> 

			<div class="nav">
				<ul>
					<li><a href="http://people.eecs.ku.edu/~cbernosk/FinalProject/createlogin.html"> Create New Log In</a></li>
					<li><a href="http://people.eecs.ku.edu/~cbernosk/FinalProject/index.html"> Return </a></li>
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
		<form action"http://people.eecs.ku.edu/~cbernosk/FinalProject/index.html" method="post">
			E-mail: <input type = "text" name = "username" style = "width: 43%"><br><br>
			Password: <input type = "password" name = "pword" style = "width: 41%"><br><br>
		</form>
		<div><?php echo "error";?></div>
		<button style = "width: 15%" id = "Submit"> Submit </button>
	</div>
	</div>
</body>
</html>