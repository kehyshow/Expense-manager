<?php
   include'include/common.php';
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
    <body>
       <?php
        include'include/header.php';
        ?>
        <div id="content">
           <div class="container">
               <div class="row">
                  <div class="col-md-4 col-md-offset-4">
                      <div class="panel panel-info">
                         <div class="panel-heading">
                             <center>
                                 <p>Change Password</p>
                             </center>
                          </div>
                          <div class="panel-body">
                             <form method="post" action="setting_script.php">
                                 <div class="form-group"><label for="oldPassword">OLd Password</label>
                              <input type="password" class="form-control" name="oldPassword" placeholder="Old Password">
                                 </div>
                                 <div class="form-group">
                              <label for="newPassword">New Password</label>
                              <input type="password" class="form-control" name="newPassword" placeholder="New Password(Min. 6 characters)">
                                 </div>
                              <div class="form-group">
                                 <label for="newPasswordRe">Confirm New Password</label>
                                  <input type="password" class="form-control" name="newPasswordRe" placeholder="Retype New Password">
                                 </div>
                              <button class="btn btn-info btn-block">Change</button>
                              </form>
                          </div>
                      </div>
                   </div>
               </div>
            </div>
        </div>
        <?php
        include'include/footer.php';
        ?>
    </body>
</html>