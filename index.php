<?php

$router = new router($_GET['url']);

$router->get('/activity', function(){
    echo "les activitées";
});

$router->get('/activity/:id', function($id){
    echo "activitées ".$id;
});

