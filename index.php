<?php
 if(isset($_COOKIE['user'])){
	$usid=$_COOKIE["user"];
	$data=mysqli_connect("localhost","root","","searchengine") or die();
	$db=mysqli_query($data,"SELECT `name`  FROM signin WHERE `mail`='$usid'");
	$db=mysqli_fetch_assoc($db);
	$fn=$db['name'];
	 
	$name=ucfirst($fn);	 
}
if(isset($_GET['per'])){

$per=$_GET['per'];
 if ($per) {
echo "<script type='text/javascript'>alert('You Dont Have access For Delete Operation!!');</script>";
}
}

if(isset($_GET['del'])){
$del=$_GET['del'];
if ($del) {
echo "<script type='text/javascript'>alert('File Deleted!!');</script>";
}
}
?>

 




<!DOCTYPE html>
<html lang="en">

    <head>


<style type="text/css">
	
.searchbar{
	
	padding-top: 6%;
	width: 100%;
	margin:0 auto;
}
#sbtn{
	background-color:#131010;
	color: white;
	text-shadow: 0 -1px 0 #000;
	border:1px solid #131010;
	border-radius: 6px;
	width:24%;
	height: 5.8vh;
	
}
.submit{
    background-color:#131010;
    color: white;
    text-shadow: 0 -1px 0 #000;
    border:1px solid #131010;
    border-radius: 6px;
    width:24%;
    height: 5.8vh;

    }
#sbar{
	background-color: white;
	color: black;
	border:1px solid #131010;
	border-radius: 3px;
	width:63%;
	height: 5vh;
	box-shadow: 2px 2px 5px #131010;
    
}
.searchtbl{
	background:linear-gradient(#131010,#09b4f2);
	color: white;
	width: 100%;
	border: 2px solid white;
	border-radius: 8px;
	

}
.row {
margin-left: auto;
margin-right: auto;
margin-bottom: 20px; 
}
#sbtn2{
	background-color:#131010;
	color: white;
	text-shadow: 0 -1px 0 #000;
	border:1px solid #131010;
	border-radius: 6px;
	width:100%;
	height: 5.8vh;
	
}
.pform2{
	padding-left: 5px;
	 
}
#sbtn3{
	background-color:#131010;
	color: white;
	text-shadow: 0 -1px 0 #000;
	border:1px solid #131010;
	border-radius: 6px;
	width:16%;
	height: 5.8vh;
	
}
 
.pform1{
	float: right;
	 
}
#sbar1{
	background-color: white;
	color: black;
	border:1px solid #131010;
	border-radius: 3px;
	width:80%;
	height: 5vh;
	box-shadow: 2px 2px 5px #131010;
    
}
.white{
	color: white;
}

</style>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login &amp; Register</title>

        
         
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="css/style.css">

       
        

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	<h1 class="white"><strong>Search Engine </strong></h1>
        	 <form method="post" action="index.php"><input type="submit" class="submit"  value="Logout" name="logout"></form>
       	<div class="searchbar">
					<input type="searchengine" name="sengine" placeholder="Search..." id="sbar" onkeyup="search(this.value)">
					




					<button id="sbtn">Search</button>
					
					 
		<div id="dropdown"></div>
		</div>
		<div class="upload">
			<br>
			<form action="upload.php" method="post">
				
				<input type="submit" name="upload" value="Upload" id="sbtn">
			</form>
			<br>

			<form action="advance.php" method="post">
				
				<button id="sbtn">Go to Advanced Filter Option</button>
			</form>
			
		</div>
	 

            
         

       
		</div>
        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
         
    </body>

</html>

<script type="text/javascript">
	function search(val1)
	{
		if(val1==""){
		document.getElementById("dropdown").innerHTML="";
		return;
					}
	else{
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {

			if (this.readyState == 4 && this.status == 200) {

				document.getElementById("dropdown").innerHTML = this.responseText;	
			}

											};
		xhttp.open("GET", "search.php?id="+val1, true);
		xhttp.send();
		}
	}

</script>