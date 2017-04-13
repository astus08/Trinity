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
} else {
    
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
    foreach (SPDO::getInstance()->query('   SELECT *
                                            FROM activities
                                            WHERE id = '.$id) as $line){
        $rows[] = array_map('utf8_encode', $line);
    }
}


?>