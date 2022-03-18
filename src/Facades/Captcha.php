<?php

namespace Rahul900day\Captcha\Facades;

use Illuminate\Support\Facades\Facade;
use Rahul900day\Captcha\Contracts\Captcha as CaptchaContract;
use Rahul900day\Captcha\Drivers\FakeCaptcha;

/**
 * @method static bool verify(string $token)
 * @method static string getJs(null|string $hl = null)
 * @method static string getContainer(null|string $theme = null, null|string $size = null)
 * @method static string getResponseName()
 *
 * @see \Rahul900day\Captcha\Contracts\Captcha
 */
class Captcha extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return CaptchaContract::class;
    }

    /**
     * Register a fake captcha service in request.
     *
     * @return void
     */
    public static function fake()
    {
        self::swap(new FakeCaptcha());
    }
}
