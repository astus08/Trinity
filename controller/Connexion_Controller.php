<?php
include '../modele/PDO/SPDO.php';

var_dump($_POST);

$bdd = modele\PDO\SPDO::getInstance();

if (isset($_POST['lastName']) && isset($_POST['firstName']) && isset($_POST['mail']) && isset($_POST['pwd']) && isset($_POST['pwd_repeat'])) {

	//inscription
	if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
		if ($_POST['pwd'] == $_POST['pwd_repeat']) {
			array_pop($_POST);

			try{
				$inscription = inscription($bdd, $_POST);
				if ($inscription == TRUE) {
					header('Location: ../view/home.php?success=inscription');
				}
			}
			catch(Exception $e){
				header('Location: ../view/home.php?error=inscription');
			}
		}

	}

}
elseif(isset($_POST['mail']) && isset($_POST['pwd'])){

	//connexion
	if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
		array_pop($_POST);
		try{

			$connexion = connexion($bdd, $_POST);

			if ($connexion != FALSE) {
				session_start();

				$_SESSION['id'] = $connexion['id_user'];
				$_SESSION['firstName'] = $connexion['firstName'];
				$_SESSION['lastName'] = $connexion['lastName'];
				$_SESSION['avatar'] = $connexion['avatar'];

				var_dump($_SESSION);
				header('Location: ../view/home.php');
			}
		}
		catch(Exception $e){
			header('Location: ../view/home.php');
		}

	}

}

// Connexion

function connexion($bdd, $data)
{
	
	$result = $bdd->connexion($data);

	if (isset($result)) {
		if ($data['mail'] != $result['email']) {
			throw new Exception("Emails are not the same");
		}
		if ($data['pwd'] != $result['pwd']) {
			throw new Exception("Passwords are not the same");
		}

		return $result;
	}
	else{
		return FALSE;
	}
}


function inscription($bdd, $data){

	$result = $bdd->inscription($data);

	var_dump($result);
	if ($result == TRUE) {
		header('Location: ../view/home.php');
	}
	else{
		throw new Exception("Error Processing inscription");
		
	}
}


?>