<!DOCTYPE html>
<?php
    session_start();
    include("functions/functions.php");
    include('config.php');
    include("includes/db.php");
    include('db.php');

    ?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Intro</title>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.0/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <!--<link rel="stylesheet" href="styles/debug.css">-->
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

        #camera {
            height: 500px;
            width: 500px;
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
                    <p class="navbar-item has-text-white"> Gallery</p>
                </div>
                <div class="column center">
                    <?php
                    if(!isset($_SESSION['customer_email'])){
                        echo "<a href=\"login.php\" class=\"navbar-item has-text-white\">Login to add photos</a>";
                    }
                    else {
                        echo "<a href=\"editor.php\" class=\"navbar-item has-text-black is-active\">Add a photo</a>";
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
    <section class="section has-background-light">


        <!--camera-->
        <div class="container">
            <div class="row">Tutorial</a></div>
            <div class="col-md-6">
                <div class="text-center">
                    <div id="camera_info"></div>
                    <div id="camera"></div><br>
                    <button id="take_snapshots" class="btn btn-success btn-sm">Take Snapshots</button>
                </div>
            </div>
            <div class="col-md-6">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Image</th><th>Image Name</th>
                    </tr>
                    </thead>
                    <tbody id="imagelist">

                    </tbody>
                </table>
            </div>
        </div>

</body>
</html>

<style>
    #camera {
        width: 500px;
        height: 500px;
    }
</style>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="jpeg_camera/jpeg_camera_with_dependencies.min.js" type="text/javascript"></script>
<script>
    var options = {
        shutter_ogg_url: "jpeg_camera/shutter.ogg",
        shutter_mp3_url: "jpeg_camera/shutter.mp3",
        swf_url: "jpeg_camera/jpeg_camera.swf",
    };
    var camera = new JpegCamera("#camera", options);

    $('#take_snapshots').click(function(){
        var snapshot = camera.capture();
        snapshot.show();

        snapshot.upload({api_url: "action.php"}).done(function(response) {
            $('#imagelist').prepend("<tr><td><img src='"+response+"' width='100px' height='100px'></td><td>"+response+"</td></tr>");
        }).fail(function(response) {
            alert("Upload failed with status " + response);
        });
    })
    function done(){
        $('#snapshots').html("uploaded");
    }
</script>

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