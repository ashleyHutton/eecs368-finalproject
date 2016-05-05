<?php
	session_start();
	include("config.php");
	//if user has session going on it redirects them to succeslog.php
	if(isset($_SESSION['login_user'])!= ""){
		//not sure header("Location: succeslog.php")
	}
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		//prevents code injection
		$blog_post = mysqli_real_escape_string($db, $_POST['comments']);
		$dbURL = 'mysql.eecs.ku.edu';
		$dbUsername = 'ahutton';
		$dbPassword = 'myPassword';
		$dbName = 'ahutton';
		$mysqli = new mysqli($dbURL, $dbUsername, $dbPassword, $dbName);
		if ($mysqli -> connect_errno){
			printf("Conection Failed: %s\n", $mysqli -> connect_error);
			exit();
		}
		$myquery = $mysqli -> query("SELECT comments FROM BlogUsers WHERE Text = '$blog_post'");
		if($myquery -> num_rows === 1){
			echo "<script> alert ('Success!');</script>";
		}
		else {
			echo "<script>alert('Invalid Login');</script>";
		}
	}
?>
<html>
<head>
	<title> Final Project Blog</title>
	<link rel="stylesheet" type="text/css" href="blogpost.css">
</head>
<body>

<div class="header">

	<div class="container">
	<div class="content">
		<br/><br/><br/><br/>
		
		<div class="logo">
			<h1><a href="#"> Blog Post</a></h1>
		</div>
		
		<div class = "nav">
			<ul>
				<li><a href = "index.php">Return Home</a></li>
			</ul>
		</div>
	</div>
	</div>
</div>
<div>
		
		 <form action="" method="post">
		</br>
		</br>
		</div>
		<div class = "picture">
			<center><img src = "background.jpg" class = "background" height = "200px" width = "950px"></img></center>
		</div>
		</br></br>
		</br>
		</br>
			<center>
			
				<textarea name="comments" id="comments" style="width:1000px;height:100px;padding:10px;border:1px solid blue;"rows="1" cols = "100">
				
				</textarea>
			</center>
		</div>
			<center><input type="submit" value="Submit A Post"></center>
	</form>
	
</body>
</html>