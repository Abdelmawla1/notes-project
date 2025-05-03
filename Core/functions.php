<?php

use JetBrains\PhpStorm\NoReturn;

#[NoReturn] function dd($arr): void
{
    echo "<pre>";
    var_dump($arr);
    echo "<pre>";
    die();
}

function isSelectedURL($url):bool
{
    return ($_SERVER['REQUEST_URI'] === $url);
}

/**
 * this method for declaring a path that is relative to the root of the project
 * the path will be provided when we call the function
 * @param $path
 * @return string
 */
function base_path($path): string
{
    return BASE_PATH . $path;
}

/**
 * this method like the base_path() and it included inside, but the difference that we will start at the views directory,
 * and then we will concatenate the path to the user's provided view
 * attributes is an array where the keys are variables names and values are the values for these variables
 * which we will send them to the view, and they will be the only ones that will be available when we load our view
 * extract() import variables into the current symbol table from an array
 * @param $path
 * @param array $attributes
 * @return void
 */
function view($path, array $attributes = []): void
{
    extract($attributes);
    require base_path("views/{$path}");
}

function authorize($condition, $statusCode = 403): void
{
    if (!$condition) {
        abort($statusCode);
    }
}

/**
 * this method do two things
 * the first one is to set response code
 * the second is to declare the path and bring the page that related to that response code
 * @param int $response_code
 * @return void
 */
#[NoReturn] function abort(int $response_code = 404): void
{
    http_response_code($response_code);
    require base_path("views/{$response_code}.php");
    die();
}

function login($user): void
{
    $_SESSION['user'] = [
      'email' => $user['email']
    ];

    session_regenerate_id(true);
}

function logout(): void
{
    $_SESSION = [];
    session_destroy();
    $params = session_get_cookie_params();
    setcookie('PHPSESSID','',time() - 3600,$params['path'],$params['domain'],$params['secure'],$params['httponly']);
}

#[NoReturn] function redirect($path): void
{
 header("location: {$path}");
 exit();
}
