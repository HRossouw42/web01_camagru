<?php
    session_start();

    include("functions/functions.php");
    include('config.php');
    include("includes/db.php");
    include('db.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Account</title>
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
                <a href="myaccount.php" class="navbar-item has-text-black is-active">My Account</a>
                <?php
                if(!isset($_SESSION['customer_email'])){
                    echo "<a href=\"login.php\" class=\"navbar-item has-text-white\">Login</a>";
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
            <?php
            if(isset($_SESSION['customer_email'])){
                echo "<p>Hello, </p>" . $_SESSION['customer_email'];
            }
            else {
                echo "<p>Hello, Guest! Please register for full access!</p>";
            }
            ?>

        </div>
    </div>

    <div class="field is-grouped">
        <div class="control">
            <button class="button is-primary">Submit</button>
        </div>
        <div class="control">
            <a class="button" href="index.php">Cancel</a>
        </div>
    </div>
    <div class="centerdiv">
        <form style="align-text:left" action="" method="post" style="top:50%">
            <h4 style="margin-top:0">Change settings:</h4>
            <?php
            if($i == 0){
                echo "<label><input type='checkbox' name='usercheck' value='usercheck'>Change Username</label><br>";
                echo "<label><input type='checkbox' name='passcheck' value='passcheck'>Change Password</label><br>";
                echo "<label><input type='checkbox' name='emailcheck' value='emailcheck'>Change Email Address</label><br>";
                echo "<label><input type='checkbox' name='notecheck' value='notecheck'>Change Notification Settings</label><br>";
                echo "<input class='btn1' type='submit' name='btn' value='Submit'><br>";
            }
            if($i >= 1 && $_POST["usercheck"]==usercheck){
                echo "<input type='text' name='curruser' placeholder='Enter Current Username'><br>";
                echo "<input type='text' name='newuser' placeholder='Enter New Username'><br>";
            }
            if($i >= 1 && $_POST["passcheck"]==passcheck){
                echo "<input title='Password requires one lower case letter, one upper case letter, one digit, 8+ characters, and no spaces.' pattern='^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{8,}$'' type='password'  name='currpass' placeholder='Enter Current Password'><br>";
                echo "<input title='Password requires one lower case letter, one upper case letter, one digit, 8+ characters, and no spaces.' pattern='^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{8,}$' type='password'  name='newpass' placeholder='Enter New Password'><br>";
            }
            if($i >= 1 && $_POST["emailcheck"]==emailcheck){
                echo "<input type='email' name='curremail' placeholder='Enter Current Email Address'><br>";
                echo "<input type='email' name='newemail' placeholder='Enter New Email Address'><br>";
            }
            if($i >= 1 && $_POST["notecheck"] == notecheck){
                echo "<label><input type='radio' name='notifications' value='noteon'>Receive Email Updates</label><br>";
                echo "<label><input type='radio' name='notifications' value='noteoff'>Don't Receive Email Updates</label><br>";
            }
            if($i == 1){
                echo "<input class='btn1' type='submit' name='btn2' value='Submit'><br>";
            }
            ?>
        </form>
    </div>

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