<?php
include '../config/db_config.php';
include 'check-login.php';
$shop_timezone = $_SESSION['shoptimezone'];
date_default_timezone_set($shop_timezone);

$todaydate = ''.date('d').'-'.date('m').'-'.date('Y');
$today = date('d');
$month = date('m');
$yr = date('Y');

$sql = "SELECT * FROM products WHERE shop_id = '$SEshopno' and stock_level >= current_stock";
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
$sql = "SELECT * FROM products WHERE shop_id = '$SEshopno' and expire_date = '$today' and expire_month = '$month' and expire_year = '$yr'";
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


include '../config/db_config.php';

$sql = "SELECT * FROM products WHERE shop_id = '$SEshopno'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 $mypr1=mysqli_num_rows($result);
    while($row = $result->fetch_assoc()) {
    
    }
} else {
$mypr1 = "0";
}
$conn->close();


include '../config/db_config.php';

$sql = "SELECT * FROM users WHERE shop = '$SEshopno'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 $myus1=mysqli_num_rows($result);
    while($row = $result->fetch_assoc()) {
    
    }
} else {
$myus1 = "0";
}
$conn->close();


include '../config/db_config.php';

$sql = "SELECT * FROM sales  WHERE shop = '$SEshopno' and date = '$todaydate'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$mysum = 0;
 $mysum2=mysqli_num_rows($result);
    while($row = $result->fetch_assoc()) {
    $myvalue = $row['total'];

    $mysum += $myvalue;
    }
} else {
$mysum = "0";
}
$conn->close();

include '../config/db_config.php';
$sql = "SELECT * FROM sales  WHERE shop = '$SEshopno' and date = '$todaydate' ORDER BY total DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$mysum22 = 0;
 $mysum2=mysqli_num_rows($result);
    while($row = $result->fetch_assoc()) {
      $pname = $row['product_name'];
    }
} else {
$pname = "NIL";
}
$conn->close();


include '../config/db_config.php';
$sql = "SELECT * FROM sales  WHERE shop = '$SEshopno' ORDER BY total DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$mysum222 = 0;
 $mysum222=mysqli_num_rows($result);
    while($row = $result->fetch_assoc()) {
      $tpname = $row['product_name'];
    }
} else {
 $tpname = "NIL";
}
$conn->close();


include '../config/db_config.php';

$sql = "SELECT * FROM sales  WHERE shop = '$SEshopno'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$pen = 0;
 $mysum2=mysqli_num_rows($result);
    while($row = $result->fetch_assoc()) {
    $myvalue = $row['total'];

    $pen += $myvalue;
    }
} else {
$pen  = "0";
}
$conn->close();

include '../config/db_config.php';

$sql = "SELECT * FROM products  WHERE shop_id = '$SEshopno'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$tincome = 0;
 $mysum2=mysqli_num_rows($result);
    while($row = $result->fetch_assoc()) {
    $fstock = $row['open_stock'];
	$sprice = $row['selling_price'];
    $myvalue = $sprice * $fstock;
	
    $tincome += $myvalue;
    }
} else {
$tincome  = "0";
}
$conn->close();
?>