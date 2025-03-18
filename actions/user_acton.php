<?php
session_start();
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];


// validation todo
if ($name == '' || $email == '' || $password == '') {
    $_SESSION['input'] = "All input data  are requried";
    header("location:../user.php");
    exit;
}
// connect database
require("../includes/connection.php");

// run querry
$hshpas = password_hash($password, PASSWORD_DEFAULT);

$mail = "SELECT * FROM `users` WHERE email='$email'";

$result = mysqli_query($conect, $mail);

if (mysqli_num_rows($result) > 0) {
    $_SESSION['error'] = "this email is already exit";
    header("location:../user.php");
    exit;
} else {
    $q1 =  "INSERT INTO `users` (`name`, `email`, `password`) VALUES ('$name', '$email', '$hshpas')";
    if (mysqli_query($conect, $q1)) {
        $_SESSION['insert']="insert data successfully";
        header("location:../user.php");
    }
}
// connection close
mysqli_close($conect);
