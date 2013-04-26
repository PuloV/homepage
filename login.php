<?php

require_once "db_config.php"; 
if(!array_key_exists("user", $_POST) || !array_key_exists("password",$_POST) ) 
	{ header('location: index.html'); }
$sql = "SELECT * 
		FROM users 
		WHERE user_name = '".$_POST['user']."'  and user_pass = '".md5($_POST['password']) ."'" ;


$result = $mysqli -> query($sql);

if(!$result) {
die($mysqli -> error);
}
$query = $result -> fetch_object();
var_dump($query);
session_start();

if (isset($query->user_name) &&  $query->user_name == $_POST['user'] && $query->user_pass == md5($_POST['password']) ) {
	

$_SESSION['id'] = $query->user_id ;
$_SESSION['user'] = $_POST['user'];
$_SESSION['admin'] = "0";

header('location: index.php');
}
else
header('location: index.php');
?>