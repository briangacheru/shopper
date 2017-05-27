<?php
include 'check-login.php';
$category = $_GET['ref'];

include '../../config/db_config.php';

$sql = "DELETE FROM product_units WHERE name ='$category' and shop = '$SEshopno'";

if ($conn->query($sql) === TRUE) {
   header("location:../product_units.php");
} else {
     header("location:../product_units.php");
}

$conn->close();

?>