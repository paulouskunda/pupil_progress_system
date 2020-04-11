<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'pupil_progress_db');
 
/* Attempt to connect to MySQL database */
$mysqli= mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
