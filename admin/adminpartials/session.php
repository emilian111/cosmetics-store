<?php
session_start();

if(empty($_SESSION['email_admin'] AND $_SESSION['password_admin'])){
	header('location: adminlogin.php');
}



?>