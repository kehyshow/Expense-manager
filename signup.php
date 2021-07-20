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
         <title>Sign Up | CTRL Budget </title>
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
                        <!-- Signup Panel -->
                        <div class="panel panel-info">
                            <div class="panel-heading">
                               <h4 style="text-align:center">Sign Up</h4>
                            </div>
                            <!-- Panel Body -->
                            <div class="panel-body">
                               <form role="form" action="signup_script.php" method="POST">
                                   <div class="form-group">
                                       <label for="name">Name:</label>
                                       <input type="text" class="form-control" name="name" placeholder="Name">
                                   </div>
                                    <div class="form-group">
                                      <label for="email">Email:</label>
                                        <input type="email" class="form-control" placeholder="Enter Valid Email" name="email" required>
                                         <?php
                                if(isset($_GET['email_err'])){?>
                                 <span class="error text-danger"><?php echo $_GET['email_err'];?></span>
                                        <?php }?>
                                     </div>
                                     <div class="form-group">
                                        <label for="password">Password:</label>
                                         <input type="password" class="form-control" placeholder="Password (Min. 6 characters)" name="password" required>
                                          <?php
                                if(isset($_GET['pw_err'])){?>
                                 <span class="error text-danger"><?php echo $_GET['pw_err'];?></span>
                                        <?php }?>
                                        </div>
                                   <div class="form-group">
                                       <label for="contact">Phone Number:</label>
                                       <input type="tel" class="form-control" name="contact" placeholder="Enter Valid Phone Number (Ex. 8448444853)">
                                        <?php
                                if(isset($_GET['contact_err'])){?>
                                 <span class="error text-danger"><?php echo $_GET['contact_err'];?></span>
                                        <?php }?>
                                   </div>
                                        <button type="submit" name="submit" class="btn btn-info btn-block">Sign Up</button>
                                </form><br/>
                            </div>
                            <!-- Panel Body End -->
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