<?php
session_start();
require("./includes/header.php");
?>
<div class="row">
    <div class="col col-lg-3">
        <?php
        require("./includes/sidebar.php")
        ?>
    </div>
    <div class="col col-lg-9">
        <?php
        require("./includes/navbar.php");
        ?>
        <div class="card p-4">
            <div class="d-flex justify-content-space-between align-item-center gap-3 ">
                <h2 class="mt-3">user Form</h2>
                <div class="w-75">
                    <?php
                    if (isset($_SESSION['input']) == true) {
                        echo "<div class='alert alert-warning my-3 text-center'>{$_SESSION['input']}</div>";
                        unset($_SESSION['input']);
                    } else if (isset($_SESSION['insert']) == true) {
                        echo "<div class='alert alert-primary my-3 text-center'>{$_SESSION['insert']}</div>";
                        unset($_SESSION['insert']);
                    } else if (isset($_SESSION['error']) == true) {
                        echo "<div class='alert alert-primary my-3 text-center'>{$_SESSION['error']}</div>";
                        unset($_SESSION['error']);
                    } ?>
                </div>
            </div>
            <form action="./actions/user_acton.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label required-label">Name</label>
                        <input type="text" name="name" class="form-control" autocomplete="off">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required-label">role</label>
                        <select name="role" class="form-select" >
                            <option value=""> select role</option>
                            <option value="user">user</option>
                            <option value="admin">admin</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required-label">email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required-label">password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>