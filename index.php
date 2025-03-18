<?php
session_start();
if(isset($_SESSION['login']) == false){
    header("location:./forms/login.php");
    exit;
}
   require("./includes/header.php");
    require("./includes/connection.php");
    // if(isset($_SESSION['login']) == false){
    //     header("location:./forms/login.php");
    //     exit;
    // }
    $q1 = "SELECT COUNT(*) as total_products FROM products";
    $qi = "SELECT COUNT(*) AS total_iphone FROM products WHERE brand ='iphone'";
    $qsam = "SELECT COUNT(*) AS total_samsung FROM products WHERE brand ='Samsung'";
    $qvivo = "SELECT COUNT(*) AS total_Vivo FROM products WHERE brand ='Vivo'";

    $result = mysqli_query($conect, $q1);
    $data = mysqli_fetch_assoc($result);

    $result1 = mysqli_query($conect, $qi);
    $datai = mysqli_fetch_assoc($result1);

    $result2 = mysqli_query($conect, $qsam);
    $datasam = mysqli_fetch_assoc($result2);

    $result4 = mysqli_query($conect, $qvivo);
    $datavivo = mysqli_fetch_assoc($result4);


    $selest = "SELECT * FROM `products` ORDER BY `products`.`price` desc limit 5";
    $run = mysqli_query($conect, $selest);
    ?>
<div class="main">
    <div class="row">
        <div class="col col-lg-3">
            <?php
            require("./includes/sidebar.php");
            ?>
        </div>
        <div class="col col-lg-9">
            <?php
            require("./includes/navbar.php");
            ?>
            <div class="row">
                <div class="col col-lg-3">
                    <div class="child">
                        <i class="ri-money-dollar-circle-line "></i> <span>Total product</span>
                        <p><?php echo $data['total_products'] ?></p>
                    </div>
                </div>
                <div class="col col-lg-3">
                    <div class="child">
                        <i class="ri-shopping-cart-2-line"></i> <span> total samsung </span>
                        <p><?php echo $datasam['total_samsung'] ?></p>
                    </div>
                </div>
                <div class="col col-lg-3 ">
                    <div class="child">
                        <i class="ri-apple-line icon"></i> <span> total iphone</span>
                        <p><?php echo $datai['total_iphone'] ?></p>
                    </div>
                </div>
                <div class="col col-lg-3">
                    <div class="child">
                        <i class="ri-reset-right-line"></i> <span> total vivo</span>
                        <p><?php echo $datavivo['total_Vivo'] ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col col-lg-8">
                    <div class="product mt-5">
                        <h2 class="mb-4" align="center">Top 5 products
                        </h2>
                        <table id="datatable" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>brand</th>
                                    <th>price</th>
                                    <th>discount_price</th>
                                    <th>ram </th>
                                    <th>storage</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (mysqli_num_rows($run) >0) {
                                    while ($row = mysqli_fetch_assoc($run)) {
                                        echo "<tr>
                                                 <td>{$row['brand']}</td>
                                                  <td>{$row['price']}</td>
                                                 <td>{$row['discount_price']}</td>
                                                 <td>{$row['ram']}</td>
                                                 <td>{$row['storage']}</td>
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
                <div class="col col-lg-3">
                    <div class="auto mt-5 ">
                        <img src="./Final.jpg" width="100%" height="100%" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>