<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

// Log in the user if credentials match

if (!Validator::email($email)) {
    $errors ['email'] = 'Please provide a valid email address.';
}

if (!Validator::String($password)) {
    $errors ['password'] = 'Please provide a valid password.';
}

if (!empty($errors)) {
    view('session/create.view.php', [
        'errors' => $errors
    ]);
}

$user = $db->table('users')->select()->where('email', '=', $email)->execute()->getRow();

if ($user) {

    if (password_verify($password, $user['password'])) {
        login([
            'email' => $email
        ]);

        header('location: /');
        exit();
    }
}

view('session/create.view.php', [
    'errors' => [
        'loginError' => 'No matching account was found.',
    ]
]);