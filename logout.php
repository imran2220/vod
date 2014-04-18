<?php
ob_start(); 
session_start();
if(isset($_SESSION['UserName']))
	unset($_SESSION['UserName']); 
session_destroy();
header( 'Location: login.php' ) ;
ob_flush();
?>
