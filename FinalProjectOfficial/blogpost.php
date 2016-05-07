<?php
	include("session.php"); //once user is confirmed only include session.php which also has acces to the DataBase
	//if user has session going on it redirects them to succeslog.php
	if(isset($_SESSION['login_user'])==""){
		header("location: login.php");
	}
	
	if(isset($_POST['submit_button'])){

		//prevents code injection
		$blog_post = mysqli_real_escape_string($db, $_POST['content']);
		$user_id =  $db->query("SELECT UserName FROM BlogUsers WHERE UserName='login_session'");

		if ($blog_post == ""){
			echo "<script>alert('Post cannot be blank!');</script>";
		}
		else {

			$sql = "INSERT INTO BlogPosts (author_id, content) VALUES ('$user_id','$blog_post')";
/*
			if ($db->query($sql) === TRUE) {
				echo "<script>alert('Success!');</script>";
				//echo "Success!";
			}
			else {
				echo "<script>alert('Error!');</script>";
				//echo "Error: " . $sql . "<br>" . mysqli_error($db);
			}*/
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

				<textarea name="content" id="content" style="width:1000px;height:100px;padding:10px;border:1px solid blue;"rows="1" cols = "100">

				</textarea>
			</center>
		</div>
			<center><button type="submit" name="submit_button">Submit</button></center>
	</form>

</body>
</html>
