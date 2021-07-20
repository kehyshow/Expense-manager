<?php
    require 'include/common.php';

    $email = $_POST['email'];
    $email = mysqli_real_escape_string($con , $email);

    $password = $_POST['password'];
    $password = mysqli_real_escape_string($con , $password);
    $password = md5($password);

    //To check entered password matches with the stored one
    $pass_query="SELECT * from users WHERE email = '$email'";
    $pass_query_result=mysqli_query($con,$pass_query);
    $pass_row=mysqli_fetch_array($pass_query_result);
    if($pass_row['password']!=$password){
        $pw_err="<span class'text-danger'>Incorect password</span>";
        header("location:login.php?pw_err=".$pw_err);
    }
    //If matched Fetch Data 
    $login_select_query = "SELECT id , email from users WHERE email = '$email' AND password = '$password'";
    $login_select_query_result = mysqli_query($con , $login_select_query) or die(mysqli_error($con));

    //Set Session Variables
    $total_rows_fetched = mysqli_num_rows($login_select_query_result);
    if($total_rows_fetched!=0){
        $row = mysqli_fetch_array($login_select_query_result);
        $_SESSION['email'] = $email;
        $_SESSION['user_id']=$row['id'];
        header("location:home_script.php");
    }
    else{
        $error = "<span class='text-danger'>Invalid Credentials</span>";
        header("location:login.php?error=".$error);
    }
?>