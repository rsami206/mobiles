<?php

require("../includes/connection.php");
require("../includes/header.php");
// if(isset($_SESSION['login']) == false){
//     header("location:../forms/login.php");
//     exit;
// }

$query_select = "SELECT * FROM `users`";

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
                        <h2>Visit products</h2>
         <table class="display text-center" style="width:100%">
            
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>email</th>
                        <th>password</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                <td>{$row['id']}</td>
                                         <td>{$row['Name']}</td>
                                         <td>{$row['email']}</td>
                                         <td>{$row['password']}</td>
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