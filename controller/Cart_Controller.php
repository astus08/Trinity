<?php

session_start();


if (isset($_SESSION['basket']) && isset($_POST['id'])) {
	array_splice($_SESSION['basket'], $_POST['id'], 1);
	
	header('Location: ../view/cart.php');
}


?>