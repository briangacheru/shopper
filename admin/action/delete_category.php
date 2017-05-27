<?php
include 'check-login.php';
$category = $_GET['ref'];

include '../../config/db_config.php';

$sql = "DELETE FROM product_categories WHERE name ='$category' and shop = '$SEshopno'";

if ($conn->query($sql) === TRUE) {
   header("location:../product_categories.php");
} else {
     header("location:../product_categories.php");
}

$conn->close();

?>