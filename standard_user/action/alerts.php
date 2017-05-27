<?php
session_start();
$shop_number = $_SESSION['shop_no'];	

include '../config/db_config.php';
$sql = "SELECT * FROM shops WHERE shop_no = '$shop_number'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
       $shop_timezone = $row['shop_timezone'];
    }
} else {
   
}
$conn->close();

date_default_timezone_set($shop_timezone);
$todaydate = ''.date('d').'-'.date('m').'-'.date('Y');
$today = date('d');
$month = date('m');
$yr = date('Y');

include '../config/db_config.php';

$sql = "SELECT * FROM products WHERE shop_id = '$shop_number' and stock_level >= current_stock";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 $exalert1=mysqli_num_rows($result);
 $ex1 = true;
    while($row = $result->fetch_assoc()) {
    
    }
} else {
$ex1 = false;
}
$conn->close();

include '../config/db_config.php';
$sql = "SELECT * FROM products WHERE shop_id = '$shop_number' and expire_date = '$today' and expire_month = '$month' and expire_year = '$yr'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 $exalert2=mysqli_num_rows($result);
 $ex2 = true;
    while($row = $result->fetch_assoc()) {
    
    }
} else {
$ex2 = false;
}
$conn->close();
?>