<?php
include 'check-login.php';
$category = $_POST['unit'];

include '../../config/db_config.php';

$sql = "INSERT INTO product_units (name, shop)
VALUES ('$category', '$SEshopno')";

if ($conn->query($sql) === TRUE) {
   header("location:../product_units.php");
} else {
   header("location:../product_units.php");
}

$conn->close();

?>