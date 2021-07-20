<?php
   include'include/common.php';
   //To fetch  Budget details
   if(isset($_GET['plan_id'])){
       
       $plan_id=$_GET['plan_id'];
   }

   $datas=array();
   $data=array();
   $rowIndex=0;
      //To check if there are any expenses
     $expense="SELECT * FROM expense WHERE pid=$plan_id";
     $expense_res=mysqli_query($con,$expense) or die(mysqli_error($con));
     $exp_row=mysqli_num_rows($expense_res);
    
    //If Exist
    if($exp_row>0){
    //Join query to Fetch data from table 'expense' and 'plan'
   $sql="SELECT plan.id,expense.pid,plan.title,plan.budget,expense.exptitle,expense.amount,expense.paidby FROM plan INNER JOIN expense ON plan.id=expense.pid WHERE plan.id=$plan_id";

   $sql_res=mysqli_query($con,$sql) or die(mysqli_error($con));
   
   $rows=mysqli_num_rows($sql_res);
    //Storing data in associative arrray
   if($rows>0){
       while($data=mysqli_fetch_assoc($sql_res)){
           $datas[]=$data;
       }
     }
    $a=$rows;
   $totalAmt=0;

   while($a>0){
       $a--;
   $totalAmt=($totalAmt+$datas[$a]['amount']);
   } 
   //Remaining Amount
   if(isset($leftAmt)){
       $leftAmt=$datas[0]['budget']-$totalAmt;
   }else{
        $leftAmt=$datas[0]['budget']-$totalAmt;
   }
   //Individual Shares
    if($totalAmt==0){
        $share=0;
    }
     else{
    $share=$totalAmt/$rows;
     }
    }
//Else Fetch data From Plan
else{
        
        $plan="SELECT * FROM plan WHERE id=$plan_id";
       $plan_res=mysqli_query($con,$plan) or die(mysqli_error($con));
       
    $rows=mysqli_num_rows($plan_res);
   //Storing data in associative arrray
   if($rows>0){
       while($data=mysqli_fetch_assoc($plan_res)){
           $datas[]=$data;
       }
     }

   //Total Amount Spent
   $a=$rows;
   $totalAmt=0;
   
   //Remaining Amount
   if(isset($leftAmt)){
       $leftAmt=$datas[0]['budget']-$totalAmt;
   }else{
        $leftAmt=$datas[0]['budget']-$totalAmt;
   }
   //Individual Shares
    if($totalAmt==0){
        $share=0;
    }
     else{
    $share=$totalAmt/$rows;
     }
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
    </head>
    <body>
      <?php
        include'include/header.php';
        ?>
        <div id="content">
          <div class="container">
              <div class="row">
                 <div class="col-md-4 col-md-offset-4">
                     <!-- Panel With Two Columns Inside-->
                     <div class="panel panel-info">
                       <div class="panel-heading">
                            <center>
                                <b><?php if(isset($datas[0]['title'])){
                                    echo $datas[0]['title'];}?></b>
                           </center>
                         </div>
                         <div class="panel-body">
                             <!-- Left Side Column -->
                             <div class="col-xs-6 text-left " style="white-space:nowrap">
                             <h4><b>Initial Budget</b></h4>
                           <?php //Loop to display Peoples name
                                 $b=$rows;
                                 while($b>0){
                                     $b--;?>
                                 <h4><b><?php if(isset($datas[$b]['paidby'])){ echo $datas[$b]['paidby'];}?></b></h4>
                                <?php } ?>
                             <h4><b>Total Amount Spent</b></h4>
                             <h4><b>Remaining Amount</b></h4>
                            <h4><b>Individual Shares</b></h4>
                                  <?php //loop to diaplay peoples name
                                       $b=$rows;
                                       while($b>0){
                                          $b--; ?>
                                 <h4><b><?php if(isset($datas[$b]['paidby'])){echo $datas[$b]['paidby'] ;}?></b></h4>
                                 <?php }?>
                             </div>
                             <!-- Left Side Column End -->
                             <!-- Right Side Column -->
                             <div class="col-xs-6 text-right">
                                  <h4><?php if(isset($datas[0]['budget']))echo $datas[0]['budget'];?></h4>
                                  <?php //Loop to display Peoples contribution
                                 $b=$rows;
                                 while($b>0){
                                     $b--; ?>
                                 <h4><?php if(isset($datas[$b]['amount'])){echo $datas[$b]['amount'];}?></h4>
                                <?php }
                                 //loop end ?>
                                 <h4><?php echo $totalAmt; ?></h4>
                                 <h4 class="<?php if($leftAmt>0)
                                           {echo "text-success";}
                                     else{
                                       echo "text-danger";}?>">
                                     <?php echo $leftAmt; ?></h4>
                                 <h4><?php echo round($share,2); ?></h4>
                                 <?php //Loop to display individual Shares
                                       $b=$rows;
                                       $txt="";
                                 if(isset($datas[$b]['amount'])){
                                       while($b>0){
                                          $b--; ?>
                                 <h4 class="<?php if(round($datas[$b]['amount']-$share,2)>0){
                                                  echo "text-success";
                                                  $txt="Gets back &#8377;";}
                                                  else{ 
                                                      echo "text-danger";
                                                      $txt="Owes &#8377;";
                                                  }?>
                                            ">
                                    <?php 
                                           if($txt){echo $txt; }
                                           echo abs(round($datas[$b]['amount']-$share,2)) ?>
                                 </h4>
                                 <?php }//Loop End
                                 }?>
                             </div>
                             <!-- Right Side Column End -->
                              <center>
                                  <a href="planView.php?plan_id=<?php echo $plan_id; ?>"><button class="btn btn-info"><span class="glyphicon glyphicon-arrow-left"></span> Go Back</button></a>
                            </center>
                         </div>
                     </div>
                     <!-- Panel End -->
                  </div>
                  </div>
            </div>
        </div>
        <?php
        include'include/footer.php';
        ?>
    </body>
</html>