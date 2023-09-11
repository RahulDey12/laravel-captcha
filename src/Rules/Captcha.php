<?php

namespace Rahul900day\Captcha\Rules;

use Illuminate\Contracts\Validation\Rule;
use Rahul900day\Captcha\Facades\Captcha as CaptchaFacade;

class Captcha implements Rule
{
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
        return 'The captcha verification failed. Please try again.';
    }
}
