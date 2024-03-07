<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class DataValodator extends AbstractValidator
{
    protected string $message = 'Что то не так';

    public function rule(): bool
    {
        $value = $_FILES['data']['type']; // Assuming 'data' is the name of your field
        return preg_match('/\d{2}-\d{2}-\d{4}/', $value);
    }
}