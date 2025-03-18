<?php
session_start();

if(isset($_SESSION['login']) == false){
    header("location:../forms/login.php");
    exit;
}
// get data

$name = $_POST['name'];
$email = $_POST['email'];
$passwd = $_POST['password'];

// db connect

require("../includes/connection.php");
// hash the pssword
$hash_pawd=password_hash($passwd,PASSWORD_DEFAULT);
// select query and check given email already exit or not

$mail = "SELECT * FROM `users` WHERE email='$email'";
$result = mysqli_query($conect, $mail);
if (mysqli_num_rows($result) > 0) {
    $_SESSION['error'] = "this email is already exit";
    header("location:../forms/signup.php");
} else {
    $q1 =  "INSERT INTO `users` (`name`, `email`, `password`) VALUES ('$name', '$email', '$hash_pawd')";
    if (mysqli_query($conect, $q1)) {
        header("location:../forms/login.php");
    }}







// create query
