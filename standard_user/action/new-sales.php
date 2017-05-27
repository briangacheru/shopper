<?php
include 'check-login.php';

include '../../config/db_config.php';
$sql = "SELECT * FROM shops WHERE shop_no = '$SEshopno'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
       $shop_timezone = $row['shop_timezone'];
    }
} else {
   
}

$conn->close();
date_default_timezone_set($shop_timezone);
$today = ''.date('d').'-'.date('m').'-'.date('Y');
error_reporting(0);
$product1 = $_POST['product1'];
$product2 = $_POST['product2'];
$product3 = $_POST['product3'];
$product4 = $_POST['product4'];
$product5 = $_POST['product5'];

$ammount1 = $_POST['ammount1'];
$ammount2 = $_POST['ammount2'];
$ammount3 = $_POST['ammount3'];
$ammount4 = $_POST['ammount4'];
$ammount5 = $_POST['ammount5'];





if ($product1 == ""){
	$product1 = "NIL";
	$p1price = "0";
	$p1total = "0";
	$ammount1 = "0";
	$unit1 = "";

}else{
 include '../../config/db_config.php';
 $sql = "SELECT * FROM products WHERE shop_id = '$SEshopno' and name = '$product1'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        $p1price = $row['selling_price'];
		$p1stock = $row['current_stock'];
		$p1total = $p1price * $ammount1;
		$newp1stock = $p1stock - $ammount1;
		$unit1 = $row['unit'];
		$sale1 = rand(100000,999999);
	 include '../../config/db_config.php';
	    $sql = "UPDATE products SET current_stock ='$newp1stock' WHERE shop_id = '$SEshopno' and name = '$product1'";
		if ($conn->query($sql) === TRUE) {
} else {
}
     include '../../config/db_config.php';
	    $sql = "INSERT INTO sales(sales_id, product_name, shop, price, amount, unit, total, date, signature)
        VALUES ('$sale1', '$product1', '$SEshopno', '$p1price', '$ammount1', '$unit1', '$p1total', '$today', '$SEuserid')";
		if ($conn->query($sql) === TRUE) {

} else {

}
}

} else {

}
$conn->close();
	
}


if ($product2 == ""){
	$product2 = "NIL";
	$p2price = "0";
	$p2total = "0";
	$ammount2 = "0";
    $unit2 = "";
}else{
 include '../../config/db_config.php';
 $sql = "SELECT * FROM products WHERE shop_id = '$SEshopno' and name = '$product2'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        $p2price = $row['selling_price'];
		$p2stock = $row['current_stock'];
		$p2total = $p2price * $ammount2;
		$newp2stock = $p2stock - $ammount2;
		$unit2 = $row['unit'];
		$sale2 = rand(100000,999999);
	 include '../../config/db_config.php';
	    $sql = "UPDATE products SET current_stock ='$newp2stock' WHERE shop_id = '$SEshopno' and name = '$product2'";
		if ($conn->query($sql) === TRUE) {
} else {
}
     include '../../config/db_config.php';
	    $sql = "INSERT INTO sales(sales_id, product_name, shop, price, amount, unit, total, date, signature)
        VALUES ('$sale2', '$product2', '$SEshopno', '$p2price', '$ammount2', '$unit2', '$p2total', '$today', '$SEuserid')";
		if ($conn->query($sql) === TRUE) {

} else {

}
}

} else {

}
$conn->close();
	
}



if ($product3 == ""){
	$product3 = "NIL";
	$p3price = "0";
	$p3total = "0";
	$ammount3 = "0";
	$unit3 = "";

}else{
 include '../../config/db_config.php';
 $sql = "SELECT * FROM products WHERE shop_id = '$SEshopno' and name = '$product3'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        $p3price = $row['selling_price'];
		$p3stock = $row['current_stock'];
		$p3total = $p1price * $ammount1;
		$newp3stock = $p3stock - $ammount3;
		$unit3 = $row['unit'];
		$sale3 = rand(100000,999999);
	 include '../../config/db_config.php';
	    $sql = "UPDATE products SET current_stock ='$newp3stock' WHERE shop_id = '$SEshopno' and name = '$product3'";
		if ($conn->query($sql) === TRUE) {
} else {
}
     include '../../config/db_config.php';
	    $sql = "INSERT INTO sales(sales_id, product_name, shop, price, amount, unit, total, date, signature)
        VALUES ('$sale3', '$product3', '$SEshopno', '$p3price', '$ammount3', '$unit3', '$p3total', '$today', '$SEuserid')";
		if ($conn->query($sql) === TRUE) {

} else {

}
}

} else {

}
$conn->close();
	
}



if ($product4 == ""){
	$product4 = "NIL";
	$p4price = "0";
	$p4total = "0";
	$ammount4 = "0";
	$unit4 = "";

}else{
 include '../../config/db_config.php';
 $sql = "SELECT * FROM products WHERE shop_id = '$SEshopno' and name = '$product4'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        $p4price = $row['selling_price'];
		$p4stock = $row['current_stock'];
		$p4total = $p4price * $ammount4;
		$newp4stock = $p4stock - $ammount4;
		$unit4 = $row['unit'];
		$sale4 = rand(100000,999999);
	 include '../../config/db_config.php';
	    $sql = "UPDATE products SET current_stock ='$newp4stock' WHERE shop_id = '$SEshopno' and name = '$product4'";
		if ($conn->query($sql) === TRUE) {
} else {
}
     include '../../config/db_config.php';
	    $sql = "INSERT INTO sales(sales_id, product_name, shop, price, amount, unit, total, date, signature)
        VALUES ('$sale4', '$product4', '$SEshopno', '$p4price', '$ammount4', '$unit4', '$p4total', '$today', '$SEuserid')";
		if ($conn->query($sql) === TRUE) {

} else {

}
}

} else {

}
$conn->close();
	
}




if ($product5 == ""){
	$product5 = "NIL";
	$p5price = "0";
	$p5total = "0";
	$ammount5 = "0";
	$unit5 = "";

}else{
 include '../../config/db_config.php';
 $sql = "SELECT * FROM products WHERE shop_id = '$SEshopno' and name = '$product5'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        $p5price = $row['selling_price'];
		$p5stock = $row['current_stock'];
		$p5total = $p5price * $ammount5;
		$newp5stock = $p5stock - $ammount5;
		$unit5 = $row['unit'];
		$sale5 = rand(100000,999999);
	 include '../../config/db_config.php';
	    $sql = "UPDATE products SET current_stock ='$newp5stock' WHERE shop_id = '$SEshopno' and name = '$product5'";
		if ($conn->query($sql) === TRUE) {
} else {
}
     include '../../config/db_config.php';
	    $sql = "INSERT INTO sales(sales_id, product_name, shop, price, amount, unit, total, date, signature)
        VALUES ('$sale5', '$product5', '$SEshopno', '$p5price', '$ammount5', '$unit5', '$p5total', '$today', '$SEuserid')";
		if ($conn->query($sql) === TRUE) {

} else {

}
}

} else {

}
$conn->close();
	
}

$_SESSION['product1'] = $product1;
$_SESSION['price1'] = $p1price;
$_SESSION['ammount1'] = $ammount1;
$_SESSION['total1'] = $p1total;
$_SESSION['unit1'] = $unit1;

$_SESSION['product2'] = $product2;
$_SESSION['price2'] = $p2price;
$_SESSION['ammount2'] = $ammount2;
$_SESSION['total2'] = $p2total;
$_SESSION['unit2'] = $unit2;

$_SESSION['product3'] = $product3;
$_SESSION['price3'] = $p3price;
$_SESSION['ammount3'] = $ammount3;
$_SESSION['total3'] = $p1tota3;
$_SESSION['unit3'] = $unit3;

$_SESSION['product4'] = $product4;
$_SESSION['price4'] = $p4price;
$_SESSION['ammount4'] = $ammount4;
$_SESSION['total4'] = $p1tota4;
$_SESSION['unit4'] = $unit4;

$_SESSION['product5'] = $product5;
$_SESSION['price5'] = $p5price;
$_SESSION['ammount5'] = $ammount5;
$_SESSION['total5'] = $p5total;
$_SESSION['unit5'] = $unit5;

header("location:../sales_receipt.php");
?>


