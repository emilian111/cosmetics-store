<?php
include('../partials/connect.php');
$email=$_POST['email'];
$password=$_POST['password'];
$password2=$_POST['password2'];

if ($password==$password2) {
	$password = password_hash($password, PASSWORD_DEFAULT);
	$sql_u = "SELECT * FROM customers WHERE username='$email'";
	$res_u = mysqli_query($connect, $sql_u);
	if (mysqli_num_rows($res_u) > 0) {	
		echo "<script> alert('Sorry... email already taken');
			window.location.href='../customerforms.php';
			</script>";
  	}
	elseif(!preg_match('/^[a-zA-Z0-9.\!\#\$\%\&\"\*\+\/\=\?\^\_\`~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/', trim($_POST["email"]))){
		echo "<script> alert('email can only contain letters and numbers');
			window.location.href='../customerforms.php';
			</script>";
	}elseif(strlen(trim($_POST["password"])) < 6){
		echo "<script> alert('password must have atleast 6 letters');
			window.location.href='../customerforms.php';
			</script>";
	}
	else{
		$sql="INSERT INTO customers(username, password) VALUES('$email','$password')";
		$connect->query($sql);
		echo "<script> alert('You are registered');
				window.location.href='../customerforms.php';
				</script>";
	}
	
}else{
	echo "<script> alert('Password did not match');
			window.location.href='../customerforms.php';
			</script>";
}

?>