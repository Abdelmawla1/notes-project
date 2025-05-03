<?php

$router->get('/', "home.php");
$router->get('/about',"about.php");
$router->get('/contact',"contact.php");

# routes related to notes

$router->get('/notes',"notes/index.php")->only('auth');
$router->get('/note',"notes/show.php");

$router->get('/note/create','notes/create.php');
$router->post('/notes','notes/store.php');

$router->get('/note/edit','notes/edit.php');
$router->patch('/note','notes/update.php');
$router->delete('/note','notes/destroy.php');

# routes related to register

$router->get('/register','registration/create.php')->only('guest');
$router->post('/register','registration/store.php');

# routes related to log in

$router->get('/login','session/create.php')->only('guest');
$router->post('/login','session/store.php');

# routes related to log out
$router->delete('/logout','session/destroy.php')->only('auth');
