<?php
use JetBrains\PhpStorm\NoReturn;
#[NoReturn]function dd($arr): void
{
    echo "<pre>";
    var_dump($arr);
    echo "<pre>";
    die();
}

