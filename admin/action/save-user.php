<?php
include 'check-login.php';
$usermail = $_POST['email'];
$phone = $_POST['phone'];

$usertoedit = $_SESSION['usertoedit'];
include '../../config/db_config.php';

$sql = "SELECT * FROM users WHERE email = '$usermail' and user_id != '$usertoedit'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      header("location:../edit_user.php?err=Email address must be unique");
    }
} else {
  include '../../config/db_config.php';
$sql = "SELECT * FROM users WHERE phone = '$phone' and user_id != '$usertoedit'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      header("location:../edit_user.php?err=Phone number must be unique");
    }
} else {
	$fname = $_POST['fullname'];
	$gender = $_POST['gender'];
  include '../../config/db_config.php';
  
$sql = "UPDATE users SET fullname ='$fname', email = '$usermail', gender = '$gender', phone = '$phone' WHERE user_id='$usertoedit'";

if ($conn->query($sql) === TRUE) {
    header("location:../my_users.php");
} else {
    header("location:../my_users.php");
}

}


}

?>