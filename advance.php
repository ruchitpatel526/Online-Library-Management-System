<?php
if (isset($_GET["submit"])) {
    # code...
$type=$_GET["type"];
$data=mysqli_connect("localhost","root","","searchengine") or die();
$db=mysqli_query($data,"SELECT `filename`  FROM file  WHERE `type` = '$type'");

}
if (isset($_POST['logout'])) {
    setcookie('user', '', time() - 3600);
    header("location:login.php");

}


?>


<style type="text/css">

    .white{

        font-weight: bold;
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

    <body>

        <!-- Top content -->
        <div class="top-content">
        	 <h1 class="white"><strong>Search Engine </strong></h1>
             <form method="post" action="advance.php"><input type="submit" class="submit"  value="Logout" name="logout"></form>
             <br>
             <h2 class="white"><strong>Filter List </strong></h2>
             <form action="advance.php" method="get" >
             <select name="type">
                      <option value="jpeg">jpeg</option>
                      <option value="jpg">jpg</option>
                      <option value="pdf">Pdf</option>
                      <option value="docx">Docx</option>
                      <option value="doc">Doc</option>
                        <option value="ppt">ppt</option>
            </select>
            <input type="submit" id="sbtn" name="submit" value="Filter">
            </form>

            <?php

            if (isset($_GET["submit"])) {
    # code...
        $type=$_GET["type"];
        $data=mysqli_connect("localhost","root","","searchengine") or die();
        $db=mysqli_query($data,"SELECT `filename`  FROM file  WHERE `type` = '$type' ORDER BY `fid` DESC");


        if ($db == NULL) {
            echo "<p class=white >No File Found</p>";

        }
        else{

             foreach ($db as $name) {
            $name=$name['filename'];
            echo "<a class=white href=filed.php?rec=$name>$name</a>";
            echo "<br>";
            }
            }

            }


            ?>

        </div>



        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>


    </body>

</html>
