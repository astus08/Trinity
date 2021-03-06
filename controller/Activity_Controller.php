<?php 
namespace controller;

require '..\modele\PDO\SPDO.php';
use modele\PDO\SPDO;

if (isset($_POST['subscribe'])) {
    var_dump($_POST);
    $bdd = SPDO::getInstance();
    $sub = $bdd->subscribe($_POST);

    if ($sub != true) {
        header('Location: ../view/activities.php?id_activity='.$_POST['id_picture_subscribe']."&error=subscribe");
    }
    else{
        header('Location: ../view/activities.php?id_activity='.$_POST['id_picture_subscribe']);
    }
}

if (isset($_POST['cancel_subscribe'])) {
    var_dump($_POST);
    $bdd = SPDO::getInstance();
    $cancel = $bdd->cancelSubscribed($_POST);

    if ($cancel != true) {
        header('Location: ../view/activities.php?id_activity='.$_POST['id_picture_subscribe']."&error=cancel");
    }
    else{
        header('Location: ../view/activities.php?id_activity='.$_POST['id_picture_subscribe']);
    }
}

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

    foreach (SPDO::getInstance()->query('   SELECT activities.*, COUNT(activities_subscribes.id_activity) AS nbSub FROM activities
                                            LEFT JOIN activities_subscribes ON
                                                activities_subscribes.id_activity = activities.id_activity
                                            GROUP BY activities.id_activity
                                        ') as $line){
        $rows[] = array_map('utf8_encode', $line);
    }

    echo json_encode($rows);
}

function article($id){
    $tmp = SPDO::getInstance()->getActivity($id);

    echo json_encode($tmp);
}


?>