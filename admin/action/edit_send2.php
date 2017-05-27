<?php
$producttoedit = $_GET['ref'];
session_start();
$_SESSION['producttoedit'] = $producttoedit;

header("location:../edit_product.php");

?>