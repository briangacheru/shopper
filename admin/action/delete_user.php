<?php
$user = $_GET['ref'];
include '../../config/db_config.php';

$sql = "DELETE FROM users WHERE user_id='$user'";

if ($conn->query($sql) === TRUE) {
   header("location:../my_users.php");
} else {
    header("location:../my_users.php");
}

$conn->close();

?>