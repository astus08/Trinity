<?php 
namespace controller;

session_start();

require '..\modele\PDO\SPDO.php';
use modele\PDO\SPDO;

if (isset($_GET['id_activity'])){
    pictures($_GET['id_activity']);
} elseif (isset($_GET['id_picture'])){
    picture($_GET['id_picture']);
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
    echo json_encode($tmp);
}

function hasVote($id_picture){
    return SPDO::getInstance()->getPicture($id_picture, $_SESSION['id']);
}

?>