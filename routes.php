<?php


$router->get('/', "controllers/home.php");
$router->get('/about',"controllers/about.php");
//$router->get('/notes',"controllers/notes.php");
$router->get('/contact',"controllers/contact.php");

# routes related to notes

$router->get('/notes',"controllers/notes/index.php");
$router->get('/note',"controllers/notes/show.php");

$router->get('/note/create','controllers/notes/create.php');
$router->post('/notes','controllers/notes/store.php');

$router->get('/note/edit','controllers/notes/edit.php');
$router->patch('/note','controllers/notes/update.php');
$router->delete('/note','controllers/notes/destroy.php');