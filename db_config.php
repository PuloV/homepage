<?php 
$mysqli = new mysqli("localhost","root","" ,"homepage");

if($mysqli ->connect_errno) 
	{
	 die("DB connection error! " . $mysqli -> connect_error );
	}
$mysqli -> query("SET NAMES UTF8");
?>
