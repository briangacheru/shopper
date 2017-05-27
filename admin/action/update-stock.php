<?php
session_start();
$producttoedit = $_SESSION['producttoedit'];

$product_name = $_POST['product'];
$bprice = $_POST['buyingprice'];
$sprice = $_POST['sellingprice'];
$lowstock = $_POST['stocklevel'];
$opstock = $_POST['stock'];
$barcode = $_POST['barcode'];
$prodcate = $_POST['productcategory'];
$produnit = $_POST['productunit'];
$exdate = $_POST['date'];
$exmonth = $_POST['month'];
$cust = $_POST['currentstock'];
$exyear = $_POST['year'];

include '../../config/db_config.php';

$sql = "UPDATE products SET name='$product_name', buying_price='$bprice', selling_price='$sprice', stock_level='$lowstock', open_Stock='$opstock', current_stock='$cust', barcode='$barcode', category='$prodcate', unit='$produnit', expire_date='$exdate', expire_month='$exmonth', expire_year='$exyear' WHERE product_id='$producttoedit'";

if ($conn->query($sql) === TRUE) {
    header("location:../edit_product.php");
} else {
     header("location:../edit_product.php");
}

$conn->close();

?>