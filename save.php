<?php
/**
 * Created by PhpStorm.
 * User: hrossouw
 * Date: 2018/11/27
 * Time: 16:11
 */

session_start();
include("functions/functions.php");
include('config.php');
include("includes/db.php");
include('db.php');
include("./config/setup.php");

$stuff = json_decode(file_get_contents("php://input"), true);

$fields = array(
    "image",
    "username"
);

$table = array(
    "name"      => "images",
    "fields"   => $fields
);

$values = array(
    toQuote($stuff["pic"]),
    toQuote($_SESSION["username"])
);

$db->insertRecord(
    array(
        "table"     => $table,
        "values"    => $values
    )
);
?>
