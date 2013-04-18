<?php
session_start();
require_once "db_config.php"; 
if(!array_key_exists("user", $_POST) || !array_key_exists("password",$_POST) ) 
	{ header('location: index.html'); }


session_destroy();
header('location: index.php');
?>