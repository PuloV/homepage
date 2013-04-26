<?php 
require_once "db_config.php";
require_once "print_functions.php";
if(!isset($_SESSION))
session_start();

if(array_key_exists('user', $_SESSION))
{
	header("location : profile.php");
}
 if(array_key_exists("userreg", $_POST) && array_key_exists("passwordreg", $_POST))
 {
 	$sql = " INSERT INTO `homepage`.`users` (`user_id`, `user_name`, `user_pass`, `user_email`) VALUES (NULL, '".$_POST['userreg']."', '".md5($_POST['passwordreg'])."', '".$_POST['email']."');
 			";
 	$result = $mysqli -> query($sql);
 	
 	if(!$result)
 	{die($result->error);
 		print_warning();
 	}
 	header("location:index.php?reg=done");
 }
 $form =  ' <form class="navbar-form  navbar-search pull-left " action="reg.php" method="post">
                          <label for="userreg">Потребителско име :  <input class="span2 search-query pull-right" type="text" placeholder="Име" name="userreg" id="userreg"> </label> <br />
                            <label for="passwordreg">Парола :  <input class="span2 search-query pull-right" type="password" placeholder="Парола" name="passwordreg" id="passwordreg"> </label><br />
                            <label for="email">Email :   <input class="span2 search-query pull-right" type="text" placeholder="Email" name="email" id="email"> </label><br />
                              <button type="submit" class="btn label label-info pull-right">Register</button> <br />
                       		 </form> <br/><br/><br />'  ;
$title = "Не сте регистриран ? Направи го сега ";
print_header($title, $form);
?>