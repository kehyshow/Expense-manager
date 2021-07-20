<?php
require 'include/common.php';

 if(isset($_SESSION['email'])){  
     
     header('location:home.php');
     
  }
?>
<!DOCTYPE html>
<html lang="en">
     <head>
        <meta name="viewport" content="width=device-width,initial-scale=1">
         <title>Login | CTRL Budget </title>
         <!-- Bootstrap Core CSS -->
         <link href="css/bootstrap.min.css" rel="stylesheet">
         <!-- Custom CSS -->
         <link href="css/style.css" rel="stylesheet">
         <!-- jQuery -->
         <script src="js/jquery.js"></script>
         <!-- Bootstarp Core JavaScript -->
         <script src="js/bootstrap.min.js"></script>
    </head>
    <body style="background-color:#f9f9f9">
        <!-- Header -->
       <?php
        include 'include/header.php';
        ?>
        <!-- Header End -->
        <div id="content">
            <div class="container-fluid decor-bg" id="login-panel">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <!-- Login Panel -->
                        <div class="panel panel-info">
                            <div class="panel-heading">
                               <h4 style="text-align:center">LOGIN</h4>
                            </div>
                            <!-- Panel Body -->
                            <div class="panel-body">
                               <form role="form" action="login_script.php" method="POST">
                                    <div class="form-group">
                                      <label for="email">Email:</label>
                                        <input type="email" class="form-control" placeholder="Email" name="email" required>
                                     </div>
                                     <div class="form-group">
                                        <label for="password">Password:</label>
                                         <input type="password" class="form-control" placeholder="Password" name="password" required>
                                             <?php //To Show Error If any
                                        if(isset($_GET['pw_err'])){
                                            echo $_GET['pw_err'];
                                        }?>
                                         <?php  //To Show Error If any
                                        if(isset($_GET['error'])){
                                            echo $_GET['error'];
                                        }?>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-info btn-block">Login</button>
                                </form><br/>
                            </div>
                            <!-- Panel Body End -->
                            <!-- Panel Footer -->
                            <div class="panel-footer">
                               <p>Don't have an account? <a href="signup.php">Click here to Sign Up</a></p>
                            </div>
                            <!-- Panel Footer End -->
                        </div>
                    </div>
                </div>
            </div>
    <!-- Footer -->   
        </div>
        <?php
        include'include/footer.php';
        ?>  
   <!-- Footer End -->
    </body>
</html>