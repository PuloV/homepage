<?php
require_once "db_config.php";
session_start();
if(!array_key_exists("user", $_SESSION))
{
	header('location : index.php');
}
if(array_key_exists("bmrk_name", $_POST) && array_key_exists("bmrk_link", $_POST) )
{
	$sql = "UPDATE bookmarks 
	 		SET  bmrk_name = '".$_POST['bmrk_name']."' , bmrk_link = '".$_POST['bmrk_link']."' 
			WHERE bmrk_id = '".$_GET['id']."'   AND user_id = '".$_SESSION['id']."'
	";
	$result = $mysqli->query($sql);
	var_dump($result);
	if (!$result) {
		die($mysqli->error);
	}
	header('location: index.php');
}