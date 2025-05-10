<?php

namespace Http\Forms;

use Core\Validator;
use Core\ValidationException;

class LoginForm
{
    protected array $errors = [];

    public function __construct(public array $attributes)
    {
        if (!Validator::email($this->attributes['email'])) {
            $this->errors ['email'] = 'Please provide a valid email address.';
        }

        if (!Validator::String($this->attributes['password'], 6)) {
            $this->errors ['password'] = 'Please provide a valid password.';
        }
    }

    public static function validate($attributes)
    {
        $instance = new static($attributes);
        return $instance->hasErrors() ? $instance->throw() : $instance;
    }

    /**
     * @throws ValidationException
     */
    public function throw(): void
    {
            ValidationException::throw($this->getErrors(), $this->attributes);
    }

    public function hasErrors(): int
    {
        return count($this->errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function setErrors($field, $message)
    {
        $this->errors[$field] = $message;
        return $this;
    }
}