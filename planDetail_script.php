<?php

  require'include/common.php';

  $user_id=$_SESSION['user_id'];
  $plan_id=$_SESSION['plan_id'];
  $person=array();
 
  //To fetch number of people
   $sql="SELECT NumOfPeople FROM plan WHERE id=$plan_id AND uid=$user_id";
   $sql_result=mysqli_query($con,$sql) or die(mysql_error($con));
   $row=mysqli_num_rows($sql_result);
    if($row>0){
       $b=$NumOfPeople=$row['NumOfPeole'];
    }

  $title=$_POST['title'];
  $title=mysqli_real_escape_string($con,$title);

  $startDate=$_POST['startDate'];
  $startDate=mysqli_real_escape_string($con,$startDate);

  $endDate=$_POST['endDate'];
  $endDate=mysqli_real_escape_string($con,$endDate);
  
//$person array to store people names
  if(isset($NumOfPeople)){
      
      while($NumOfPeople>0){
      
      $person[]=$_POST['people'];
      $NumOfPeople--;
    }
  }
  //Update Query 
   $update="UPDATE plan SET title='$title',startDate='$startDate',endDate='$endDate' WHERE uid=$user_id AND id=$plan_id";
   $update_result=mysqli_query($con,$update) or die(mysqli_error($con));
  //Insert Query for Peoples Name
   while($b>0){
       $b--;
   $insert="INSERT INTO people(name) VALUES ('$person[$b]')";
   $insert_result=mysqli_query($con,$insert) or die(mysqli_error($con));
   }
   
  header("location:home_script.php");
?>