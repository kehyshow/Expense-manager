<?php
   include'include/common.php';

 if(isset($_SESSION['email'])){
        header("location:home_script.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
     <head>
        <meta name="viewport" content="width=device-width,initial-scale=1">
         <title>Welcome | CTRL Budget </title>
         <!-- Bootstrap Core CSS -->
         <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
         <!-- Custom CSS -->
         <link href="css/style.css" type="text/css" rel="stylesheet">
         <!-- jQuery -->
         <script src="js/jquery.js"></script>
         <!-- Bootstarp Core JavaScript -->
         <script src="js/bootstrap.min.js"></script>
    </head>
    <body style="padding-top:50px;">
        
         <?php
             include 'include/header.php'; 
         ?>
        <div>
            <!-- Main Banner Image -->
             <div id="banner_image">
                 <div class="container">
                     <center>
                         <!-- Banner Content -->
                         <div id="banner_content">
                             <h1>We help you control your budget</h1>
                             <br/>
                             <a href="login.php" class="btn btn-lg btn-info active">Start Today</a>
                         </div>
                         
                         <!-- Banner Content End -->
                     </center>
                 </div>
            </div>
            <!-- Main Banner Image End -->
        </div>
        <?php
           include 'include/footer.php';
        ?>
    </body>
</html>