<?php
   include'include/common.php';
    //$_SESSION['plan_ar'] from home_script.php
    //$_GET['rows_fetched'] from home_script.php
    $plan_data=array();
    if(isset($_SESSION['plan_ar'])){
   
        $plan_data=$_SESSION['plan_ar'];
    }
    if(isset($_GET['rows_fetched'])){
       
       $rowIndex=$a=$_GET['rows_fetched'];
    }
    
?>
<!DOCTYPE html>
<html lang="en">
     <head>
        <meta name="viewport" content="width=device-width,initial-scale=1">
         <title>Welcome | CTRL Budget </title>
         <!-- Bootstrap Core CSS -->
         <link href="css/bootstrap.min.css" rel="stylesheet">
         <!-- Custom CSS -->
         <link href="css/style.css" rel="stylesheet">
         <!-- jQuery -->
         <script src="js/jquery.js"></script>
         <!-- Bootstarp Core JavaScript -->
         <script src="js/bootstrap.min.js"></script>
         <style>
             .box{
                 display: grid;
                 place-items:center;
             }
             .center-box{
                 width: 200px;
                 height: 200px;
                 display: grid;
                 place-items:center;
                 background-color: beige;
                 
             }
             .box-text{color:#46b8da;}
         </style>
    </head>
    <body style="background-color:#f9f9f9">
      <?php
         
          include 'include/header.php';
        ?>
        
        <div id="content">
           <div class="container">
               <div class="row">
                  <!--To check if any plan exist-->
                  <?php 
                   if(isset($_GET['rows_fetched'])){
                       
                       if($_GET['rows_fetched']==0){
                          echo" <h2>you don't have any active plan</h2>";?>
                   <!-- Display BOX  -->
                      <div class="box">
                          <div class="center-box">
                     <a href="planNew.php"><h5><span class="box-text glyphicon glyphicon-plus-sign"></span>Create a New Plan</h5></a> 
                       </div>
                   </div>
                   <!-- Display Box End -->
                     <?php  }
                   else{
                   //***If Exist Display mini Plan Panel(s)*** 
                       
                   //Looping Panel as Per Number Of Plans   
                   while($a>0)
                   { $a--;?>
                       <div class="col-md-3">
                     <div class="panel panel-info">
                         <!-- Panel Header -->
                          <div class="panel-heading">
                              <p><center><?php if(isset($plan_data[$a]['title'])){
                                     echo $plan_data[$a]['title'];  }?>
                                  <span class="glyphicon glyphicon-user" style="float:right;">
                                      <?php if(isset($plan_data[$a]['NumOfPeople'])){
                                      echo $plan_data[$a]['NumOfPeople'];}?></span>
                                  </center></p>
                          </div>
                         <!-- Panel Header End -->
                         <!-- Panel Body with Two Columns Inside -->
                          <div class="panel-body">
                              <!-- Left Column -->
                              <div class="col-xs-4 text-left">
                                 <h4><b>Budget</b></h4>
                                  <h4><b>Date</b></h4>
                              </div>
                              <!-- Left Column End -->
                              <!-- Right Column -->
                              <div class="col-xs-8 text-right">
                                  <h4><?php 
                               if(isset($plan_data[$a]['budget'])){
                                  echo $plan_data[$a]['budget'];
                               }?></h4>
                                  <h5 style="white-space:nowrap;"><?php 
                                  if(isset($plan_data[$a]['startDate'])){
                                      echo $plan_data[$a]['startDate']; }
                                    echo"/";
                                  if(isset($plan_data[$a]['endDate'])){
                                      echo $plan_data[$a]['endDate'];
                                  } ?></h5>
                              </div>
                              <!-- Right Column End -->
                             <a href="planView.php?plan_id=<?php echo $plan_data[$a]['id'];?>" ><button class="btn btn-info btn-block btn-sm">View Plan</button></a>
                          </div>
                         <!--Panel Body End -->
                       </div>
                   </div>
                    <?php $rowIndex--;}
                   // Panel Body with Two Column Inside End
                   }}?>
               </div>
            </div>
         <!-- Add Icon -->    
        </div>
           <a href="planNew.php"><span class="glyphicon glyphicon-plus-sign" style="font-size:45px;float:right;top:-100px;right:30px;z-index:99;"></span></a>
        <!--Add Icon End -->
       <?php 
        include 'include/footer.php';
        ?>
        
    </body>
</html>
