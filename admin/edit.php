<?php
require_once "db_config.php";
session_start();
if(!array_key_exists("admin", $_SESSION))
{
	header('location : index.php');
}
if(array_key_exists("menu_name", $_POST) )
{
	$sql = "UPDATE menu 
	 		SET  menu_name = '".$_POST['menu_name']."' , menu_addr = '".$_POST['menu_addr']."' , menu_type ='".$_POST['menu_type']."'
			WHERE menu_id = '".$_GET['id']."' 
	";
	$result = $mysqli->query($sql);
	if (!$result) {
		die($mysqli->error);
	}
	header('location: acp.php');
}

$sql = "SELECT * FROM menu  WHERE menu_id = '".$_GET['id'] . "'" ;

 ?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->

       <!-- <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">Project name</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li class="active"><a href="#">Home</a></li>
                            <li><a href="#about">About</a></li>
                            <li><a href="#contact">Contact</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li class="nav-header">Nav header</li>
                                    <li><a href="#">Separated link</a></li>
                                    <li><a href="#">One more separated link</a></li>
                                </ul>
                            </li>
                        </ul>
                        <form class="navbar-form pull-right" action='login.php' method='post'>
                            <input class="span2" type="text" placeholder="user" name='user' id='user'>
                            <input class="span2" type="password" placeholder="password" name='password' id='password'>
                            
                            <input type='submit'class="btn" name='Submit' value='Submit' />
                        </form>
                    </div><!--/.nav-collapse 
                </div>
            </div>
        </div>
--> 
<?php require_once "menu_func.php"; ?>
        <div class="container">

            <!-- Main hero unit for a primary marketing message or call to action -->
            <div class="hero-unit">
                <h1>Добре дошъл <?php echo $_SESSION['user']; ?></h1>
                <p>Променме линкове а ? </p>
               
            </div>

            <!-- Example row of columns -->
            <div class="row">
                <div class="span4">
                    <h2>Добавяне на Меню</h2>
                    <?php 
                    $result = $mysqli->query($sql);
					if(!$result) { die($mysqli->error); }
					$query = $result->fetch_object();

                   echo '  <p> <form class="navbar-form pull-right" action="edit.php?id= '.$query->menu_id .' " method="POST"> 
                            <input class="span2" type="text" placeholder="Име" name="menu_name" id="menu_name" value="'.$query->menu_name.' " ><br />
                            <input class="span2" type="text" placeholder="Линк" name="menu_addr" id="menu_addr" value= "'. $query->menu_addr .' "  ><br /> '; 
                            ?>
                            <select name="menu_type" id="menu_type" >
                                <option value ="top">Меню</option>
                                <option value ="dropdown">Drop</option>
                                <option value ="usermenu">User</option>
                            </select>
                            <br />
                            <input type="submit" class="btn" name="Submit" value="Submit" />
                        </form> 
                    </p>
                </div>
               <!-- <div class="span4">
                    <h2>Heading</h2>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    <p><a class="btn" href="#">View details &raquo;</a></p>
               </div>
                <div class="span4">
                    <h2>Heading</h2>
                    <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                    <p><a class="btn" href="#">View details &raquo;</a></p>
                </div> -->
            </div>

            <hr>

            <footer>
                <p>&copy; Company 2012</p>
            </footer>

        </div> <!-- /container -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>

        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
