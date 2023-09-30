<?php

declare(strict_types=1);

namespace Rahul900day\Captcha\Exceptions;

use Exception;

class InvalidCaptchaDriverException extends Exception
{
    public function __construct(string $driver)
    {
        parent::__construct("The entered captcha driver: {$driver} is invalid.");
    }
}
