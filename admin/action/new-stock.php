<?php
include 'check-login.php';
$product_id = 'P-'.$SEshopno. '-'.rand(100000,999999).'';
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
$exyear = $_POST['year'];

include '../../config/db_config.php';

$sql = "INSERT INTO products (product_id, shop_id, name, buying_price, selling_price, stock_level, open_stock, current_stock, barcode, category, unit, expire_date, expire_month, expire_year)
VALUES ('$product_id', '$SEshopno', '$product_name', '$bprice', '$sprice', '$lowstock', '$opstock', '$opstock', '$barcode', '$prodcate', '$produnit', '$exdate', '$exmonth', '$exyear')";

if ($conn->query($sql) === TRUE) {
    header("location:../new_stock.php?in=Product $product_name have been registered");
} else {
    header("location:../new_stock.php?err=Could not register product $product_name");
}

$conn->close();

?>