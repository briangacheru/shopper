<?php
$product = $_GET['ref'];
include '../../config/db_config.php';

$sql = "DELETE FROM products WHERE product_id='$product'";

if ($conn->query($sql) === TRUE) {
   header("location:../stock_list.php");
} else {
    header("location:../stock_list.php");
}

$conn->close();

?>