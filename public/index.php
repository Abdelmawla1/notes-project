<?php

// This const (BASE_PATH) will point to a path and absolute path to the root of the project
// some programmers call that const SPACE_PATH
// You can concatenate it to the require below and in the others files, but we will use different approach by using function.
const BASE_PATH = __DIR__ . '/../';

// We can't call base_path() here because it's for functions.php and that helper function doesn't exist yet.
require BASE_PATH . "Core/functions.php";

session_start();

spl_autoload_register(function ($class){

    $class = str_replace("\\",DIRECTORY_SEPARATOR,$class);
    require base_path("{$class}.php");

});

require base_path('bootstrap.php');

$router = new Core\Router();

$routes = require base_path("routes.php");

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method']?? $_SERVER['REQUEST_METHOD'];

$router->route($uri,$method);



