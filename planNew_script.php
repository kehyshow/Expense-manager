<?php
   require'include/common.php';
   
   $user_id=$_SESSION['user_id'];

   $budget=$_POST['budget'];
   $budget=mysqli_real_escape_string($con,$budget);
  
   $remaining=$budget;
   
   $NumOfPeople=$_POST['people'];
   $NumOfPeople=mysqli_real_escape_string($con,$NumOfPeople);

    //To Check Entered Numbers are +ve
   if($budget<0){
       $budget_err="<span class='text-danger'>Incorrect input!</span>";
       header("location:planNew.php?budget_err=".$budget_err);
   }
   if($NumOfPeople<0){
       $people_err="<span class='text-danger'>Incorrect input!</span>";
       header("location:planNew.php?people_err=".$people_err);
   }
  //Insert Query
   $insert_query="INSERT INTO plan (uid,budget,remainingAmt,NumOfPeople) VALUES ('$user_id','$budget','$remaining','$NumOfPeople')";
   
   $insert_query_result=mysqli_query($con,$insert_query) or die(mysqli_error($con));

   //To get id From the last query
   $plan_id=mysqli_insert_id($con);
   $_SESSION['plan_id']=$plan_id;

   header("location:planDetail.php")
?>