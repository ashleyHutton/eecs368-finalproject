<?php
include("session.php");
if(isset($_SESSION['login_user'])==""){
	header("location: login.php");
}else {
	header("location: blogpost.php"); //Redirect them to the blogpost.php
}
?>
<html>
	<head>
	</head>

	<body>
		<p><?php echo "Welcome " . $login_session; ?></p>
		<p><a href = "logout.php">Sign Out</a></p>
	</body>

</html>
