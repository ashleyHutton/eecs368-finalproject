<?php
session_start();
include("config.php");

$user_check = $_SESSION['login_user'];

//check if user is in the database
$ses_sql = mysqli_query($db,"SELECT UserName FROM Blog_Users where UserName = '$user_check' ");

//Where MYSQLI_ASSOCiative crates and array of the type ['value1','value2','value3'].
$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

//uncomment any, both print the current User's Username
//echo implode(" ",$row);
//echo $row['username'];

$login_session = $row['username'];

//isset determines if a variable is set and not null
//If it is null it sends user to the login page
if(!isset($_SESSION['login_user'])){
	header("location:login.php");
}
?>
