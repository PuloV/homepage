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
                    <a class="brand" href="index.php">MyHomePage</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                           <!-- <li class="active"><a href="#">Home</a></li> -->
                           
                            <?php
while( $query = $result->fetch_object())
{
	echo '<li><a href="'.$query->menu_addr.'">'.$query->menu_name.' </a> ';
	if(array_key_exists('admin', $_SESSION) && $_SESSION['admin'] == 1) echo '<li><a href="edit.php?id='.$query->menu_id.'" ><font size = "-9px" ><-EDIT</font></a> ';
	echo'</li></li>';
}

$sql =  "SELECT menu_name , menu_addr , menu_id 
		FROM menu
		where menu_type = 'dropdown'";       
$result = $mysqli->query($sql);
if (!$result) {
                    die($mysqli->error);	
                    }                    

                            ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">More .. <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                	<?php
while($query=$result->fetch_object())
{
	echo ' <li><a href="'.$query->menu_addr.'">'.$query->menu_name.'</a>';
	if(array_key_exists('admin', $_SESSION) && $_SESSION['admin'] == 1) echo '<a href="edit.php?id='.$query->menu_id.'"><- EDIT</a> ';
	echo'</li>';
	echo '</li>';
}
                                	?>
                                  
                                <!--   <li class="divider"></li> -->
                                 
                                </ul>
                            </li>
                        </ul>
 <?php 
 if(!array_key_exists('user', $_SESSION) )
                  			{  echo  ' <form class="navbar-form pull-right" action="login.php" method="post">
                            <input class="span2" type="text" placeholder="user" name="user" id="user">
                            <input class="span2" type="password" placeholder="password" name="password" id="password">
                            
                            <input type="submit"class="btn" name="Submit" value="Submit" />
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

                            ?>
                            <!--<div class = "navbar-form pull-right" > -->
                           
                        	<ul class="nav pull-right">
                            <li class="dropdown ">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['user'] ;?><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                	<?php
while($query=$result->fetch_object())
{
	echo ' <li><a href="'.$query->menu_addr.'">'.$query->menu_name.'</a>';
	if(array_key_exists('admin', $_SESSION) && $_SESSION['admin'] == 1) echo '<a href="edit.php?id='.$query->menu_id.'"><- EDIT</a> ';
	echo'</li>';
	echo '</li>';
} 
}
?>
                        		</ul>
                            </li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>


