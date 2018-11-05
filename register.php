<?php

include ("functions/functions.php");
include ("includes/db.php")
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.0/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
<!--    <link rel="stylesheet" href="styles/debug.css">-->
    <link rel="stylesheet" href="styles/helpers.css">
    <style>
        .center {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hero {
            background-color: dimgrey;
            color: white;
        }

        .hero-foot {
            background-color: dimgrey;
            color: white;
            font-size: smaller;
        }

    </style>
</head>
<body>

    <!-- .hero -->
    <section class="hero has-background-grey">
        <div class="hero-body">
            <div class="container">
                <figure class="image center">
                    <img src="img/dogicon.png" style="max-width: 120px;">
                    <p class="is-size-3 has-text-weight-semibold">#Splootstegram </p>
                </figure>
            </div>
        </div>
    </section>

    <!-- Toolbar-->
    <section class="hero">
        <div class="hero-head">
            <div class="columns is-mobile is-marginless heading has-text-weight-bold">
                <div class="column left">
                    <a href="index.html" class="navbar-item has-text-white"> Home</a>
                    <p class="navbar-item has-text-white"> Gallery</p>
                </div>
                <div class="column center">
                    <p class="navbar-item has-text-white">LOGO</p>
                </div>
                <div class="column right">
                    <a href="myaccount.php" class="navbar-item has-text-white">My Account</a>
                    <a href="login.php" class="navbar-item has-text-white">Login</a>
                    <a href="register.php" class="navbar-item has-text-white">Sign up</a>
                </div>
            </div>
        </div>
    </section>
    
    <!--Middle-->
    <section class="section has-background-light">

        <div class="columns">
            <div class="column is-size-2 center-column">
                Create an Account
            </div>
        </div>
    <!--Form-->
        <form action="register.php" method="post" enctype="multipart/form-data">
        <div class="field">
            <label class="label">Name</label>
            <div class="control has-icons-left">
                <input class="input" type="text" name="c_name" placeholder="e.g Alex Smith" value="<?php echo @$_SESSION['name'];?>" required>
                <span class="icon is-small is-left">
                    <i class="fas fa-user"></i>
                </span>
            </div>
        </div>

        <div class="field">
            <label class="label">Email</label>
            <div class="control has-icons-left">
                <input class="input" type="email" name="c_email" placeholder="e.g. alexsmith@gmail.com" value="<?php echo @$_SESSION['email'];?>" required>
                <span class="icon is-small is-left">
                <i class="fas fa-envelope"></i>
                </span>
            </div>
        </div>

        <div class="field">
            <label class="label">Password</label>
            <div class="control has-icons-left">
                <input class="input" type="password" name="c_pass" placeholder="battery horse staple" value="<?php echo @$_SESSION['password'];?>" required>
                <span class="icon is-small is-left">
                <i class="fas fa-password"></i>
                </span>
            </div>
        </div>


            <div class="field">
                <label class="label">User Image</label>
                </span>
                </div>
            <div class="file field">
                <label class="file-label">
                    <input class="file-input" type="file" name="c_image">
                    <span class="file-cta">
                        <span class="file-icon">
                            <i class="fas fa-upload"></i>
                        </span>
                        <span class="file-label">
                        Choose a image…
                        </span>
                    </span>
                </label>
            </div>

        <!--Buttons-->
        <div class="field is-grouped">
            <div class="control">
                <button class="button is-primary" value="Create Account" name="register">Register</button>
            </div>
            <div class="control">
                <a class="button" href="index.html">Cancel</a>
            </div>
        </div>
        </form>
    </section>

    <!-- .hero foot-->
    <section class="hero-foot has-background-grey">
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column center">
                        <p class="navbar-item has-text-white has-text-weight-light has-text-centered">Made for the bestest doggos 💚</p>
                        <p class="navbar-item has-text-white has-text-weight-light has-text-centered">©2018 - HRossouw</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

<?php
    if(isset($_POST['register'])){

        $ip = getIp();
        $c_name = $_POST['c_name'];
        $c_email = $_POST['c_email'];
        $c_pass = $_POST['c_pass'];
        $c_image = $_FILES['c_image']['name'];
        $c_image_tmp = $_FILES['c_image']['tmp_name'];

        move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image");

        $insert_c = "insert into customers (customer_ip, customer_name, customer_email, customer_pass, customer_image) 
          values ('$ip', '$c_name', '$c_email', '$c_pass', '$c_image')";

        $run_c = mysqli_query($con, $insert_c);

        if ($run_c){
            echo "<script>alert('registration successful!')</script>";
        }

    }
?>