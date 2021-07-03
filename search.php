<?php
$data=$_GET['id'];
if(isset($_COOKIE['user']))
{
$receiv=$_COOKIE['user'];
}
else
{
	$receiv="";
}
$found=0;
$length=strlen($data);
$dt=mysqli_connect("localhost","root","","searchengine") or die();
$db=mysqli_query($dt,"SELECT `filename` ,`detail`FROM file");
$tdata="";

foreach($db as $usid){
	$det=$usid['detail'];
	$fn=$usid['filename'];
	if ($data != "") {	 
	
if(stristr($data,substr($fn, 0,$length))){

   		$name=ucfirst($fn);

     $tdata=$tdata."<tr><td class=row><a class=white href=filed.php?rec=$fn>$name</a></td></tr>";
     $found=1;
 
}
if(stristr($data,substr($det, 0,$length))){

   		$name=ucfirst($fn);

     $tdata=$tdata."<tr><td class=row><a class=white href=filed.php?rec=$fn>$name</a></td></tr>";
     $found=1;
 
}
}
}

if($found==1){
	echo "<table class=searchtbl>$tdata</table>";
}
else{
	echo "<table class=searchtbl><tr><td class=row>No Match Found</td></tr></table>";
}

?>
 