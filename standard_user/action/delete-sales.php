<?php
$productname = $_GET['pr'];
$ammount = $_GET['am'];
$salesid = $_GET['ref'];

include 'check-login.php';
include '../../config/db_config.php';
$sql = "SELECT * FROM products  WHERE name = '$productname'  and shop_id = '$SEshopno'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      $current_stock = $row['current_stock'];
	  $newstock = $ammount + $current_stock;
    }
} else {

}

include '../../config/db_config.php';

$sql = "UPDATE products SET current_stock ='$newstock' WHERE name = '$productname'  and shop_id = '$SEshopno'";

if ($conn->query($sql) === TRUE) {
   
} else {

}

$conn->close();

include '../../config/db_config.php';
$sql = "DELETE FROM sales WHERE sales_id='$salesid' and shop = '$SEshopno'";

if ($conn->query($sql) === TRUE) {

} else {

}

header("location:../sales.php");
?>