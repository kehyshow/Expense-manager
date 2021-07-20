<?php
  include'include/common.php';

   $user_id=$_SESSION['user_id'];
   if(isset($_GET['plan_id'])){
  
       $plan_id=$_GET['plan_id'];
   }

   $plan_ar=array();
   $name_ar=array();
   $exp_ar=array();

   $rowIndex=0;
   //TO fetch names
   $sql="SELECT * FROM people WHERE pid=$plan_id";
   $sql_res=mysqli_query($con,$sql) or die(mysqli_error($con));
   if($sql_res){ 
   $rows_fetched=mysqli_num_rows($sql_res);
   if($rows_fetched>0){
       while($rows=mysqli_fetch_assoc($sql_res)){
           $names_ar[]=$rows;
       }
     }
   }

   //To fetch Expense Detail
    $exp="SELECT * FROM expense WHERE pid=$plan_id";
   $exp_res=mysqli_query($con,$exp) or die(mysqli_error($con));
   if($exp_res){ 
   $exp_rows=mysqli_num_rows($exp_res);
   if($exp_rows>0){
       while($row=mysqli_fetch_assoc($exp_res)){
           $exp_ar[]=$row;
       }
     }
   }
  //To fetch Plan data
   $plan="SELECT * FROM plan WHERE id=$plan_id";
   $plan_res=mysqli_query($con,$plan) or die(mysqli_error($con));
   if($plan_res){ 
   $plan_rows=mysqli_num_rows($plan_res);
   if($plan_rows>0){
       while($plan_row=mysqli_fetch_assoc($plan_res)){
           $plan_ar[]=$plan_row;
       }
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
        <div class="container">
            <!-- Plan Detail and Expense Distribution Row -->
           <div class="row">
               <!-- Plan Detail Panel -->
              <div class="col-md-6">
                  <div class="panel panel-info">
                     <div class="panel-heading text-center">
                         <h5>
                             <?php 
                             echo $plan_ar[$rowIndex]['title'];
                             ?>
                             <span class="glyphicon glyphicon-user" style="float:right;"><?php echo $plan_ar[$rowIndex]['NumOfPeople'];?></span></h5>
                      </div>
                      <div class="panel-body">
                          <!-- Inner Left Coumn -->
                          <div class="col-xs-6 text-left">
                              <h4><b>Budget</b></h4>
                              <h4><b>Remaining</b></h4>
                              <h4><b>Date</b></h4>
                          </div>
                          <!-- Inner Right Column-->
                           <div class="col-xs-6 text-right">
                             <h4> <?php 
                             echo $plan_ar[$rowIndex]['budget'];
                                  ?></h4>
                               <h4><?php 
                             echo $plan_ar[$rowIndex]['remainingAmt'];
                             ?></h4>
                               <h4><?php 
                             echo $plan_ar[$rowIndex]['startDate'];
                             echo" to ";
                             echo $plan_ar[$rowIndex]['endDate'];
                              ?></h4>
                          </div>
                      </div>
                  </div>
               </div>
               <!-- Plan Detail Panel End -->
               <!-- Expense Distribution Button -->
               <div class="col-md-6">
                   <div style="margin-top:80px; margin-bottom:80px;text-align:center"><a href="planDistribution.php?plan_id=<?php echo $plan_id;?>"><button class="btn btn-lg btn-info">Expense Distribution</button></a>
                   </div>
               </div>
               <!-- Expense Distribution End -->
            </div>
             <!-- Plan Detail and Expense Distribution Row End -->
            <!-- Expense Detail and Add New Expense Row-->
            <div class="row">
                <!-- Expense Detail Panel Column -->
              <div class="col-md-6">
                  <?php $a=$exp_rows;
                
                while($a>0)
                { $a--;?>
                 
                <div class="col-md-6">
                 <div class = "panel panel-info">
         <div class = "panel-heading">
            <h3 class = "panel-title text-center"><?php echo $exp_ar[$a]['exptitle'];?></h3>
         </div>
         <div class = "panel-body text-center">
              <!-- Inner Left Column -->
         <div class="col-xs-4 text-left" style="white-space:nowrap">
             <h4><b>Amount</b></h4>
             <h4><b>Paid By</b></h4>
             <h4><b>Paid On</b></h4>
             </div>
             <!-- Inner Right Column -->
        <div class="col-xs-8 text-right">
             <h4><?php echo $exp_ar[$a]['amount'];?></h4>
            <h4><?php echo $exp_ar[$a]['paidby'];?></h4>
            <h4><?php echo $exp_ar[$a]['expdate'];?></h4>
         </div>
            <a href="<?php if(isset($exp_ar[$a]['bill'])){echo $exp_ar[$a]['bill'];}?>" target="_blank"> <?php if($exp_ar[$a]['bill']){
                    echo "Show Bill";
                  }else{
                    echo "You Don't have bill";
                }?></a>
            </div>
      </div>
                </div>
                <?php }?>
                </div>
                <!-- Expense Detail Panel Column End -->
                <!-- Add New Expense Panel Column -->
                <div class="col-md-4 col-md-offset-2">
                  <div class="panel panel-info">
                       <div class="panel-heading">
                         <h5><center>Add New Expense</center></h5>
                      </div>
                      <div class="panel-body">
                         <form action="planView_script.php?plan_id=<?php echo $plan_id;?>" method="post" enctype="multipart/form-data">
                         <div class="form-group"> 
                             <label for="exptitle">Title</label>
                             <input type="text" class="form-control" name="exptitle" placeholder="Expense Name" required></div>
                          <div class="form-group">
                                 <label for="expdate">Date</label>
                                 <input class="form-control" type="date" name="expdate" placeholder="dd/mm/yyyy" required></div>
                             <div class="form-group">
                                 <label for="amount">Amount Spent</label>
                                 <input class="form-control" type="number" name="amount" placeholder="Amount Spent" required></div>
                             <div class="form-group">
                                 <select class="form-control" name="paidby" placeholder="Choose">
                                   <option value="" selected>Choose</option>
                                    <?php 
                                     $b=$rows_fetched;
                                     while($b>0){
                                         $b--;
                                         $rows_fetched--;?>
                                         <option  value="<?php echo $names_ar[$b]['name'];?>"><?php echo $names_ar[$b]['name'];?></option>
                                   <?php  }  ?>
                                 </select>
                                         </div>
                             <div class="form-group">
                                 <label for="uploadedimage">Upload Bill</label>
                                 <input class="form-control" type="file" name="uploadedimage" placeholder="No File chosen"></div>
                             <div class="form-group">
                              <button type="submit" name="submit" class="btn btn-info btn-md btn-block">Add</button>
                             </div>
                          </form>
                      </div>
                    </div>
                </div>
                <!-- Add New Expense Panel Column End -->
            </div>
             <!-- Expense Detail and Add New Expense Row End -->
        </div>
        <?php
        include'include/footer.php';
        ?>
    </body>
</html>