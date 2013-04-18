<?php
require_once "db_config.php";
session_start();
if(!array_key_exists("admin", $_SESSION))
{
	header('location : index.php');
}

$sql = "INSERT INTO `homepage`.`menu` (
`menu_name` ,
`menu_addr` ,
`menu_type`
)
VALUES (
 '".$_POST['menu_name']."', '".$_POST['menu_addr']."', '".$_POST['menu_type']."'
);
";
$result = $mysqli->query($sql);
if (!$result) {
	die($mysqli->error);
}
header('location: acp.php');
 ?>
