<?php

session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
unset($_SESSION['customer_email']);
session_unset();
session_destroy($_SESSION['customer_email']);
session_destroy();
echo "You're being logged out.";
echo "<script>window.open('index.php','_self')</script>";