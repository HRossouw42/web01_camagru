<?php
    session_start();
    include("functions/functions.php");
    include('config.php');
    include("includes/db.php");
    include('db.php');
    include("./config/setup.php");
    ?>


<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Intro</title>
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
                    <a href="gallery.php" class="navbar-item has-text-black is-active"> Gallery</a>
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
    <section class="hero">
    <section class="section has-background-light">
        <?php
                //debug code
//            $out2 = $db->returnRecord("SELECT * FROM images ORDER BY `date` DESC");
//            //            print_r($out2);
//            $i = 0;
//            while ($out2[$i]){
//                echo "<img src=".$out2[$i]["image"].">";
//                $i++;
//            }

            //delete button
            if ($_POST){
                $num = array_search('Delete Image', $_POST);
                $statement = "DELETE FROM `images` WHERE imageID = ".toQuote($num);
                $db->runStatement($db->getDBConn(),$statement);
            }

            $imagelimit = 5;
            $out2 = $db->returnRecord("SELECT * FROM images WHERE username = ".toQuote($_SESSION["username"]));
            $total = count($out2);
            if(isset($_GET["page"])){
                $page = $_GET["page"];
                $i = ($_GET["page"] - 1 )* $imagelimit;
            }
            else{
                $i = 0;
                $page = 1;
            }
            $pages = ceil($total / $imagelimit);

            echo "<div class='galdiv' style='top:120%'>";
                while ($i < $imagelimit*$page && $out2[$i]){
                echo "<div class='imagediv'><img src=".$out2[$i]["image"]."></div>";
                echo "<br><form method='post' action=''><input type='submit' name='".$out2[$i]["imageID"]."' class='btn1 button' value='Delete Image'></form>";
                $i++;
                }
                echo "<br><div class='imagediv' style='bottom:0%'>";
                    for ($x = 1; $x <= $pages; $x++){
                    echo "<a href='gallery.php?page=$x'>$x</a>"."\t";
                    }
                    echo "</div>";
                echo "</div>";
        ?>
    </section>
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