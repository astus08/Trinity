<?php

session_start();

include '../modele/PDO/SPDO.php';

if (!isset($_SESSION['id'])) {
	header('Location: ../view/index.php');
}

if (strlen($_POST['content']) > 255) {
	header('Location: ../view/suggestion.php?error=toLong');
}

$bdd = modele\PDO\SPDO::getInstance();

array_pop($_POST);

$suggest = $bdd->suggest($_POST);

if ($suggest) {
	header('Location: ../view/activities.php');
}
else{
	header('Location: ../view/suggestion.php?error=error');
}

?>