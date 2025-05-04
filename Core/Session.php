<?php

namespace Core;

class Session
{
    public static function put($key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key, $default = null)
    {
        if (isset($_SESSION['_flash'][$key])){
            return $_SESSION['_flash'][$key];
        }
        return $_SESSION[$key] ?? $default;
    }

    public static function has($key): bool
    {
        return (bool) static::get($key);
    }

    public static function flash($key, $value): void
    {
        $_SESSION['_flash'][$key] = $value;
    }

    public static function unFlash(): void
    {
        unset($_SESSION['_flash']);
    }
}