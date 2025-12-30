<?php
session_start();
$_SESSION['message'] ='Logout Successfull!!!';
$_SESSION['message_type'] = 'success';
$_SESSION['row'] = '';

session_destroy();


echo"<script> window.location.href='../login.php'</script>";
?>  