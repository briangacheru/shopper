<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $SEuserid = $_SESSION['user_id'];
        $SEfullname = $_SESSION['fullname'];	
        $SEemail = $_SESSION['myemail'];	
		$SEgender = $_SESSION['gender'];
        $SEshopno = $_SESSION['shop_no'];	
		$SEavator = $_SESSION['avatar'];
		$SErole = $_SESSION['role'];
		$SEphone = $_SESSION['myphone'];
		if ($SErole == "users") {
			
		}else{
			header("location:.././?err=You must be a user");
		}
	
}else{
	header("location:.././?err=You must login first");
}


include '../config/db_config.php';

$sql = "SELECT * FROM shops WHERE shop_no = '$SEshopno'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
     $SEcur = $row['shop_currency'];
    }
} else {

}
$conn->close();