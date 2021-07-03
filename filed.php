<?php
 
 

$filename=$_GET['rec'];
$data=mysqli_connect("localhost","root","","searchengine") or die();
$db=mysqli_query($data,"SELECT `filename` ,`type`,`author`,`subject`,`date`,`detail` FROM file  WHERE `filename` = '$filename'");
$db=mysqli_fetch_assoc($db);
$type=$db['type'];
$author=$db['author'];
$subject=$db['subject'];
$date=$db['date'];
$detail=$db['detail'];

if(isset($_COOKIE['user'])){
    $usid=$_COOKIE["user"];
    $data=mysqli_connect("localhost","root","","searchengine") or die();
    $db=mysqli_query($data,"SELECT `name`  FROM signin WHERE `mail`='$usid'");
    $db=mysqli_fetch_assoc($db);
    $fn=$db['name'];     
    $name=ucfirst($fn);  
    }
    
if(isset($_GET["delete"])) {

    $data=mysqli_connect("localhost","root","","searchengine") or die();
    $db=mysqli_query($data,"SELECT `permission`  FROM signin WHERE `mail`='$usid'");
    $db=mysqli_fetch_assoc($db);
    $fn=$db['permission']; 
    if($fn)
    {   


       $iff= mysqli_query($data,"DELETE FROM file WHERE `filename`='$filename'");
       if($iff)
        {header("location:index.php?del=1");}else{
        echo "<script type='text/javascript'>alert('File Didnt Deleted!!');</script>";}
      

    }
    else
    {
        header("location:index.php?per=1");
         
        
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

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> </title>

        
         
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

       
        

    </head>
    <style type="text/css">
        

        .form-bottom{
            position: relative;
            left: 20%;
            top: 30%;
            font-weight: bold;

            width: 60%;
            height: 50vh;
        }
        .white{
            color: white;
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
    </style>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	 <h1 class="white"><strong>Search Engine </strong></h1>
             <form method="post" action="filed.php"><input type="submit" class="submit"  value="Logout" name="logout"></form>



             <div class="form-bottom">
                <h2 ><strong>File Detailes </strong></h2>
                                    <form action="filed.php?rec=$filename" method="get" enctype="multipart/form-data" class="login-form">
                                        
                                        <div class="form-group">
                                             <?php
                                             echo "Filename:".$filename;
                                             ?>
                                             
                                        </div>
                                        <div class="form-group">
                                             
                                             <?php
                                             echo "Type :".$type ;
                                             ?>
                                        </div>
                                        <div class="form-group">
                                             <?php
                                             echo "Author :".$author ;
                                             ?>
                                             
                                        </div>
                                        <div class="form-group">
                                             <?php
                                             echo "Subject :".$subject ;
                                             ?>
                                             
                                        </div>
                                        <div class="form-group">
                                             <?php
                                             echo "Detailes :".$detail ;
                                             ?>
                                             
                                        </div>
                                        <div class="form-group">

                                             <?php
                                             $path="file/".$filename;
                                              
                                             ?>
                                             <a href="<?php echo $path ;?>" class="white">View & Download</a>
                                               
                                              <input type="submit" name="delete" value="Delete File">
                                             
                                        </div>
                                    </form>
                                     
        </div>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
         
    </body>

</html>