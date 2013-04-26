<?php
require_once "db_config.php";
require_once "print_functions.php";
if (!isset($_SESSION)) {
	session_start();
}
if(!array_key_exists('user', $_SESSION))
{ header("location index.php");}
if(array_key_exists('user_email', $_POST))
{
	$sql = "UPDATE users
	 		SET  user_email = '".$_POST['user_email']."'  
			WHERE  user_id = '".$_SESSION['id']."'
	";
	$result = $mysqli->query($sql);
	if(!$result)
{
	die($mysqli->error);
}
else
header("location: profile.php");
}



print_well("<h3>Здравей , ".$_SESSION['user'] ." </h3><br /> Тoва  e твоят профил. Ако желаеш можеш да го редактираш." );

$sql = "SELECT * FROM  users WHERE user_id = '".$_SESSION['id']."' LIMIT 1";
$result = $mysqli->query($sql);
if(!$result)
{
	die($mysqli->error);
}
$query = $result ->fetch_object();
$info = '<form class="navbar-form  navbar-search pull-left " action="userinfo.php" method="post">
                          <label for="userreg">Име (Не може да бъде променен):  <input class="span2 search-query pull-right" type="text" value="'.$query->user_name.' " name="user_name" id="user_name"> </label> <br />
                            <label for="passwordreg">Email :  <input class="span2 search-query pull-right" type="text" value= "'. $query->user_email .' " name="user_email" id="user_email"> </label><br />
                    
                              <button type="submit" class="btn label label-info pull-right">Промени</button> <br /></form>
                             <br/>  ' ;
print_header("Информация: <br />", $info);
?>