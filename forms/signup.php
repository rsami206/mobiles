<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/signup.css">;
    <style>
        .lack {
            position: absolute;
            top: 248px;
            right: 62px;
        }

        .mail {
            position: absolute;
            top: 192px;
            right: 62px;
        }

        .reg {
            border: 1px solid white;
            margin: 20px 0;
            padding: 7px 125px;
            background-color: white;
            border-radius: 30px;
        }

        .reg:hover {
            background-color: white;
            color: black;
        }
    </style>
</head>

<body>
    <div class="container">

        <?php
        if (isset($_SESSION['error']) == true) {
            echo "<div class='alert alert-danger'>{$_SESSION['error']}</div>";
            unset($_SESSION['error']);
        }
        ?>
        <form method="post" action="../actions/signup_action.php" enctype="multipart/form-data">
            <div class="main p-1 mx-auto  " >
                <div class="login mx-auto m-3 p-5  "
                style="width: 450px; background-image:url(https://cdn.pixabay.com/photo/2019/12/17/17/58/night-4702174_1280.jpg) ;">
                    <h2>REGISTER</h2>
                    <input class="user" type="text" name="name" class="form-control" id="name" placeholder="Enter full name" required autocomplete="off">

                    <i class="ri-user-fill user-i"></i>
                    <input class="user" type="email" name="email" class="form-control" id="email" placeholder="enter email" required autocomplete="off">
                    <i class="ri-mail-fill mail"></i>
                    <input class="user" type="password" name="password" class="form-control" id="pasword" placeholder=" password" required autocomplete="off">
                    <i class="ri-lock-fill lack"></i>
                    <button class="btn btn-warning reg">sign-up</button>
                    <p>Already have an account ? <a href="./login.php" class='btn btn-link button'>Login</a></p>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>