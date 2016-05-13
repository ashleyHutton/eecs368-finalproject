<?php
	include("session.php"); //once user is confirmed only include session.php which also has acces to the DataBase
	//if user has session going on it redirects them to succeslog.php
	if(isset($_SESSION['login_user'])==""){
		header("location: login.php");
	}
	//Checking if there is a posting attempt
	if(isset($_POST['content'])){
		//prevents code injection
		$blog_post = $_POST['content'];
		$blog_post = htmlspecialchars($blog_post);
		//Checks if post attempt is empty.
		if ($blog_post == ""){
			echo "<script>alert('Post cannot be blank!');</script>";
		}
		else {
			//Inserts post into the database table.
			$sql = "INSERT INTO Posts (author_id, content) VALUES ( '$login_session','$blog_post')";
			$db->query($sql);
		}
	}
	echo  "<input id='myid' type='hidden' value='".$user_id."'>";
?>
<html>
<head>
	<title> Final Project Blog</title>
	<link rel="stylesheet" type="text/css" href="blogpost.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript" src="blogpost.js"></script>
</head>
<body background = "background.jpg">

<div class="header">

	<div class="container">
	<div class="content">
		<br/>
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
		</br></br></br></br></br></br></br>
		</div>

		</br>
			<div class="post">
			</div>
		</br>

			<center>
				<div class="container">
					<div class="content">
						<div id="thread" class="postThread"></div>
					</div>
				</div>
			</center>
			<center>

				<textarea name="content" id="content" style="width:1000px;height:100px;padding:10px;border:1px solid blue;"rows="1" cols = "100">

				</textarea>
			</center>
		</div>
			<center></br></br></br></br><button type="submit" name="submit_button">Submit</button></center>
	</form>

</body>
</html>
