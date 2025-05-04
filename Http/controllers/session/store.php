<?php

use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form->validate($email, $password)) { // if login form failed, then we have to return to the login form and display the error

    if ((new Authenticator)->attempt($email, $password)) {  // if we were successful, they're now signed in, and we can redirect them wherever they need

        redirect('/');

    } else {
        $form->setErrors('LoginError', 'No matching account was found.');
    }
}

Session::flash('errors', $form->getErrors());
//$_SESSION['_flash']['errors'] = $form->getErrors();

redirect('/login');

//view('session/create.view.php', [
//    'errors' => $form->getErrors()
//]);
