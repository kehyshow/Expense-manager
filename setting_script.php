<?php
  require'include/common.php';
 
  $user_id=$_SESSION['user_id'];

  $oldPassword = $_POST['oldPassword'];
    $oldPassword = mysqli_real_escape_string ($con , $oldPassword);
    $oldPassword = md5($oldPassword);

    $newPassword = $_POST['newPassword'];
    $newPassword = mysqli_real_escape_string ($con , $newPassword);
    $newPassword=md5($newPassword);

    $newPasswordRe = $_POST['newPasswordRe'];
    $newPasswordRe = mysqli_real_escape_string ($con , $newPasswordRe);
    $newPasswordRe = md5($newPasswordRe);

    $email = $_SESSION['email'];
     //To check oldPassword matches with the stored one 
    $select_query = "SELECT * FROM users WHERE id ='$user_id' AND password = '$oldPassword'";
    $select_query_result = mysqli_query($con , $select_query) or die(mysqli_error($con));
    $rows = mysqli_num_rows($select_query_result);
    
   //If Yes, Check NewPassword and Retype Password matches
    if ($rows > 0 && $newPassword==$newPasswordRe){
        
        $update_query = "UPDATE users SET password = '$newPassword' WHERE id = '$user_id'";
        $update_query_result = mysqli_query($con , $update_query) or die(mysqli_error($con));

        echo "<script>alert('Password changed')</script>";
        echo "<script>location.href='index.php'</script>";
    }else{
        echo "<script>alert('Invalid Credentials')</script>";
        echo "<script>location.href='setting.php'</script>";
    }
?>