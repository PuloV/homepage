<?php
require_once "db_config.php";
if (session_status() == PHP_SESSION_NONE)  {
     session_start();
}
$sql = "SELECT menu_name , menu_addr ,menu_id
        FROM menu
        WHERE menu_type = 'top'";
$result=$mysqli->query($sql);
if(!$result)
{
	die($mysqli->error);
}

?>
<div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a href="index.php" class="brand"  >MyHomePage</a>

                    <div class="nav-collapse collapse">
                           <!-- <li class="active"><a href="#">Home</a></li> -->
                           
                            <?php
while( $query = $result->fetch_object())
{
    echo '  <a href="'.$query->menu_addr.'" class="btn btn-inverse " >'.$query->menu_name.' </a> ';
	
}

$sql =  "SELECT menu_name , menu_addr , menu_id 
		FROM menu
		where menu_type = 'dropdown'";       
$result = $mysqli->query($sql);
if (!$result) {
                    die($mysqli->error);	
                    }                    

                            ?>
                             <div class="btn-group">
                              <button class="btn btn-inverse dropdown-toggle" data-toggle="dropdown">More.. <span class="caret"></span></button>
                             <ul class="dropdown-menu">
                               
                                	<?php
while($query=$result->fetch_object())
{
	echo ' <li><a href="'.$query->menu_addr.'">'.$query->menu_name.'</a>';
	
	echo '</li>';
}
                                	?>
                                  
                                <!--   <li class="divider"></li> -->
                                 
                               
                        </ul></div>
 <?php 
 if(!array_key_exists('user', $_SESSION) )
                  			{  echo  ' <form class="navbar-form  navbar-search pull-right" action="login.php" method="post">
                            <input class="span2 search-query" type="text" placeholder="user" name="user" id="user">
                            <input class="span2 search-query" type="password" placeholder="password" name="password" id="password">
                            
                              <button type="submit" class="btn label label-inverse">Sign in</button>
                       		 </form> '; 
                       		  
                       		   } 
 else { 
$sql =  "SELECT menu_name , menu_addr , menu_id 
		FROM menu
		where menu_type = 'usermenu' ORDER BY menu_id DESC";       
$result = $mysqli->query($sql);
if (!$result) {
                    die($mysqli->error);	
                    }                    

                            
                           
                     echo'      <div class="btn-group">   <button class="btn btn-inverse dropdown-toggle " data-toggle="dropdown">'.$_SESSION['user'].'<span class="caret"></span></button>
                             <ul class="dropdown-menu"> ';
                                 

                          
                                	
while($query=$result->fetch_object())
{
	echo ' <li><a href="'.$query->menu_addr.'">'.$query->menu_name.'</a>';
	
	echo '</li>';
} 
 echo "</ul> </div>";
}
?>
                        		
                        
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

