<?php
include 'check-login.php';
$usermail = $_POST['email'];
$phone = $_POST['phone'];

include '../../config/db_config.php';

$sql = "SELECT * FROM users WHERE email = '$usermail'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      header("location:../new_user.php?err=Email address must be unique");
    }
} else {
  include '../../config/db_config.php';
$sql = "SELECT * FROM users WHERE phone = '$phone'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      header("location:../new_user.php?err=Phone number must be unique");
    }
} else {
	$fname = $_POST['fullname'];
	$gender = $_POST['gender'];
	$user_id = 'SU-'.$SEshopno. '-'.rand(1000,9999).'';
	$pass = uniqid();
	$encpass = base64_encode("$pass");
  include '../../config/db_config.php';
  
  $sql = "INSERT INTO users (user_id, fullname, email, gender, phone, password, shop)
VALUES ('$user_id', '$fname', '$usermail', '$gender', '$phone', '$encpass', '$SEshopno')";

if ($conn->query($sql) === TRUE) {
	            session_start();
				$_SESSION['newmwmber'] = true;
			$_SESSION['susername'] = $user_id;
			$_SESSION['suserpaa'] = $encpass;
  header("location:../new_user.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}


}

?>