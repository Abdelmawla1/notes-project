<?php

use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

try {

    $form = LoginForm::validate($attributes = [
        'email' => $_POST['email'],
        'password' => $_POST['password']
    ]);

} catch (ValidationException $exception) {

    Session::flash('errors', $exception->getErrors());
    Session::flash('old', $exception->getOld());

    redirect('/login');
}

if ((new Authenticator)->attempt($attributes['email'], $attributes['password'])) {

    redirect('/');
}

$form->setErrors('LoginError', 'No matching account was found.');


redirect('/login');




//
//$form = new LoginForm();
//
//if ($form->validate($email, $password)) { // if login form failed, then we have to return to the login form and display the error
//
//    if ((new Authenticator)->attempt($email, $password)) {  // if we were successful, they're now signed in, and we can redirect them wherever they need
//
//        redirect('/');
//
//    } else {
//        $form->setErrors('LoginError', 'No matching account was found.');
//    }
//}
//
//Session::flash('errors', $form->getErrors());
//Session::flash('old',[
//    'email' => $_POST['email']
//]);
//
//redirect('/login');


