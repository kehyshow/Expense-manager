<?php 
require"include/common.php";
   //Inserting data to DB
   if(isset($_GET['plan_id'])){
  
       $plan_id=$_GET['plan_id'];
   }
   $plan_data=$_SESSION['plan_ar'];
   $rowIndex=0;
   
   $expTitle=$_POST['exptitle'];
   $expTitle=mysqli_real_escape_string($con,$expTitle);
  
   $expDate=$_POST['expdate'];
   $expTitle=mysqli_real_escape_string($con,$expTitle);

   $expAmt=$_POST['amount'];
   $expAmt=mysqli_real_escape_string($con,$expAmt);
 
   $paidBy=$_POST['paidby'];
   $paidBy=mysqli_real_escape_string($con,$paidBy);

//Bill Upload
$target_path=NULL;
   function GetImageExtension ($imagetype){
if ( empty ($imagetype)) return false ;
switch ($imagetype){
case 'image/bmp' : return '.bmp' ;
case 'image/gif' : return '.gif' ;
case 'image/jpeg' : return '.jpg' ;
case 'image/png' : return '.png' ;
default : return false ;
}
}
if (! empty ($_FILES[ "uploadedimage" ][ "name" ])) {
$file_name=$_FILES[ "uploadedimage" ][ "name" ];
$temp_name=$_FILES[ "uploadedimage" ][ "tmp_name" ];
$imgtype=$_FILES[ "uploadedimage" ][ "type" ];
$ext= GetImageExtension($imgtype);
$imagename=date( "d-m-Y" ). "-" .time().$ext;
$target_path = "img/" .$imagename;
move_uploaded_file($temp_name, $target_path);
}
   //Insert Query
$insert="INSERT INTO expense (pid,exptitle,expdate,amount,paidby,bill) VALUES ('$plan_id','$exptitle','$expDate','$expAmt','$paidBy','$target_path')";
   $inser_res=mysqli_query($con,$insert) or die(mysqli_error($con));


   //Calculating Remaining amount and Updating expense table
   if($inser_res){
       $remain="SELECT budget FROM plan WHERE id=$plan_id";
       $remain_res=mysqli_query($con,$remain) or die(mysqli_error($con));
       $re_rows=mysqli_num_rows($remain_res);
   if($re_rows>0){
       while($re_data=mysqli_fetch_assoc($remain_res)){
           $re_datas[]=$re_data;
       }
   }
       $remaining=$re_datas[$rowIndex]['budget']-$expAmt;
       $update="UPDATE plan SET remainingAmt=$remaining WHERE id=$plan_id";
       $update_res=mysqli_query($con,$update) or die(mysqli_error($con));
     header("location:planView.php?plan_id=$plan_id");
   }
?>