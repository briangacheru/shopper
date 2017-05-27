<?php
$usertoedit = $_GET['ref'];
session_start();
$_SESSION['usertoedit'] = $usertoedit;

header("location:../edit_user.php");

?>