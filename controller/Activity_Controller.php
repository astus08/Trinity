<?php 
namespace controller;

require '..\modele\PDO\SPDO.php';
use modele\PDO\SPDO;

if (isset($_GET['action'])){
    switch($_GET['action']){
        case 'all':
            articles();
            break;
    }
} elseif (isset($_GET['id'])){
    article($_GET['id']);
}


function articles(){

    $rows = array();

    foreach (SPDO::getInstance()->query('   SELECT *
                                            FROM activities
                                            WHERE vote_enable=0') as $line){
        $rows[] = array_map('utf8_encode', $line);
    }

    echo json_encode($rows);
}

function article($id){
    $tmp = SPDO::getInstance()->getArticle($id);

    echo json_encode($tmp);
}


?>