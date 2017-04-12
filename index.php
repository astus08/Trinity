<?php

include 'controler/router/router.php';

$router = new Router($_GET['url']);


$router->get('/', function(){
    echo "home page";
});

$router->get('/activity', function(){
    echo "les activitées";
});

$router->get('/activity/:id-:slug', function($id, $slug){
    echo "activitées ".$id;
})->with('id', '[0-9]+')->with('slug', '[a-z\-0-9]+');

$router->post('/activity/:id', function($id){
    echo "activitées ".$id;
});

$router->run();