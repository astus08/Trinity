<?php

session_start();

include '../modele/PDO/SPDO.php';


var_dump($_POST);

if (isset($_POST['id_user'] && isset($_POST['id_activity'] && isset($_POST['btn'])) {
	if ((is_numeric($_POST['id_user']) && !is_null($_POST['id_user'])) && (is_numeric($_POST['id_activity']) && !is_null($_POST['id_activity']))) {

		$bdd = modele\PDO\SPDO::getInstance();
		
	}
}

?>