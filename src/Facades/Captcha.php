<?php

declare(strict_types=1);

namespace Rahul900day\Captcha\Facades;

use Illuminate\Support\Facades\Facade;
use Rahul900day\Captcha\Contracts\Captcha as CaptchaContract;
use Rahul900day\Captcha\Drivers\FakeCaptcha;

/**
 * @method static bool verify(string $token)
 * @method static string getJs(null|string $hl = null)
 * @method static string getResponseName()
 * @method static string getContainerClassName()
 *
 * @see \Rahul900day\Captcha\Contracts\Captcha
 */
class Captcha extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return CaptchaContract::class;
    }

    public static function fake(bool $result = true): void
    {
        self::swap(new FakeCaptcha($result));
    }
}
