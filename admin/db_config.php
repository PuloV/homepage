<?php 
$mysqli = new mysqli("localhost","root","" ,"homepage");

if($mysqli ->connect_errno) 
	{
	 die("DB connection error! " . $mysqli -> connect_error );
	}

?>
