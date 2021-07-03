<?php

 if(isset($_COOKIE['user'])){
	$usid=$_COOKIE["user"];
	$data=mysqli_connect("localhost","root","","searchengine") or die();
	$db=mysqli_query($data,"SELECT `name`  FROM signin WHERE `mail`='$usid'");
	$db=mysqli_fetch_assoc($db);
	$fn=$db['name'];
	$name=ucfirst($fn);	 
}
if(isset($_POST["back"])) {
	header("location:index.php");

}

if(isset($_POST["submit"])) {
 
$target_dir = "file/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if (file_exists($target_file)) {
    //echo "Sorry, file already exists.";
    echo "<script type='text/javascript'>alert('Sorry, file already exists.');</script>";
    $uploadOk = 0;
}

 if ($uploadOk == 0) 
 {
    //echo "Sorry, your file was not uploaded.";
    echo "<script type='text/javascript'>alert('Sorry, your file was not uploaded.');</script>";
 
} 
else
{
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) 
    {
        //echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";

        $name=basename( $_FILES["file"]["name"]);
        $author =$_POST["author"];
        $detail =$_POST["detail"];
        $subject =$_POST["subject"];
        //$type =filetype($_FILES["file"]["name"]);
        $type = pathinfo($name, PATHINFO_EXTENSION); 
        $date =date("Y/m/d");
        $data=mysqli_connect("localhost","root","","searchengine") or die();
        mysqli_query($data,"INSERT INTO file VALUES('$name','$type','$author','$subject','$date','$detail',' ')");
        echo "<script type='text/javascript'>alert('File Has Been Uploaded');</script>";
    } else
     {
        echo "Sorry, there was an error uploading your file.";
    }
}
}


if (isset($_POST['logout'])) {
	setcookie('user', '', time() - 3600);	
    header("location:login.php");
	 
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
	width:73%;
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
        	 <form method="post" action="upload.php"><input type="submit" class="submit"  value="Logout" name="logout"></form>
       	 	<div class="form-bottom">
				                    <form action="upload.php" method="post" enctype="multipart/form-data" class="login-form">
				                    	<input type="file" class="btn" name="file"> 
				                    	<div class="form-group">
				                    		<label class="sr-only" for="form-username" name=>Author or Name</label>
				                        	<input type="text" name="author"  class="form-username form-control" id="form-username" placeholder="Author...">
				                        </div>
				                        <div class="form-group">
				                    		<label class="sr-only" for="form-username" name=>Subject</label>
				                        	<input type="text" name="subject"  class="form-username form-control" id="form-username" placeholder="Subject...">
				                        </div>
				                        <div class="form-group">
				                    		<label class="sr-only" for="form-username" name=>Tell The field It is Related to:</label>
				                        	<input type="text" name="detail"  class="form-username form-control" id="form-username" placeholder="Tell The field It is Related to:...">
				                        </div>
				                        <button type="submit" class="btn" name="submit">Upload</button>
				                        
				                         
				                    </form>
				                    <form action="upload.php" method="post">
				                    <button  class="btn" name="back">Back</button>
				                     </form>
		</div>
			
		</div>
	 

            
         

       
		</div>
        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
         
    </body>

</html> 