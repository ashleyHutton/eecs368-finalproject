<?php
	include("session.php"); //once user is confirmed only include session.php which also has acces to the DataBase
	//if user has session going on it redirects them to succeslog.php
	if(isset($_SESSION['login_user'])==""){
		header("location: login.php");
	}
	if(isset($_POST['content'])){
		//prevents code injection
		$blog_post = $_POST['content'];
		$blog_post = htmlspecialchars($blog_post);
		if ($blog_post == ""){
			echo "<script>alert('Post cannot be blank!');</script>";
		}
		else {
			$sql = "INSERT INTO Posts (author_id, content) VALUES ( '$login_session','$blog_post')";
			if ($db->query($sql) === TRUE) {
				//echo "<script>alert('Success!');</script>";
				//echo "Success!";
			}
			else {
				//echo "<script>alert('Error!');</script>";
				//echo "Error: " . $sql . "<br>" . mysqli_error($db);
			}
		}
	}
?>
<html>
<head>
	<title> Final Project Blog</title>
	<link rel="stylesheet" type="text/css" href="blogpost.css">
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

				<textarea name="content" id="content" style="width:1000px;height:100px;padding:10px;border:1px solid blue;"rows="1" cols = "100">

				</textarea>
			</center>
		</div>
			<center></br></br></br></br><button type="submit" name="submit_button">Submit</button></center>
	</form>

</body>
</html>