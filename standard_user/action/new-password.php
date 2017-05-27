<?php
include 'check-login.php';

$new_pass = base64_encode($_POST['pas1']);

include '../../config/db_config.php';

$sql = "UPDATE users SET password='$new_pass' WHERE user_id='$SEuserid'";

if ($conn->query($sql) === TRUE) {
   header("location:../account_settings.php");
} else {
   header("location:../account_settings.php");
}

$conn->close();

?>
 