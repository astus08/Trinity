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
                                            FROM products
                                            INNER JOIN category ON
                                                products.id_category = category.id_category
                                            WHERE quantity>0') as $line){
        $rows[] = array_map('utf8_encode', $line);
    }

    echo json_encode($rows);
}

function article($id){
    $tmp = SPDO::getInstance()->getArticle($id);

    echo json_encode($tmp);
}

?>