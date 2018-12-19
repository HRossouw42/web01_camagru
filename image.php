<?php
/**
 * Created by PhpStorm.
 * User: hrossouw
 * Date: 2018/12/12
 * Time: 14:57
 */

    session_start();
    //include ("install.php");
    include("./config/setup.php");
    include("functions/functions.php");
    include("includes/db.php");

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

    <section class="is-large has-background-grey-darker">
<?php
if ($_POST["like-btn"]){
    $statement = "UPDATE images SET likes = likes + 1 WHERE imageID = ".toQuote($_GET["imageID"]);
    $db->runStatement($db->getDBConn(),$statement);
}
if ($_POST["comm-btn"]){
    if ($_POST["commbox"]){
        $pattern = array("#;#", "#=#", "#\"#");
        $replace = array("%1", "%2", "%3");
        $noinjectcomm = preg_replace($pattern, $replace, $_POST["commbox"]);
        $statement = "INSERT INTO comments (imageID, username, comment) VALUES (";
        $statement .= toQuote($_GET["imageID"]).", ".toQuote($_SESSION["username"]).", ".toQuote($noinjectcomm).")";
        $db->runStatement($db->getDBConn(),$statement);
        $_POST["commbox"] = "";
        $statement = "SELECT * FROM images WHERE imageID = ".toQuote($_GET["imageID"]);
        $out = $db->returnRecord($statement);
        $user = $out[0]["username"];
        $statement = "SELECT * FROM customers WHERE username = ".toQuote($user);
        $out = $db->returnRecord($statement);

        //email notification of comments
//        $message = $_SESSION["username"]." commented on your image. Go to 127.0.0.1:8080/camagru/image.PHP?imageID=".$_GET["imageID"]." to check it out!";
//        if ($out[0]["notifications"]){
//            mail($out[0]["email"], "New Camagru Comment", $message);
//        }
    }
}
$imarray = $db->returnRecord("SELECT * FROM images WHERE imageID = ".toQuote($_GET["imageID"]));
$commarray = $db->returnRecord("SELECT * FROM comments WHERE imageID = ".toQuote($_GET["imageID"]));
echo "<div class='imagediv' style='top:10%'><img src=".$imarray[0]["image"].">";
echo "<div class='commdiv'>";
foreach ($commarray as $something){
    $pattern = array("#(%1)#", "#(%2)#", "#(%3)#");
    $replace = array(";", "=", "\"");
    $noinjectcomm = preg_replace($pattern, $replace, $something["comment"]);
    $out = "(".$something["date"].") ".$something["username"].": ".$noinjectcomm;
    echo $out."<br><hr>";
}
echo "</div>";
echo "<br><anything style='color:white;font-family:K2D;font-size:150%'>Likes: ".$imarray[0]["likes"]."</anything>";
if ($_SESSION["username"]){
    echo
    "<div><form action='' method='post' id='commform'>
        <input type='submit' class='btn1' value='like!' name='like-btn'><input type='submit' class='btn1' value='Post Comment' name='comm-btn'>
        </form></div>";
    echo "<br><textarea name='commbox' form='commform' rows='5' cols='80' class='comm' placeholder='Comment Box'></textarea><br>";
}
echo "</div>";

?>
    </section>
</section>