<?php

class Validator
{
    public static function string($value, $min = 1, $max = INF):bool
    {
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email($email):bool|string
    {
        return filter_var($email,FILTER_VALIDATE_EMAIL);
    }
}