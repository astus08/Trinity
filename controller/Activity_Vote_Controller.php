<?php

session_start();

include '../modele/PDO/SPDO.php';

var_dump(strlen($_POST['date']));
exit();

if (isset($_POST['id_user']) && isset($_POST['id_activity']) && isset($_POST['vote']) && isset['date']) {
	$bdd = modele\PDO\SPDO::getInstance();

	$vote = $bdd->vote($_POST);

	if ($vote == TRUE) {
		header('Location: ../view/activities.php?id_activity='.$_POST['id_activity']);
	}else{
		header('Location: ../view/activities.php?id_activity='.$_POST['id_activity'].'&error=vote');
	}

}

if (isset($_POST['id_user']) && isset($_POST['id_activity']) && isset($_POST['unvote'])) {
	$bdd = modele\PDO\SPDO::getInstance();

	$vote = $bdd->unVote($_POST);

	if ($vote == TRUE) {
		header('Location: ../view/activities.php?id_activity='.$_POST['id_activity']);
	}else{
		header('Location: ../view/activities.php?id_activity='.$_POST['id_activity'].'&error=unvote');
	}

}


?>