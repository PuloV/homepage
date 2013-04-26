<?php
require_once "db_config.php";
session_start();
if (!array_key_exists("id",$_SESSION)) {
	header("location: index.php");
}

$sql = "DELETE FROM `bookmarks` WHERE bmrk_id =".(int)$_GET['id']. " AND user_id = ". $_SESSION['id']." LIMIT 1 ";
$result = $mysqli->query($sql);

if(!$result)
{
	die($mysqli->error);
}

header("location: index.php");
?>
