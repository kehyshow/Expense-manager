<?php
    require 'include/common.php';

    $name = $_POST['name'];
    $name = mysqli_real_escape_string($con , $name);

    $email = $_POST['email'];
    $email = mysqli_real_escape_string($con , $email);

    $password = $_POST['password'];
    if(strlen($password)<6){
         $error = "Pasword must have atleast 6 characters.";
        header('location:signup.php?pw='.$error);
    }
    $password = mysqli_real_escape_string($con , $password);
    $password = md5($password);

    $contact = $_POST['contact'];
    $contact = mysqli_real_escape_string($con , $contact);

    $email_regex = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";

    //check whether email already exists
    $select_query = "SELECT * from users WHERE email = '$email'";
    $select_query_result = mysqli_query($con , $select_query) or die(mysqli_error($con));
    $select_rows = mysqli_num_rows($select_query_result);
    if($select_rows!=0){
         $email_err = "Email already exist.";
        header('location:signup.php?email_err='.$email_err);
    }else if(!preg_match($email_regex , $email)){
         $email_invalid = "Invalid email.";
        header('location:signup.php?email_err='.$email_invalid);
    }else if(!$contact>0){
         $contact_err = "Incorrect contact number.";
        header('location:signup.php?contact_err='.$contact_err);
    }else if(!(strlen($contact)==10)){
        $contact_err="Number must be 10 digit.";
        header('location:signup.php?contact_err='.$contact_err);
    }
    //if not then insert to DB
    else{
        $insert_query = "INSERT INTO users (name,email,phone,password) VALUES ('$name','$email','$contact','$password')";
        $inser_query_result = mysqli_query($con , $insert_query) or die(mysqli_error($con));
        $user_id = mysqli_insert_id($con);
        $_SESSION['user_id'] = $user_id;
        $_SESSION['email'] = $email;
        header('location:home_script.php');
    }

?>