<?php
session_start();
require("../includes/header.php");
?>
<div class="row">
    <div class="col col-lg-3">
        <?php
        require("../includes/sidebar.php")
        ?>
    </div>
    <div class="col col-lg-9">
        <?php
        require("../includes/navbar.php");
        ?>
        <div class="card p-4">
            <div class="d-flex justify-content-space-between align-item-center gap-3 ">
                <h2 class="mt-3">Product Form</h2>
                <div class="w-75">
                    <?php
                    if (isset($_SESSION['type']) == true) {
                        echo "<div class='alert alert-warning my-3 text-center'>{$_SESSION['type']}</div>";
                        unset($_SESSION['type']);
                    } else if (isset($_SESSION['input']) == true) {
                        echo "<div class='alert alert-warning my-3 text-center'>{$_SESSION['input']}</div>";
                        unset($_SESSION['input']);
                    } else if (isset($_SESSION['size']) == true) {
                        echo "<div class='alert alert-warning my-3 text-center'>{$_SESSION['size']}</div>";
                        unset($_SESSION['size']);
                    } else if (isset($_SESSION['insert']) == true) {
                        echo "<div class='alert alert-primary my-3 text-center'>{$_SESSION['insert']}</div>";
                        unset($_SESSION['insert']);
                    } ?>
                </div>
            </div>
            <form action="../actions/create_product_action.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label required-label">Name</label>
                    <input type="text" name="name" class="form-control"  autocomplete="off">
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required-label">Price</label>
                        <input type="number" name="price" class="form-control" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required-label">Discount Price</label>
                        <input type="number" name="discount_price" class="form-control" >
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required-label">RAM</label>
                        <select name="ram" class="form-select" >
                            <option value="">Select RAM</option>
                            <option value="2GB">2GB</option>
                            <option value="4GB">4GB</option>
                            <option value="6GB">6GB</option>
                            <option value="8GB">8GB</option>
                            <option value="12GB">12GB</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required-label">Storage</label>
                        <select name="storage" class="form-select" >
                            <option value="">Select Storage</option>
                            <option value="16GB">16GB</option>
                            <option value="32GB">32GB</option>
                            <option value="64GB">64GB</option>
                            <option value="128GB">128GB</option>
                            <option value="256GB">256GB</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required-label">Screen Size</label>
                        <select name="screen_size" class="form-select" >
                            <option value="">Select Screen Size</option>
                            <option value="50MP">50MP</option>
                            <option value="60MP">60MP</option>
                            <option value="80MP">80MP</option>
                            <option value="40MP">40MP</option>
                            <option value="70MP">70MP</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required-label">Brand</label>
                        <select name="brand" class="form-select" >
                            <option value="">Select Brand</option>
                            <option value="Samsung">Samsung</option>
                            <option value="Vivo">Vivo</option>
                            <option value="Oppo">Oppo</option>
                            <option value="Infinix">Infinix</option>
                            <option value="iPhone">iPhone</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label required-label">Model</label>
                    <select name="model" class="form-select" >
                        <option value="">Select Model</option>
                        <option value="V12">V12</option>
                        <option value="V20">V20</option>
                        <option value="V21">V21</option>
                        <option value="I5">I5</option>
                        <option value="I6">I6</option>
                        <option value="I12">I12</option>
                        <option value="I12 Pro">I12 Pro</option>
                        <option value="Galaxy S">Galaxy S</option>
                        <option value="Galaxy Z">Galaxy Z</option>
                        <option value="Oppo S1">Oppo S1</option>
                        <option value="A37">A37</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label required-label">Upload Image</label>
                    <input type="file" name="image" class="form-control" s accept="images/*">
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="4"></textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>