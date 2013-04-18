<?php

require_once "db_config.php"; 
if(!array_key_exists("user", $_POST) || !array_key_exists("password",$_POST) ) 
	{ header('location: index.html'); }
$sql = "SELECT * 
		FROM admins 
		WHERE adm_username = '".$_POST['user']."'  and adm_pass = '".md5($_POST['password']) ."'" ;


$result = $mysqli -> query($sql);

if(!$result) {
die($mysqli -> error);
}
$query = $result -> fetch_object();
session_start();
$_SESSION['id'] = $query->adm_id ;
$_SESSION['user'] = $_POST['user'];
$_SESSION['admin'] = "1";

header('location: acp.php');
?>