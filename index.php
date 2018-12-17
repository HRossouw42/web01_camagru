<?php
    session_start();
    //include ("install.php");
    include("./config/setup.php");
    include("functions/functions.php");
    //include('config.php');
    //include("includes/db.php");
    //include('db.php');


?>

<!DOCTYPE html>
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
                    <a href="index.php" class="navbar-item has-text-black is-active"> Home</a>
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
    <section class="hero is-centered">
    <section>
        <div class="columns is-large ">
            <div class="column is-large is-size-1 is-block"></div>
            <div class="column is-large is-size-1"></div>
        </div>
    </section>

    <section class="is-large has-background-light">
        <?php
            $imagelimit = 5;
            $out2 = $db->returnRecord("SELECT * FROM images ORDER BY `date` DESC");
            $total = count($out2);

            //print_r($total);
//            if(isset($_GET["page"])){
//                $page = $_GET["page"];
//                $i = ($_GET["page"] - 1 )* $imagelimit;
//            }
//            else{
//                $i = 0;
//                $page = 1;
//            }
//            $pages = ceil($total / $imagelimit);


    $i=0;
    while ($out2[$i])
    {
        echo"<div class='container'>";
                echo"<div class='columns is-variable'>";
                    echo"<div class='column is-four-fifths'>";
                        echo"<div class='notification is-primary' >";
                            echo"<article class='media is-centered'>";
                                echo"<figure class='media-content'>";
                                    echo"<figure class='image card is-4by3'>";
                                        echo"<a class='username' href='image.php?imageID=".$out2[$i]["imageID"]."'</a>";
                                            echo"<img src=".$out2[$i]["image"].">";
                                    echo"</figure>";
                                echo"</figure>";
                                echo"<div class='media-content'>";
                                echo"</div>";
                            echo"</article>";
                        echo"</div>";
                    echo"</div>";
                echo"</div>";
            echo"</div>";
            $i++;
    }
        ?>

        <div class="container">
            <div class="columns is-variable is-1">
                <div class="column">
                    <div class="notification is-primary" >
                        <article class="media">
                            <figure class="media-left">
                                <figure class="image card">
                                    <img src="https://bulma.io/images/placeholders/128x128.png">
                                </figure>
                            </figure>
                            <div class="media-content">
                                <div class="content">
                                    <h1 class="title    is-size-4">Title!</h1>
                                    <p class="is-primary">Doggo Pic</p>
                                    <a class="button">Comment</a>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>

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