<?php

namespace App;

trait Validation
{
    public array $errors = [];

    public array $messages = [
        'required' => 'is required.',
        'email' => 'is not a valid email format.',
        's' => 'must only contain alphabetic characters.',
        'i' => 'must be only contain numeric characters.',
        'maxlength' => 'is too long.',
        'minlength' => 'is too short.',
    ];

    public function required($value): bool
    {
        return !empty($value);
    }

    public function s($value): bool
    {
        return is_string($value);
    }

    public function i($value): bool
    {
        return is_numeric(trim($value));
    }

    public function maxlength($value, int $length): bool
    {
        return strlen($value) <= $length;
    }

    public function minlength($value, int $length): bool
    {
        return strlen($value) >= $length;
    }

    public function email($value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public function type($value, string $type): bool
    {
        return $this->$type($value);
    }

    public function validate(): array
    {
        $_SESSION['errors'] = [];
        foreach ($_POST as $key => $value) {
            if (array_key_exists($key, $this->rules)) {
                $propertyRules = $this->rules[$key];
                foreach ($propertyRules as $propertyRule => $propertyValue) {
                    if (! $this->$propertyRule($value, $propertyValue)) {
//                        dump('error', false);
//                        dump($this->messages[$propertyRule]);

                        $message = $this->messages[$propertyRule];
                        if ($propertyRule === 'type') {
                           $message = $this->messages[$propertyValue];
                        }
                        $this->errors[$key]['message'] = str_replace('_', ' ', ucfirst($key)) . '\' ' . $value . ' \'' . $message;
                        $this->errors[$key]['value'] = $value;
                    }
                }
            }
        }
        return $this->errors;
    }

}