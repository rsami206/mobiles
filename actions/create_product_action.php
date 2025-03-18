<?php
session_start();
$name = $_POST['name'];
$price =$_POST['price'];
$discount_price=$_POST['discount_price'];
$ram=$_POST['ram'];
$storage =$_POST['storage'];
$screen_size= $_POST['screen_size'];
$brand = $_POST['brand'];
$model=$_POST['model'];
$description=$_POST['description'];

// validation todo
if($name=='' || $price=='' || $discount_price=='' || $ram=='' || $storage=='' || $screen_size=='' || $brand=='' || $model=='' || $description==''){
    $_SESSION['input']="All input data  are requried";
    header("location:../forms/create_product.php");
    exit;
}
// connect database
require("../includes/connection.php");

$image_name=null;
if(isset($_FILES['image'])){
    $type_allow=['image/png','image/jpg','image/jpeg'];
    $size_allow = 3 * 1024 * 1024 ;

    // validation type image

    if(in_array($_FILES['image']['type'],$type_allow)==false){
        $_SESSION['type']="extension is invalid";
        header("location:../forms/create_form.php");
        exit;
    }

    // validation image size

    if($_FILES['image']['size']> $size_allow){
        $_SESSION['size']="image size is to large";
        header("location:../forms/create_form.php");
        exit;
    }
    
    // get extantion of image

    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

    // make uniqe name

    $uniqe_name= time() . "." . $ext;
    $give_name="../uploads/" . $uniqe_name;

    // send name into our folder

    if(move_uploaded_file($_FILES['image']['tmp_name'] , $give_name)){
        $image_name=$uniqe_name;
        
    }
}

// run querry

$query = "INSERT INTO `products` ( `name`, `price`, `discount_price`, `ram`, `storage`, `screen_size`, `brand`, `model`, `image_name` ) VALUES ( '$name', $price, $discount_price, '$ram', '$storage', '$screen_size', '$brand', '$model', '$image_name')";
if(mysqli_query($conect,$query)){
    $_SESSION['insert']="insert data successfully";
    header("location: ../forms/create_product.php");
}else{
    echo mysqli_errno($conect);
}

// connection close
mysqli_close($conect);

?>
