<?php
	include("session.php"); //once user is confirmed only include session.php which also has acces to the DataBase
	//if user has session going on it redirects them to succeslog.php
	if(isset($_SESSION['login_user'])==""){
		header("location: login.php");
	}
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		//prevents code injection
		$blog_post = mysqli_real_escape_string($db, $_POST['comments']);

		$myquery = $db -> query("SELECT comments FROM BlogUsers WHERE Text = '$blog_post'");
		if($myquery -> num_rows === 1){
			//echo "<script> alert ('Success!');</script>";//This scripts alerts prevent the php from redirecting in some browsers
		}
		else {
			//echo "<script>alert('Invalid Login');</script>";
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

				<li><a href = "logout.php">Sign Out</a></li>
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
		</br>
			<div class="post">

			</div>
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
