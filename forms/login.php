<?php session_start();


require("../includes/header.php");
?>

    <div class="container">

        
        <form method="post" action="../actions/login_action.php" enctype="multipart/form-data">
        
            <div class="login mx-auto m-5 p-5 " style="width: 450px;">
            <?php
        if (isset($_SESSION['error']) == true) {
            echo "<div class='alert alert-danger'>{$_SESSION['error']}</div>";
            unset($_SESSION['error']);
        }else  if (isset($_SESSION['input']) == true) {
            echo "<div class='alert alert-danger'>{$_SESSION['input']}</div>";
            unset($_SESSION['input']);
        }

        ?>
                <h2>Login Form</h2>
                <div class="mb-3">
                    <input class="user" type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" >
                    
                </div>
                <div class="mb-3">
                    <input class="user" type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="password" >
                  
                </div>
                <div class="mb-3">
                    <button class="btn btn-warning reg">Login</button>
                    <p>Already have an account ? <a href="../user.php" class=' button'>sign up</a></p>
                </div>
            </div>
        </form>
    </div>
</body>

</html>