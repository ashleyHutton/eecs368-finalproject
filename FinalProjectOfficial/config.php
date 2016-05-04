<?php
	define('DB_SERVER', '/var/run/mysqld/mysqld.sock');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', 'damage');
	define('DB_DATABASE', 'BlogWebsite');
	//$db = new MySQLi('host', username, password, databasename, port, server_socket_location);
	//where I used port and server socket location I was running a localy hosted database
	$db = new MySQLi('localhost', DB_USERNAME, DB_PASSWORD, DB_DATABASE, 0, DB_SERVER);
/*
Useful commands 
Dind sql socket path and port (default is 0):
sudo mysqladmin variables -u root -p
Emulate server on a folder:
php -S localhost:8000
linux useful installs:
sudo apt-get install php5-cli
sudo apt-get install php5-mysql
*/
?>
