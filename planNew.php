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
                  <!-- Login Panel -->
                        <div class="panel panel-info">
                            <div class="panel-heading">
                               <h4 style="text-align:center">Create New Plan</h4>
                            </div>
                            <!-- Panel Body -->
                            <div class="panel-body">
                               <form role="form" action="planNew_script.php" method="POST">
                                    <div class="form-group">
                                      <label for="budget" style="font-size:13px;">Initial Budget</label>
                                        <input type="number" class="form-control" placeholder="Initial Budget (Ex. 4000)" name="budget" required>
                                        <?php
                                           if(isset($_GET['budget_err'])){
                                               echo $_GET['budget_err'];
                                           }?>
                                     </div>
                                     <div class="form-group">
                                        <label for="people" style="font-size:13px;">How many peoples you want to add in your group?</label>
                                         <input type="number" class="form-control" placeholder="No. of people" name="people" required>
                                         <?php 
                                            if(isset($_GET['people_err'])){
                                                echo $_GET['people_err'];
                                            }?>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-block btn-info">Next</button>
                                </form><br/>
                            </div>
                    </div>     <!-- Panel Body End -->
                 </div>
             </div>
           </div>
        </div>
        <?php
        include'include/footer.php';
        ?>
    </body>