<?php
   //Connection 
   include'include/common.php';
   //To index different Peoples Name
    $people=array();
   //Fetching Budget and No. of Peoples
   $plan_ar=array();
   $user_id=$_SESSION['user_id'];
   $plan_id=$_SESSION['plan_id'];
   
//Fetch data To store in $plan_ar() array
   $sql="SELECT budget,NumOfPeople FROM plan WHERE uid=$user_id AND id=$plan_id";
   $sql_result=mysqli_query($con,$sql) or die(mysqli_error($con));

   //Creating an Associative Array
   if(mysqli_num_rows($sql_result)>0){
  
       while($rows=mysqli_fetch_assoc($sql_result)){
      
           $plan_ar[]=$rows;
       }
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
  <body>
     <?php 
      include'include/header.php';
      ?>
       <!-- Main -->
    
        <div id="content">
        <div class="container">
        <div class="col-md-4 col-md-offset-4">
            <!-- Panel Start -->
          <div class="panel">
              <!-- Form Start -->
              <form class="form" action="planDetail_script.php" method="POST">
                  <div class="row">
                        <div class="form-group col-xs-10 col-xs-offset-1">
                         <label for="title">Title</label>
                      <input type="text" name="title" class="form-control" placeholder="Enter title (Ex. Trip to Goa)">
                      </div>
                  </div>
                <div class="row">
                    <div class=" col-xs-5 col-xs-offset-1">
                        <label for="email">From</label>
                    <input type="date" name="startDate" class="form-control"placeholder="dd/mm/yyyy" required>
                    </div>
                    <div class="col-xs-5">
                     <label for="dateTo">To</label>
                    <input type="date" name="endDate" class="form-control" placeholder="dd/mm/yyyy" required>
                    </div></div><br/>
                  <div class="row">
                     <div class="form-group col-xs-6 col-xs-offset-1">
                        <label for="initial">Initial Budget</label>
                         <input type="number" name="budget" class="form-control" value="<?php echo $plan_ar[0]['budget']?>" disabled>
                      </div>
                      <div class="col-xs-4">
                      <label for="peoples">No. of people</label>
                          <input type="number" name="peoples" class="form-control"value="<?php echo $plan_ar[0]['NumOfPeople']?>" disabled>
                      </div>
                  </div>
                  <!-- name="people[]" will store peoples names in Array -->
                  <!-- Looping This segment of code as per No. of Peopple -->
                  <?php 
                   $a=$plan_ar[0]['NumOfPeople'];
                    $b=1;            
                  while($a>0){?>
                  <div class="row">
                     <div class="form-group col-xs-10 col-xs-offset-1">
                        <label for="people[]">Person <?php echo $b; ?></label>
                         <input type="text" name="people[]" class="form-control" placeholder="Person <?php echo $b; ?> Name">
                      </div>
                  </div>
                  <?php 
                        $b++;
                        $a--;} ?>
                  <!-- Loop End -->
                <div class="row">
                    <div class=" form-group col-xs-6 col-xs-offset-1">
                <button type="submit" class=" col-xs-12 col-xs-offset-4 btn btn-info btn-md" data-dismiss="modal">Submit</button>
                </div>
                  </div>
              </form>
            <!-- Form End -->
            </div>
            <!-- Panel End -->
            </div>
            </div>
            </div>     
    <!-- Main End -->
      <?php 
      include'include/footer.php';
      ?>
    </body>
</html>