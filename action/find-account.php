<?php
$usermail = $_POST['email'];
$role = $_POST['role'];

if ($role == "shops") {
	include '../config/db_config.php';

$sql = "SELECT * FROM shops WHERE shop_email = '$usermail'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
    while($row = $result->fetch_assoc()) {
	$myusername = $row['shop_username'];
	$mypassword = base64_decode($row['shop_password']);
    $usermail = $row['shop_email'];
	$user_fullname = $row['shop_name'];
	
	require 'mail/PHPMailerAutoload.php';
  
$messagetosent = "Your username is <b>$myusername</b> and password is <b>$mypassword</b><br>Enjoy Shop Manager System<br>Bwire Charles Mashauri and Azizi Selemani Daudy<br>";

$mail = new PHPMailer;
$mail->isSMTP();                              
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;                          
$mail->Username = '';             
$mail->Password = '';                       
$mail->SMTPSecure = 'tls';                           
$mail->Port = 587;                                   

$mail->setFrom('shopmanagerv2.0@gmail.com', 'Bwire Charles Mashauri');
$mail->addAddress($usermail, $user_fullname);     
$mail->addReplyTo('bwiremashauri5@gmail.com', 'Reply');
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');

$mail->isHTML(true);                                 

$mail->Subject = 'Password Recover';
$mail->Body    = $messagetosent;
$mail->AltBody = 'you need HTML mail to view this content';

if(!$mail->send()) {
   header("location:../?err=Could not send email");
} else {
    header("location:../?in=Open $usermail for more information");
}
  
      
    }
} else {
    header("location:../reset-password.php?err=Account with email $usermail was not found in database");
}
$conn->close();
}else{
	include '../config/db_config.php';

$sql = "SELECT * FROM users WHERE email = '$usermail'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
    while($row = $result->fetch_assoc()) {

    $myusername = $row['user_id'];
	$mypassword = base64_decode($row['password']);
    $usermail = $row['email'];
	$user_fullname = $row['fullname'];
	
	require 'mail/PHPMailerAutoload.php';
  
$messagetosent = "Your username is <b>$myusername</b> and password is <b>$mypassword</b><br>Enjoy Shop Manager System<br>Bwire Charles Mashauri and Azizi Selemani Daudy<br>";

$mail = new PHPMailer;
$mail->isSMTP();                              
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;                          
$mail->Username = 'shopmanagerv2.0@gmail.com';             
$mail->Password = 'F1#0BkHr!mS0~9P';                       
$mail->SMTPSecure = 'tls';                           
$mail->Port = 587;                                   

$mail->setFrom('shopmanagerv2.0@gmail.com', 'Bwire Charles Mashauri');
$mail->addAddress($usermail, $user_fullname);     
$mail->addReplyTo('bwiremashauri5@gmail.com', 'Reply');
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');

$mail->isHTML(true);                                 

$mail->Subject = 'Password Recover';
$mail->Body    = $messagetosent;
$mail->AltBody = 'you need HTML mail to view this content';

if(!$mail->send()) {
   header("location:../?err=Could not send email");
} else {
    header("location:../?in=Open $usermail for more information");
}
        
    }
} else {
    header("location:../reset-password.php?err=Account with email $usermail was not found in database");
}
$conn->close();
	
}


?>