<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = [];

if (! Validator::email($_POST['email'])) {
    $errors['email'] = "Please provide a valid email address.";
}

if (! Validator::string($_POST['password'], 6, 255)) {
    $errors['password'] = "Please provide a password of at least seven characters.";
}

if (! empty($errors)) {
    view('registration/create.view.php', [
        'errors' => $errors
    ]);
}
$user = $db->table('users')->select()->where('email', '=', $_POST['email'])->execute()->getRow();

if ($user) {
    header('location: /');
    exit();
} else {
    $db->table('users')->insert([
        'email' => $_POST['email'],
        'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)
    ])->execute();

    $_SESSION['user'] = [
        'email' => $_POST['email']
    ];

    header('location: /');
    exit();
}
