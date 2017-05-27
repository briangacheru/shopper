<?php
session_start();
$producttosearch = $_POST['product'];

$_SESSION['producttosearch'] = $producttosearch;

header("location:../search_results.php");
?>
