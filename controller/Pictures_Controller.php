<?php
namespace controller;

session_start();

require '..\modele\PDO\SPDO.php';
use modele\PDO\SPDO;

if (isset($_GET['id_activity'])){
    pictures($_GET['id_activity']);
} elseif (isset($_GET['id_picture'])){
    picture($_GET['id_picture']);
} elseif (  isset($_POST['action']) && $_POST['action'] == 'vote' &&
            isset($_POST['idPct'])){
    vote();
} elseif (  isset($_POST['action']) && $_POST['action'] == 'comment' &&
            isset($_POST['idPct']) && isset($_POST['content'])){
    comment();
}


function pictures($id_activity){

    $rows = array();

    foreach (SPDO::getInstance()->query('   SELECT *
                                            FROM pictures_activity
                                            WHERE id_activity = \''.$id_activity .'\'') as $line){
        $rows[] = array_map('utf8_encode', $line);
    }

    echo json_encode($rows);
}

function picture($id_picture){
    $tmp = SPDO::getInstance()->getPicture($id_picture);

    array_push($tmp, SPDO::getInstance()->getComments($id_picture));

    echo json_encode($tmp);
}

function vote(){
    SPDO::getInstance()->votePct($_SESSION['id'], $_POST['idPct']);

    header('Location: /Trinity/view/pictures.php?id_picture='.$_POST['idPct']);
}

function comment(){
    SPDO::getInstance()->commentPct($_SESSION['id'], $_POST['idPct'], $_POST['content']);

    header('Location: /Trinity/view/pictures.php?id_picture='.$_POST['idPct']);
}


?>