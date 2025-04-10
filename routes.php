<?php


$router->get('/', "controllers/home.php");
$router->get('/about',"controllers/about.php");
$router->get('/notes',"controllers/notes.php");
$router->get('/contact',"controllers/contact.php");


//return [
//  '/' =>   "controllers/home.php",
//  '/about' =>   "controllers/about.php",
//  '/notes' =>   "controllers/notes.php",
//  '/contact' =>   "controllers/contact.php",
//];