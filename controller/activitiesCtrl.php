<?php
namespace controller;

require '..\modele\PDO\SPDO.php';
use modele\PDO\SPDO;

$rows = array();


foreach (SPDO::getInstance()->query('   SELECT *
                                        FROM activities') as $line){
    $rows[] = array_map('utf8_encode', $line);
}

echo json_encode($rows);

class ctrl{

    public function article($id){
        foreach (SPDO::getInstance()->query('   SELECT *
                                                FROM activities
                                                WHERE id = '.$id) as $line){
            $rows[] = array_map('utf8_encode', $line);
        }
    }

    public function article(){
        foreach (SPDO::getInstance()->query('   SELECT *
                                                FROM activities') as $line){
            $rows[] = array_map('utf8_encode', $line);
            ?>

            <php?
            


        }
    }
}

?>