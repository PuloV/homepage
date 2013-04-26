<?php 
require_once "db_config.php";
require_once "print_functions.php";
if (!isset($_SESSION)) {
	session_start();
}
if(!array_key_exists('user', $_SESSION))
{ header("location index.php");}
print_well("<h3>Здравей , ".$_SESSION['user'] ." </h3><br /> Твоите  страници са :" );

$sql = "SELECT bmrk_id , bmrk_name, bmrk_link
		FROM bookmarks
		WHERE user_id ='" .$_SESSION['id']."'" ;
		
$result = $mysqli-> query($sql);
if(!$result)
{
	die($mysqli->error);
}
$i=0;
echo '</div> <div class = "pull-right">';

while($query = $result->fetch_object())
{
	$useColour=$i%10;
	
	if($i%3 == 0) echo '<div class="rows">';
	
		print_one_box($query->bmrk_name  ,$query->bmrk_link , $colour[$useColour] ,"editlink.php?id=".$query->bmrk_id ,"editme");
	
	if($i%3 == 2) echo '</div> ';
	$i++;
}
if ($i>5) {
	print_one_box("Add Page !" ,"addlink.php" , $colour[$useColour] ,"addlink.php", "addme"); 
}
while ( $i<= 5) {
	$useColour=$i%10;
	
	if($i%3 == 0) echo '<div class="rows">';
	
		
	print_one_box("Add Page !" ,"addlink.php" , $colour[$useColour] ,"addlink.php", "addme"); 
	if($i%3 == 2) echo '</div> ';
	$i++;
}
echo '</div>';
?>
