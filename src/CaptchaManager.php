<?php

namespace Rahul900day\Captcha;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Manager;
use Illuminate\Support\Str;
use InvalidArgumentException;
use Rahul900day\Captcha\Contracts\Captcha;
use Rahul900day\Captcha\Drivers\HCaptcha;
use Rahul900day\Captcha\Drivers\ReCaptcha;
use Rahul900day\Captcha\Drivers\TurnstileCaptcha;
use Rahul900day\Captcha\Exceptions\InvalidCaptchaDriverException;

class CaptchaManager extends Manager
{
    protected function createHCaptchaDriver(): Captcha
    {
        return new HCaptcha();
    }

    protected function createReCaptchaDriver(): Captcha
    {
        return new ReCaptcha();
    }

    protected function createTurnstileDriver(): Captcha
    {
        return new TurnstileCaptcha();
    }

    public function getDefaultDriver()
    {
        return config('captcha.driver');
    }
}
