<?php
/**
 * Export to PHP Array plugin for PHPMyAdmin
 * @version 4.8.3
 */
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "camagru";
$tbl_cart = "cart";
$tbl_cats = "categories";
$tbl_brands = "brands";
$tbl_prod = "products";
$tbl_cust = "customers";
// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()."<br>");
}
// Create database if it hasn't been already
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . mysqli_error($conn)."<br>";
}
// Refresh connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()."<br>");
}

// User Table (unedited)
/*$sql = "CREATE TABLE IF NOT EXISTS $tbl_cust (
	customer_id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	customer_ip VARCHAR(255) NOT NULL,
	customer_email VARCHAR(255) NOT NULL,
  customer_pass VARCHAR(100) NOT NULL,
	)";

if (mysqli_query($conn, $sql)) {
    echo "Table Users created successfully<br>";
} else {
    echo "Error creating table: ".mysqli_error($conn)."<br>";
}
*/
mysqli_close($conn);
?>

Collapse
Message Input


Message @hrossouw (CPT)