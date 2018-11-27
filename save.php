<?php
/**
 * Created by PhpStorm.
 * User: hrossouw
 * Date: 2018/11/27
 * Time: 16:11
 */

include("header.php");
$headers = getallheaders();
if ($headers["Content-type"] == "application/json") {
    $stuff = json_decode(file_get_contents("php://input"), true);
    var_dump($stuff);
}
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
    toQuote($_SESSION["customer_email"])
);
$db->insertRecord(
    array(
        "table"     => $table,
        "values"    => $values
    )
);
