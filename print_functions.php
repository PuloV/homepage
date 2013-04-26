<?php 
function print_header($title , $text)
{
	echo '
	  <div class="hero-unit">
                <h1>'.$title .'</h1>
                <p>'.$text.'</p>
                <p><br/> <br /></p>
            </div>
            ';
}
function print_one_box($text , $link  ,$type ,$link2 ,$type2)
{
echo' <div class="span4"> <ul class="thumbnails">
                <li class="span3 tile tile-double '.$type.'"> '; 

                echo'<a href="'.$link2.'" class="link" ><div class = "link '.$type2.'" >  </div></a>
<a href="'.$link.' " target="_blank" >
                    <h4 class="tile-text">
                    '.$text.'    </h4>  
                </a></li></ul> </div>';
 }

 function print_row($t1 , $t2 , $t3)
 {
 	echo '<br /> <div class="rows">
 	 ' ;
 	 print_one_box($t1);
 	 print_one_box($t2);
 	 print_one_box($t3);
 	 echo '
 	 </div>';
 }
function print_warning($warning)
{
	echo '<div class="alert">
  <button class="close" data-dismiss="alert">×</button>
  <strong>Warning!</strong> '.$warning. '
</div> ';
}

$colour = array(
	'0' => "tile-blue" ,
	'1' => "tile-green",
	'2' => "tile-red",
	'3' => "tile-yellow",
	'4' => "tile-orange",
	'5' => "tile-pink",
	'6' => "tile-purple",
	'7' => "tile-lime",
	'8' => "tile-magenta",
	'9' => "tile-teal"
	 );
function print_well($text){
	echo '<div class="well">
  '.$text.'
</div>'; 
}