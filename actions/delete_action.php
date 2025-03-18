<?php
session_start();

// step 1 = Get id to delete

$id = $_GET['id'];


// step 2 = connect db
require "../includes/connection.php";


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

// step 3 = prepare query
$query = "DELETE FROM `products` WHERE id=$id";


// step 4 = Run query
if (mysqli_query($conect, $query)) {
    // step 5 = redirect to home page
    $_SESSION['deleted'] = "Student successfully deleted";
    
    header("Location: ../forms/product_select.php");

} else {
    die("No student found.");
}
