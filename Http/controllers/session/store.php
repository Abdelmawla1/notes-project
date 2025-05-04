<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form->validate($email, $password)) { // if login form failed, then we have to return to the login form and display the error

    $auth = new Authenticator();

    if ($auth->attempt($email, $password)) {  // if we were successful, they're now signed in, and we can redirect them wherever they need

        redirect('/');

    } else {
        $form->setErrors('LoginError', 'No matching account was found.');
    }
}

view('session/create.view.php', [
    'errors' => $form->getErrors()
]);
