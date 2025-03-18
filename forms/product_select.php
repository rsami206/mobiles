<?php
session_start();
require("../includes/connection.php");
require("../includes/header.php");
// if(isset($_SESSION['login']) == false){
//     header("location:../forms/login.php");
//     exit;
// }

$query_select = "SELECT * FROM `products`";

$result = mysqli_query($conect, $query_select);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
</head>

<body>
    <div class="row">
        <div class="col col-lg-3">
            <?php
            require("../includes/sidebar.php");
            ?>
        </div>
        <div class="col col-lg-9">
            <?php
            require("../includes/navbar.php");
            ?>
            <div class="d-flex justify-content-between align-item-center gap-3 mt-3">
                <h2>Visit products</h2>
                <div class="w-75">
                    <?php
                    if (isset($_SESSION['edit']) == true) {
                        echo "<div class='alert alert-success '>{$_SESSION['edit']}</div>";
                        unset($_SESSION['edit']);
                    } else if (isset($_SESSION['deleted']) == true) {
                        echo "<div class='alert alert-success '>{$_SESSION['deleted']}</div>";
                        unset($_SESSION['deleted']);
                    }
                    ?>
                </div>
            </div>

            <table id="datatable" class="display" style="width:100%">

                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>image</th>
                        <th>price</th>
                        <th>discount_price</th>
                        <th>action </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                <td>{$row['id']}</td>
                                         <td>{$row['name']}</td>
                                         <td> <img width='40px' src='../uploads/{$row['image_name']}'</td>
                                          <td>{$row['price']}</td>
                                         <td>{$row['discount_price']}</td>
                                         <td>
                                            <a href='./update_product.php?id={$row['id']}' class='btn btn-sm btn-warning me-1'>Edit</a>
                                             <a href='../actions/delete_action.php?id={$row['id']}' class='btn btn-sm btn-danger'>Delete</a>
                                         </td>
                                      </tr>";
                        }
                    } else {
                        echo ("no data found");
                    }
                    ?>


                </tbody>

            </table>
        </div>
    </div>

</body>

</html>