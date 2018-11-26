<!DOCTYPE html>
<?php
    session_start();
    include("functions/functions.php");
    include('config.php');
    include("includes/db.php");
    include('db.php');
    //loading stickers from file
    $stuff = json_decode(file_get_contents("php://input"), true);
    switch($stuff){
        case "sticker1":
            $sticker = imagecreatefrompng('./img/sticker/sticker1.png');
            $src = "./images/sticker1.png";
            break;
        case "sticker2":
            $sticker = imagecreatefrompng('./img/sticker/sticker2.png');
            $src = "./images/sticker2.png";
            break;
        case "sticker3":
            $sticker = imagecreatefrompng('./img/sticker/sticker3.png');
            $src = "./images/sticker3.png";
            break;
}

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
        <section class="hero-center">
            <div class="container field-body">
                <div class="columns">
                <div class="column is-half"><video class="webcamma" id="video"><video></div>
                    <div class="column is-half"><canvas class="canvas" id="canvas" >Please use Chrome!</canvas></div>

                    </div>
                </div>
                </div>

            </div>
            <button class="btn1" onclick="snap();">Take Picture</button>
            <a id="download" download="image.png"><button style="margin-left:75px" class="btn1" type="button" onClick="download()">Download</button></a>

        </section>
        <!-- Camera non-ajax-->
        <div style="width:200px; margin:auto">
            <div style="position:relative; top:10%; display:flex; flex-direction:column">
<!--                <video class="webcamma" autoplay="true" id="video"></video><br>-->
<!--                <button class="btn1" style="margin-top:10px; flex:1; width:100%" onclick="snap();">Take Picture</button><br>-->
<!--                <canvas class="webcamma" id="canvas" ></canvas>-->
                <input  class="filters" style="width:100%; color:white; font-family:'K2D'; margin-top:10px" type="file" id="imageLoader" name="imageLoader"/><br>

            </div>
            <div> <!-- filters -->
<!--                <form method="post" style="position:relative; margin-top:17.5%;" class="filters">-->
<!--                    <div class="filtereth">Blur-->
<!--                        <input min="0" max="20" value="0" step="1" oninput="applyFilter()" data-filter="blur" data-scale="px" type="range"></div>-->
<!---->
<!--                    <div class="filtereth">Brightness-->
<!--                        <input min="0" max="200" value="100" step="1" oninput="applyFilter()" data-filter="brightness" data-scale="%" type="range"></div>-->
<!---->
<!--                    <div class="filtereth">Contrast-->
<!--                        <input min="0" max="200" value="100" step="1" oninput="applyFilter()" data-filter="contrast" data-scale="%" type="range"></div>-->
<!---->
<!--                    <div class="filtereth">Grayscale-->
<!--                        <input min="1" max="100" value="1" step="1" oninput="applyFilter()" data-filter="grayscale" data-scale="%" type="range"></div>-->
<!---->
<!--                    <div class="filtereth">Hue Rotate-->
<!--                        <input min="0" max="360" value="0" step="1" oninput="applyFilter()" data-filter="hue-rotate" data-scale="deg" type="range"></div>-->
<!---->
<!--                    <div class="filtereth">Invert-->
<!--                        <input min="0" max="100" value="0" step="1" oninput="applyFilter()" data-filter="invert" data-scale="%" type="range"></div>-->
<!---->
<!--                    <div class="filtereth">Opacity-->
<!--                        <input min="0" max="100" value="100" step="1" oninput="applyFilter()" data-filter="opacity" data-scale="%" type="range"></div>-->
<!---->
<!--                    <div class="filtereth">Saturate-->
<!--                        <input min="0" max="200" value="100" step="1" oninput="applyFilter()" data-filter="saturate" data-scale="%" type="range"></div>-->
<!---->
<!--                    <div class="filtereth">Sepia-->
<!--                        <input min="0" max="100" value="0" step="1" oninput="applyFilter()" data-filter="sepia" data-scale="%" type="range"></div>-->
<!--                    -->
<!--                </form>-->
            </div>

            <input style="position:absolute; right:10%; bottom:10%"id="add_gal" type="button" name="addgal" style="margin-left:52.5px" class="btn1" value="Add to gallery">
            <img id="testimg" src="">
        </div>

        <script type="text/javascript">

            //setting up the camera
            var canvas = document.getElementById('canvas');
            var context = canvas.getContext('2d');
            var video = document.getElementById('video');
            var imageLoader = document.getElementById('imageLoader');

            imageLoader.addEventListener('change', handleImage, false);

            navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia ||
                navigator.mozGetUserMedia || navigator.oGetUserMedia || navigator.msGetUserMedia;
            if (navigator.getUserMedia){
                navigator.getUserMedia({video:true}, streamWebCam, throwError);
            }

            function streamWebCam(stream){
                video.srcObject = stream;
                video.play();
            }
            function throwError(e){
                alert(e.name);
            }

            //clicking camera on button press
            function snap(){
                canvas.width = video.clientWidth;
                canvas.height = video.clientHeight;

                //save canvas
                context.translate(canvas.width, 0);
                context.scale(-1, 1);
                context.save();
                context.restore();
                context.drawImage(video, 0, 0);

                document.getElementById("canvas").style.transform = "rotateY(180deg)";
                document.getElementById("canvas").style.webkitTransform = "rotateY(180deg)";
                document.getElementById("canvas").style.mozTransform = "rotateY(180deg)";

                imageLoader.value="";
            }
            var image = document.querySelector('canvas');

            //filters
            var filterControls = document.querySelectorAll('input[type=range]');
            function applyFilter() {
                var computedFilters = '';
                filterControls.forEach(function(item, index) {
                    computedFilters += item.getAttribute('data-filter') + '(' + item.value + item.getAttribute('data-scale') + ')';
                });
                image.style.filter = computedFilters;
                canvas.style.filter = computedFilters;
            }

            //saving the image (WIP)
            function handleImage(e){
                var reader = new FileReader();
                reader.onload = function(event){
                    var img = new Image();
                    img.onload = function(){
                        canvas.width = video.clientWidth;
                        canvas.height = video.clientHeight;
                        context.drawImage(img,0,0,img.width,img.height,0,0,canvas.width,canvas.height);
                    };
                    encodeURIComponent(JSON.stringify(img.src));
                    img.src = event.target.result;
                };
                reader.readAsDataURL(e.target.files[0]);
                document.getElementById("canvas").style.transform = "rotateY(0deg)";
            }

            //downloading canvas
            function download(){
                var download = document.getElementById("download");
                var image = document.getElementById("canvas").toDataURL("image/png").replace("image/png", "image/octet-stream");

                download.setAttribute("href", image);
            }

            //adding to gallery (WIP)
            document.getElementById("add_gal").addEventListener("click", function() {
                var img = new Image();
                img.src = canvas.toDataURL();
                var json = {
                    pic: img.src
                };
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'save.php', true);
                xhr.setRequestHeader('Content-type', 'application/json');
                xhr.onreadystatechange = function (data) {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        console.log(xhr.responseText);
                    }
                };
                xhr.send(JSON.stringify(json))
            });
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






