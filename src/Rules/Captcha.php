<?php

declare(strict_types=1);

namespace Rahul900day\Captcha\Rules;

use Illuminate\Contracts\Validation\Rule;
use Rahul900day\Captcha\Facades\Captcha as CaptchaFacade;

class Captcha implements Rule
{
    public static string $message = 'The captcha verification failed.';

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     */
    public function passes($attribute, $value): bool
    {
        return CaptchaFacade::verify($value);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return __(self::$message);
    }
}
