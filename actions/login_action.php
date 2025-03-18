<?php
SESSION_start();

// get data
$email =$_POST['email'];
$passwd =$_POST['password'];
if(empty($email)||empty($passwd)){
    $_SESSION['input']="input are requried";
    header("location:../forms/login.php");
    exit;
}
// db connect
require("../includes/connection.php");
if(!$conect){
    die ('connection error');
}

$C_query = "SELECT * FROM users where `email`='$email'";
$result = mysqli_query($conect,$C_query);
if(mysqli_num_rows($result)<= 0 ){
    $_SESSION['error']="invalid username or password";
    header("location:../forms/login.php");
    exit;
}else{
    $image= mysqli_fetch_assoc($result);
    if(password_verify($passwd,$image['password'])){
        $_SESSION['login'] = true;
        header("location:../index.php");
        exit;
    } else{
        $_SESSION['error']="invalid username or password";
        header("location:../forms/login.php");
        exit;
    }
    
  
}
?>