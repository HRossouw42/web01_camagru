<?php
    session_start();
    include('config.php');
    include("includes/db.php");
    include('db.php');
    include("functions/functions.php");
    include("./config/setup.php");
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
                    <a href="index.php" class="navbar-item has-text-white"> Home</a>
                    <a href="gallery.php" class="navbar-item has-text-white"> Gallery</a>
                </div>
                <div class="column center">
                    <?php
                    if(!isset($_SESSION['customer_email'])){
                        echo "<a href=\"login.php\" class=\"navbar-item has-text-white\">Login to add photos</a>";
                    }
                    else {
                        echo "<a href=\"editor.php\" class=\"navbar-item has-text-white\">Add a photo</a>";
                    }
                    ?>
                </div>
                <div class="column right">
                    <a href="myaccount.php" class="navbar-item has-text-white">My Account</a>
                    <?php
                    if(!isset($_SESSION['customer_email'])){
                        echo "<a href=\"login.php\" class=\"navbar-item has-text-black is-active\">Login</a>";
                    }
                    else {
                        echo "<a href=\"logout.php\" class=\"navbar-item has-text-white\">Logout</a>";
                    }
                    ?>

                    <a href="register.php" class="navbar-item has-text-white">Sign up</a>
                </div>
            </div>
        </div>
    </section>
    
    <!--.section-->
    <section class="section has-background-light">
        <!--Every container is a row of photos-->

        <div class="columns">
            <div class="column is-size-2 center-column">
                Login
            </div>
        </div>
        <form action="login.php" method="post">
        <div class="field">
            <label class="label">Username</label>
            <div class="control has-icons-left">
                <input class="input" type="text" name="user" placeholder="e.g. alexcoolkid69" required>
                <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
            </span>
            </div>
        </div>
        <div class="field">
            <label class="label">Email</label>
            <div class="control has-icons-left">
                <input class="input" type="email" name="email" placeholder="e.g. alexsmith@gmail.com" required>
                <span class="icon is-small is-left">
                <i class="fas fa-envelope"></i>
                </span>
            </div>
        </div>

        <div class="field">
            <label class="label">Password</label>
            <div class="control has-icons-left">
                <input class="input" type="password" name="pass" placeholder="battery horse staple" required>
                <span class="icon is-small is-left">
                <i class="fas fa-password"></i>
                </span>
            </div>
        </div>

        <div class="field is-grouped">
        <div class="control">
            <button class="button is-primary" name="login" value="login">Login</button>
        </div>
        <div class="control">
            <a class="button is-info" href="forgot_password.php">Forgot Password?</a>
        </div>

        </div>
        <label class="checkbox">
            <input type="checkbox">
            Remember me
        </label>
        </form>

        <?php
            if(isset($_POST['login'])){
                $c_email = $_POST['email'];
                $c_pass = $_POST['pass'];
                $c_name = $_POST['user'];

                $sel_c = "select * from customers where customer_pass ='$c_pass' AND customer_email='$c_email' AND username='$c_name'";

                $run_c = mysqli_query($con, $sel_c);

                $check_customer = mysqli_num_rows($run_c);

                if($check_customer>0){

                    $_SESSION['customer_email']=$c_email;
                    $_SESSION['username']=$c_name;

                    echo "<script>alert('Login Successful!')</script>";
                    echo "<script>window.open('myaccount.php','_self')</script>";

                }
                else {
                    echo "<script>alert('Password or email is incorrect!')</script>";
                    exit();
                }

                $ip = getIp();
            }
        ?>

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