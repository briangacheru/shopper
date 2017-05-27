<?php
include 'check-login.php';
$shopemail = $_POST['shopemail'];
$Shopphone = $_POST['shopphone'];
$shopname = $_POST['shopname'];
$shopcure = $_POST['currency'];
$shopadd = $_POST['shopaddress'];
$shopstrt = $_POST['shopstreet'];
$shopphon = $_POST['shopphone'];
$shoptimezone = $_POST['timezone'];

include '../../config/db_config.php';

$sql = "SELECT * FROM shops WHERE shop_email = '$shopemail' and shop_id != '$SEshop_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        header("location:../account_settings.php?er=Email $shopemail is used please select another email");
    }
} else {
    include '../../config/db_config.php';

$sql = "SELECT * FROM shops WHERE shop_phone = '$Shopphone' and shop_id != '$SEshop_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        header("location:../account_settings.php?er=Phone $Shopphone is used please select another email");
    }
} else {
    include '../../config/db_config.php';
	$sql = "UPDATE shops SET shop_name = '$shopname', shop_email = '$shopemail', shop_currency = '$shopcure', shop_timezone='$shoptimezone', shop_address = '$shopadd', shop_street = '$shopstrt', shop_phone = '$shopphon' WHERE shop_id='$SEshop_id'";

if ($conn->query($sql) === TRUE) {
    header("location:../logout.php");
} else {
     header("location:../logout.php");
}
}

}
$conn->close();