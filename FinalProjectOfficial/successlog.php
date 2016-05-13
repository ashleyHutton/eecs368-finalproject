<?php
include("session.php");
//If the user has a valid loged in session the they are directed to blogpost.php
//else they are sent to the login page
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
