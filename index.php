<?php

include 'router.php';

$router = new Router($_GET['url']);


$router->get('/', function(){
    echo "home page";
});

$router->get('/activity', function(){
    echo "les activitées";
});

$router->get('/activity/:id', function($id){
    echo "activitées ".$id;
})->with('id', '[0-9]+');

$router->post('/activity/:id', function($id){
    echo "activitées ".$id;
});

$router->run();