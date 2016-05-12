<?php
	session_start();
	include("config.php");
	//if user has a session going on it redirects them to succeslog.php
	if(isset($_SESSION['login_user'])!=""){
		header("location: successlog.php");
	}
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		//prevents code injection
		$usr = mysqli_real_escape_string($db,$_POST['username']);
		$pass = mysqli_real_escape_string($db,$_POST['password']);
		$myquery = $db->query("SELECT UserName FROM BlogUsers WHERE UserName = '$usr' and Password = '$pass'");
		if ($myquery->num_rows === 1){
			//echo "<script>alert('Success!');</script>";
			$_SESSION['login_user'] = $usr;
			header("location: successlog.php");//When user is loged they are sent to succeslog.php
		}
		else {
			echo "<script>alert('Invalid Login');</script>";
		}
	}
?>

<html>
<head>
	<title> Log In </title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body background = "background.jpg">
	<div class="header">
		<div class="container">

			<div class="logo">
				<h1><a href="#"><center> Log In </center></a></h1>
			</div>

			<div class="nav">
				<ul>
					<li><a href="createlogin.php"> Create New Log In</a></li>
					<li><a href="index.php"> Return </a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="container">
	<div class="content">
		<br/><br/><br/><br/></br></br>
	</div>
	<div class = "input">
		<form action="" method="post">
			UserName: <input type = "text" name = "username" style = "width: 43%"><br><br>
			Password: <input type = "password" name = "password" style = "width: 41%"><br><br>
			<div><?php echo $error;?></div>
			<button type = "submit" style = "width: 15%" id = "Submit"> Submit </button>
		</form>
	</div>
	</div>
</body>
</html>
