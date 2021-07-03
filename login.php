<?php
$result="";
if(isset($_COOKIE['signup'])){
	 echo "<script type='text/javascript'>alert('You Are Successfully Signed Up!!');</script>";
}
 if(isset($_GET["signupbtn"]))
{

	$flag=0;
	$finame=$_GET["fname"];
	 
	$mail=$_GET["emailid"];
	$passwd=$_GET["password"];	
	$passwd=crypt($passwd,83);

	if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$mail))
	{
		echo "<script type='text/javascript'>alert('Invalid Email!!');</script>";

	}elseif (!preg_match("/^[a-zA-Z ]*$/",$finame)) {

		 echo "<script type='text/javascript'>alert('Only letters and white space allowed in name');</script>";
	}
	 
	elseif (strlen($passwd)<8) {
		 echo "<script type='text/javascript'>alert('Password Must Be atleast 8 letter Long');</script>";
	}
	else{ 
	$data=mysqli_connect("localhost","root","","searchengine") or die();
	$db=mysqli_query($data,"SELECT `mail` FROM signin");
  	foreach ($db as $id) {
		$a=$id['mail'];
		if($a==$mail)
		{
		 	 $flag=1;
             break;
		}
	}
	
	if($flag==1){
		 
		echo "<script type='text/javascript'>alert('Email Is Already Registered!!');</script>";
	}
	if($flag==0){
		mysqli_query($data,"INSERT INTO signin VALUES(' ','$finame','$mail','$passwd','0')");
		echo "<script type='text/javascript'>alert('Successfully Registered');</script>";
		

	 }
	   echo $result; 
	}
 
}
if(isset($_GET["signinbtn"]))
{
	$ids=$_GET["email"];
    $psswd=$_GET["pass"];
    $psswd=crypt($psswd,83);
 
	$flag=0;
	if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$ids))
	{
		echo "<script type='text/javascript'>alert('Invalid Email!!');</script>";
	}
	else{ 
	$data=mysqli_connect("localhost","root","","searchengine") or die();
	$db=mysqli_query($data,"SELECT `mail` FROM signin");
	foreach ($db as $id) {
		if($id['mail']==$ids){
			$flag=1;
			break;
		}
	}
	if($flag==1){
		$db=mysqli_query($data,"SELECT `password` FROM signin WHERE `mail`='$ids'");
		$db=mysqli_fetch_assoc($db);
		if($db["password"]==$psswd)
		{
			setcookie("user",$ids,time()+1*60*60);
			header("location:index.php");
		}
		else{
			 
			echo "<script type='text/javascript'>alert('Email or Password Incorrect');</script>";
		}
	}
	 
}

}

?>

 




<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login &amp; Register</title>

        
         
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

       
        

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Blog </strong> Login &amp; Register</h1>
                             
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-5">
                        	
                        	<div class="form-box">
	                        	<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Login to our site</h3>
	                            		<p>Enter username and password to log on:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-key"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form role="form" action="login.php " method="get" class="login-form">
				                    	<div class="form-group">
				                    		<label class="sr-only" for="form-username" name=>Username</label>
				                        	<input type="text" name="email" placeholder="Email..." class="form-username form-control" id="form-username">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-password">Password</label>
				                        	<input type="password" name="pass" placeholder="Password..." class="form-password form-control" id="form-password">
				                        </div>
				                        <button type="submit" class="btn" name="signinbtn">Sign in!</button>
				                         
				                    </form>
			                    </div>
		                    </div>
		                
		                	 
	                        
                        </div>
                        
                        <div class="col-sm-1 middle-border"></div>
                        <div class="col-sm-1"></div>
                        	
                        <div class="col-sm-5">
                        	
                        	<div class="form-box">
                        		<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Sign up now</h3>
	                            		<p>Fill in the form below to get instant access:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-pencil"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form   action="login.php" method="get" class="registration-form">
				                    	<div class="form-group">
				                    		<label class="sr-only" for="form-first-name">Name</label>
				                        	<input type="text" name="fname" placeholder="Name..." class="form-first-name form-control" id="form-first-name">
				                        </div>
				                         
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-email">Email</label>
				                        	<input type="text" name="emailid" placeholder="Email..." class="form-email form-control" id="form-email">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-about-yourself">Password</label>
				                        	<input type="text" name="password" placeholder="Password..." class="form-email form-control" id="form-email">
				                        </div>
				                        <button type="submit" class="btn" name="signupbtn">Sign me up!</button>

				                    </form>
			                    </div>
                        	</div>
                        	
                        </div>
                    </div>
                    
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