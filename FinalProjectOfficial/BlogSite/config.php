<?php

/////////////////////
//Diego DB Settings//
/////////////////////
// '/var/run/mysqld/mysqld.sock'
// 'mysql.eecs.ku.edu'
/*
define('DB_SERVER', 'mysql.eecs.ku.edu');
define('DB_USERNAME', 'dsolizca');
define('DB_PASSWORD', 'Mygenericpass');
define('DB_DATABASE', 'dsolizca');
define('DB_SOCKETPATH', ''); // /var/run/mysqld/mysqld.sock
define('DB_PORT', 0); //deafult it to 0
//$db = new MySQLi('host', username, password, databasename, port, server_socket_location);
//where I used port and server socket location I was running a localy hosted database
$db = new MySQLi(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
//$db = new MySQLi(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE, 0, DB_SOCKETPATH); // For localy hosted Data Base
*/

////////////////////////
//Asheley DB settings.//
////////////////////////
define('DB_SERVER', 'mysql.eecs.ku.edu');
define('DB_USERNAME', 'ahutton');
define('DB_PASSWORD', 'myPassword');
define('DB_DATABASE', 'ahutton');

$db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if ($db->connect_errno){
	printf("Connection Failed: %s\n", $db->connect_error);
	exit();
}

/*
Useful commands:

Find sql socket path and port (default is 0):
sudo mysqladmin variables -u root -p

To emulate server on a folder using php:
php -S localhost:8000

linux useful installs:
sudo apt-get install php5-cli
sudo apt-get install php5-mysql
*/
?>
