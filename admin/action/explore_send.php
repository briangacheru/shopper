<?php
$product = $_GET['ref'];
session_start();
$_SESSION['exploreprod'] = $product;

header("location:../explore_product.php");

?>