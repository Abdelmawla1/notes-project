<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    protected array $errors = [];

    function validate($email, $password): bool
    {
        if (!Validator::email($email)) {
            $this->errors ['email'] = 'Please provide a valid email address.';
        }

        if (!Validator::String($password)) {
            $this->errors ['password'] = 'Please provide a valid password.';
        }

       return empty($this->errors);
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