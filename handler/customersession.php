<?php
if (empty($_SESSION['email'] AND $_SESSION['password'])) {
	echo "<script> alert('Ju nuk jeni i loguar');
		window.location.href='customerforms.php';
		</script>";
}

?>