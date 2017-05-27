<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	    $SEshop_id = $_SESSION['shop_id'];
        $SEshopname = $_SESSION['shop_name'];	
		$SEshopcurrency = $_SESSION['shop_currency'];
        $SEshopmail = $_SESSION['shop_email'];	
		$SEshopuser = $_SESSION['shop_username'];
        $SEshopno = $_SESSION['shop_no'];	
		$SEshoplogo = $_SESSION['shop_logo'];
	    $SErole = $_SESSION['role'];
		
		if ($SErole == "shops") {
			
		}else{
			header("location:.././?err=You must be admin");
		}
	
}else{
	header("location:.././?err=You must login first");
}