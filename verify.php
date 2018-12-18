<?php
/**
 * Created by PhpStorm.
 * User: hrossouw
 * Date: 2018/12/17
 * Time: 14:21
 */

session_start();
include('config.php');
include("includes/db.php");
include('db.php');
include("functions/functions.php");
include("./config/setup.php");

$check = array("email"=>$_GET['email'], "token"=>$_GET['token']);
print_r($check);
$db->verifyUser($check);

echo "<script>alert('Account Verified!')</script>";
echo "<script>window.open('login.php','_self')</script>";

?>