<?php

session_start();

include '../modele/PDO/SPDO.php';

var_dump(isset($_POST['id_user']) && isset($_POST['id_activity']) && isset($_POST['btn']));
if (isset($_POST['id_user']) && isset($_POST['id_activity']) && isset($_POST['btn'])) {
	$_POST['id_user'] = (int)$_POST['id_user'];
	$_POST['id_activity'] = (int)$_POST['id_activity'];

	if ((is_numeric($_POST['id_user']) && !is_null($_POST['id_user'])) && (is_numeric($_POST['id_activity']) && !is_null($_POST['id_activity']))) {

		array_pop($_POST);


		$bdd = modele\PDO\SPDO::getInstance();
		
		$isVotePossible = $bdd->alreadyVoted();

		if (!$isVotePossible) {
			# code...
			$vote = $bdd->vote($_POST);

			if ($vote == TRUE) {
				header('Location: ../view/vote.php');
			}else{
				header('Location: ../view/vote.php?error=true');
			}
		}

		header('Location: ../view/vote.php?error=already');
	}
	else{
		header('Location: ../view/vote.php?error=true');
	}
}else{
	header('Location: ../view/vote.php?error=true');
}

?>