<?php

declare(strict_types=1);

namespace Rahul900day\Captcha\Drivers;

use Illuminate\Support\Facades\Http;
use Rahul900day\Captcha\Contracts\Captcha;

class HCaptcha implements Captcha
{
    public const VERIFY_URL = 'https://hcaptcha.com/siteverify';

    public function verify(string $token): bool
    {
        $captcha_resp = Http::asForm()->post(self::VERIFY_URL, [
            'response' => $token,
            'secret' => config('captcha.secret'),
            'remoteip' => request()->ip(),
        ])->json();

        return (bool) collect($captcha_resp)->get('success');
    }

    public function getResponseName(): string
    {
        return 'h-captcha-response';
    }

    public function getContainerClassName(): string
    {
        return 'h-captcha';
    }

    public function getJs(?string $hl = null): string
    {
        $hl ??= config('captcha.locale', 'en');

        return '<script src="https://js.hcaptcha.com/1/api.js?hl='.$hl.'" async defer></script>';
    }
}
