<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    protected array $errors = [];

    public function __construct(public array $attributes)
    {
        if (!Validator::email($this->attributes['email'])) {
            $this->errors ['email'] = 'Please provide a valid email address.';
        }

        if (!Validator::String($this->attributes['password'])) {
            $this->errors ['password'] = 'Please provide a valid password.';
        }
    }

    public static function validate($attributes)
    {
        $instance = new static($attributes);

        if ($instance->hasErrors()) {
            ValidationException::throw($instance->getErrors(), $instance->attributes);
        }
        return $instance;
    }

    public function hasErrors(): int
    {
        return count($this->errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function setErrors($field, $message): void
    {
        $this->errors[$field] = $message;
    }
}