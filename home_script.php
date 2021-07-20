<?php
require'include/common.php';

if(isset($_SESSION['user_id'])){
    
   $user_id=$_SESSION['user_id'];
}
$plan_ar=array();
//Select Query To Fetch Data
$sql="SELECT * FROM plan WHERE uid='$user_id'";

$sql_result=mysqli_query($con,$sql) or die(mysqli_error($con));

$rows_fetched=mysqli_num_rows($sql_result);
 //creating an Associative Array to Store Plan data
if($rows_fetched>0){
    
    while($rows=mysqli_fetch_assoc($sql_result)){
        
        $plan_ar[]=$rows;
    }
}
$_SESSION['plan_ar']=$plan_ar;
header("location:home.php?rows_fetched=$rows_fetched");