<?php

namespace Core;

class ValidationException extends \Exception
{
    protected array $errors = [];
    protected array $old = [];

    /**
     * @throws ValidationException
     */
    public static function throw($errors, $old)
    {
        $instance = new static;
        $instance->errors = $errors;
        $instance->old = $old;
        throw $instance;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function getOld(): array
    {
        return $this->old;
    }
}
