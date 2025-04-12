<?php

use Core\App;
use Core\Container;
use Core\Database;

$container = new Container();

$container->bind(Database::class,function (){
    $config = require base_path('configs.php');
    return new Database($config['database']);
});

App::setContainer($container);

