<?php
include 'check-login.php';

$new_pass = base64_encode($_POST['pas1']);

include '../../config/db_config.php';

$sql = "UPDATE shops SET shop_password='$new_pass' WHERE shop_id='$SEshop_id'";

if ($conn->query($sql) === TRUE) {
   header("location:../account_settings.php");
} else {
   header("location:../account_settings.php");
}

$conn->close();

?>
 