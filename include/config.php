<?php
error_reporting(0);
session_start();
ob_start();
ini_set('display_errors',false);
$server = "localhost";

$user = "at3oot_dbuser";
$pw = "l@hore123";
$db = "at3oot_db";
$SITE_NAME="http://www.3at3oot.tv/";


//$user = "root";
//$pw = "root";
//$db = "at3oot_db";
//$SITE_NAME="http://localhost/tv/";

$mysqli = new mysqli($server, $user, $pw, $db);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	exit(0);
}


?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />