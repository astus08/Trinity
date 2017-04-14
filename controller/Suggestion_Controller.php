<?php

session_start();

if (!isset($_SESSION['id'])) {
	header('Location: ../view/index.php');
}

var_dump($_POST)


?>