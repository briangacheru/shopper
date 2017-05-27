<?php
include 'check-login.php';
$category = $_POST['category'];

include '../../config/db_config.php';

$sql = "INSERT INTO product_categories (name, shop)
VALUES ('$category', '$SEshopno')";

if ($conn->query($sql) === TRUE) {
   header("location:../product_categories.php");
} else {
   header("location:../product_categories.php");
}

$conn->close();

?>