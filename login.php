<!DOCTYPE html>
<?php
    include('config.php');
    include('db.php');
?>
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
                    <a href="login.php" class="navbar-item has-text-white">Login</a>
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

        <div class="field">
            <label class="label">Email</label>
            <div class="control has-icons-left">
                <input class="input" type="email" placeholder="e.g. alexsmith@gmail.com">
                <span class="icon is-small is-left">
                <i class="fas fa-envelope"></i>
                </span>
            </div>
        </div>

        <div class="field">
            <label class="label">Password</label>
            <div class="control has-icons-left">
                <input class="input" type="password" placeholder="battery horse staple">
                <span class="icon is-small is-left">
                <i class="fas fa-password"></i>
                </span>
            </div>
        </div>

        <div class="field is-grouped">
        <div class="control">
            <button class="button is-primary">Login</button>
        </div>
        </div>
        <?php /* JUST COMMENTED TO REMOVE TEMP!
            <form action="register.php" method="post" enctype="multipart/form-data">

            <table align="center" width="750">

                <tr align="center">
                    <td colspan="6"><h2>Create an Account</h2></td>
                </tr>

                <tr>
                    <td align="right">Customer Name:</td>
                    <td><input type="text" name="c_name" required/></td>
                </tr>

                <tr>
                    <td align="right">Customer Email:</td>
                    <td><input type="text" name="c_email" required/></td>
                </tr>

                <tr>
                    <td align="right">Customer Password:</td>
                    <td><input type="password" name="c_pass" required/></td>
                </tr>

                <tr>
                    <td align="right">Customer Image:</td>
                    <td><input type="file" name="c_image" required/></td>
                </tr>



                <tr>
                    <td align="right">Customer Country:</td>
                    <td>
                        <select name="c_country">
                            <option>Select a Country</option>
                            <option>Afghanistan</option>
                            <option>India</option>
                            <option>Japan</option>
                            <option>Pakistan</option>
                            <option>Israel</option>
                            <option>Nepal</option>
                            <option>United Arab Emirates</option>
                            <option>United States</option>
                            <option>United Kingdom</option>
                        </select>

                    </td>
                </tr>

                <tr>
                    <td align="right">Customer City:</td>
                    <td><input type="text" name="c_city" required/></td>
                </tr>

                <tr>
                    <td align="right">Customer Contact:</td>
                    <td><input type="text" name="c_contact" required/></td>
                </tr>

                <tr>
                    <td align="right">Customer Address</td>
                    <td><input type="text" name="c_address" required/></td>
                </tr>


                <tr align="center">
                    <td colspan="6"><input type="submit" name="register" value="Create Account" /></td>
                </tr>



            </table>

        </form>

        </div> */ ?>
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