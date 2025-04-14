<?php

use Core\App;
use Core\Database;
use Core\Validator;

$currentUserId = 1;
//dd("now here from create");
$db = App::resolve(Database::class);

$errors = [];

if (! Validator::string($_POST['note'],1,1000)){
    $errors['note'] = 'A note of no more than 1,000 character is required.';
}

if (! empty($errors)){
    view('notes/create.view.php',[
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}

$db->table('notes')->insert([
    'note' => $_POST['note'],
    'user_id' => $currentUserId
])->execute();

header('location: /notes');
die();
