<?php
	session_start();
	$delete = $_GET['id'];
	unset($_SESSION['cart'][$delete]);
	header('Location: cart.php');
?>