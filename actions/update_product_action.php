<?php
session_start();
// get data
$id   = $_POST['id'];
$name = $_POST['name'];
$price =$_POST['price'];
$discount_price=$_POST['discount_price'];
$ram=$_POST['ram'];
$storage =$_POST['storage'];
$screen_size= $_POST['screen_size'];
$brand = $_POST['brand'];
$model=$_POST['model'];
$description=$_POST['description'];

// connect database
require("../includes/connection.php");
// run querry

$query = "UPDATE products SET `name`= '$name', `price`= '$price', `discount_price`= '$discount_price', `RAM` = '$ram', `storage`='$storage', `screen_size`='$screen_size', `brand`='$brand', `model`='$model'  WHERE id= $id";

if(mysqli_query($conect , $query)){
    $_SESSION['edit']="edit data successfully";
    header("location:../forms/product_select.php");
}else{
    echo mysqli_errno($conect);
}

// connection close
mysqli_close($conect);

?>
