<?php
//Loading the database
$db = new mysqli('mysql.eecs.ku.edu', 'ahutton', 'myPassword', 'ahutton');

if ($db->connect_errno){
	printf("Connection Failed: %s\n", $db->connect_error);
	exit();
}
?>
