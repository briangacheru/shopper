<?php
include 'check-login.php';
$new_dp = addslashes(file_get_contents($_FILES['f1']['tmp_name']));

include '../../config/db_config.php';

$sql = "UPDATE shops SET shop_logo='$new_dp' WHERE shop_id='$SEshop_id'";

if ($conn->query($sql) === TRUE) {
    header("location:../logout.php");
} else {
       header("location:../logout.php");
}

$conn->close();

?>
 

