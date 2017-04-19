<?php

session_start();

include '../modele/PDO/SPDO.php';
use modele\PDO\SPDO;

if ((isset($_POST['birth_date']) && strlen($_POST['birth_date']) != 0) && isset($_POST['btn_birth'])) {
	
	$result = SPDO::getInstance()->settingsBirth($_POST);
	
	if ($result) {
		header('Location: ../view/settings.php');
	}
	else{
		header('Location: ../view/settings.php?error=birth');
	}
}


if (isset($_POST['img']) && isset($_FILES['img_post'])) {
	$tmp = postPct();
	if (tmp) {
		header('Location: ../view/settings.php');
	}
	else{
		header('Location: ../view/settings.php?error=avatar');
	}
}


function postPct(){
    $fileName = $_FILES['img_post']['name'];

    $extensions = array('.png', '.jpg', '.jpeg');
    $extension = strtolower(strrchr($fileName, '.'));
    $sizeMax = 1048576;
    $size = filesize($_FILES['img_post']['tmp_name']);

    $file_dest = '../view/images/avatar/uploads/'. $fileName;

    if ($_FILES['img_post']['error']!=0){
        echo 'Error before upload';
    } else if(!in_array($extension, $extensions)){
        echo 'It\'s not an image';
    } else if ($size>$sizeMax) {
        echo 'The file is too big';
    } else {
        if(move_uploaded_file($_FILES['img_post']['tmp_name'], $file_dest)){
            SPDO::getInstance()->settingsPicture(array(substr($file_dest, 8), $_SESSION['id']));
            $_SESSION['avatar'] = substr($file_dest, 8);
            return true;
        } else {
            echo 'Error during upload';
        }
    }


}
?>