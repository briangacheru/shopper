<?php
$shop_email = $_POST['email'];

include '../config/db_config.php';

$sql = "SELECT * FROM shops WHERE shop_email='$shop_email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
       header("location:../register-shop.php?er=Email $shop_email is used please select another email");
    }
} else {
$shop_name = $_POST['shopname'];
$hop_currency = $_POST['currency'];
$shop_password = base64_encode($_POST['password']);
$shop_timezone = $_POST['timezone'];

$shop_no = rand(1000,9999);
$shop_id = 'SM-'.rand(100,999).'-'.rand(100,999).'-'.rand(100,999).'';
$shop_username = 'S'.rand(10,99).'_'.rand(10000000,99999999);

include '../config/db_config.php';

$sql = "INSERT INTO shops (shop_id, shop_name, shop_email, shop_currency, shop_timezone, shop_password, shop_username, shop_no)
VALUES ('$shop_id', '$shop_name', '$shop_email', '$hop_currency', '$shop_timezone', '$shop_password', '$shop_username', '$shop_no')";

if ($conn->query($sql) === TRUE) {
            session_start();
            $_SESSION['registered'] = true;
            $_SESSION['shopname'] = $shop_name;
            $_SESSION['currency'] = $hop_currency;
			$_SESSION['shopid'] = $shop_id;
			$_SESSION['shopuser'] = $shop_username;
			$_SESSION['email'] = $shop_email;
			$_SESSION['mytimezone'] = $shop_timezone;
			header("location:../confirm_order.php");
} else {
   header("location:../register-shop.php?er=Could not create account");
}

}
$conn->close();

?>