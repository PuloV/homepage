
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
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>
        
    <link rel="stylesheet" type="text/css" href="css/metro-bootstrap.css">
    <link rel="stylesheet" href="docs/font-awesome.css">

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->

    
<?php require_once "menu_func.php"; ?> 
        <div class="container">
            <?php 
            require_once "print_functions.php";
            if (!array_key_exists('user', $_SESSION)) {
                require_once "index.php";
            }
            
                     $form =  ' <form class="navbar-form  navbar-search pull-left " action="add.php " method="post">
                          <label for="userreg">Име на линк:  <input class="span2 search-query pull-right" type="text" value="Име " name="bmrk_name" id="bmrk_name"> </label> <br />
                            <label for="passwordreg">Линк :  <input class="span2 search-query pull-right" type="text" value= "Линк" name="bmrk_link" id="bmrk_link"> </label><br />
                    
                              <button type="submit" class="btn label label-info pull-right">Добави</button> <br />
                             </form> <br/><br/><br />'  ;

                   
                    print_header("Добавяне на линк: ",$form);
            
                
            
            ?>
            
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
