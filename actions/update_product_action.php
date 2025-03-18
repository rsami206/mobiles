<?php
session_start();
// get data
$id   = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$discount_price = $_POST['discount_price'];
$ram = $_POST['ram'];
$storage = $_POST['storage'];
$screen_size = $_POST['screen_size'];
$brand = $_POST['brand'];
$model = $_POST['model'];
$description = $_POST['description'];

require("../includes/connection.php");
// get coustmer detail
$sq = "SELECT * FROM products WHERE id=$id";
    $result = mysqli_query($conect, $sq);
    $products = mysqli_fetch_assoc($result);

    if($products !== NULL) {
        // set image path with name
        $image_path = "../uploads/" . $products['image_name'];
        
        // confirm image is there
        if (file_exists($image_path) ) {
            unlink($image_path);
        } 

    } 

// connect database



$image_name = null;
if (isset($_FILES['image'])) {
    $type_allow = ['image/png', 'image/jpg', 'image/jpeg'];
    $size_allow = 3 * 1024 * 1024;

    // validation type image

    if (in_array($_FILES['image']['type'], $type_allow) == false) {
        $_SESSION['type'] = "extension is invalid";
        header("location:../forms/update_product.php");
        exit;
    }

    // validation image size

    if ($_FILES['image']['size'] > $size_allow) {
        $_SESSION['size'] = "image size is to large";
        header("location:../forms/update_product.php");
        exit;
    }

    // get extantion of image

    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

    // make uniqe name

    $uniqe_name = time() . "." . $ext;
    $give_name = "../uploads/" . $uniqe_name;

    // send name into our folder

    if (move_uploaded_file($_FILES['image']['tmp_name'], $give_name)) {
        $image_name = $uniqe_name;
    }
}

// run querry

$query = "UPDATE products SET `name`= '$name', `price`= '$price', `discount_price`= '$discount_price', `RAM` = '$ram', `storage`='$storage', `screen_size`='$screen_size', `brand`='$brand', `model`='$model' , `image_name`='$image_name'  WHERE id= $id";

if (mysqli_query($conect, $query)) {
    $_SESSION['edit'] = "edit data successfully";
    header("location:../forms/product_select.php");
} else {
    echo mysqli_errno($conect);
}

// connection close
mysqli_close($conect);
