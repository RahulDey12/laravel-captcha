<?php

declare(strict_types=1);

namespace Rahul900day\Captcha\Drivers;

use Illuminate\Support\Facades\Http;
use Rahul900day\Captcha\Contracts\Captcha;

class HCaptcha implements Captcha
{
    /**
     * The url to verify the captcha response.
     *
     * @var string
     */
    public const VERIFY_URL = 'https://hcaptcha.com/siteverify';

    /**
     * Verify the captcha response.
     */
    public function verify(string $token): bool
    {
        $captcha_resp = Http::asForm()->post(self::VERIFY_URL, [
            'response' => $token,
            'secret' => config('captcha.secret'),
            'remoteip' => request()->ip(),
        ])->json();

        return (bool) collect($captcha_resp)->get('success');
    }

    /**
     * Returns the name of captcha service input.
     */
    public function getResponseName(): string
    {
        return 'h-captcha-response';
    }

    public function getContainerClassName(): string
    {
        return 'h-captcha';
    }

    /**
     * Get javascript for captcha service.
     */
    public function getJs(?string $hl = null): string
    {
        $hl ??= config('captcha.locale', 'en');

        return '<script src="https://js.hcaptcha.com/1/api.js?hl='.$hl.'" async defer></script>';
    }

    /**
     * Get captcha checkbox container.
     */
    public function getContainer(?string $theme, ?string $size): string
    {
        $site_key = config('captcha.sitekey', '');
        $theme ??= config('captcha.theme', 'light');
        $size ??= config('captcha.size', 'normal');

        return '<div class="h-captcha" data-sitekey="'.$site_key.'" data-theme="'.$theme.'" data-size="'.$size.'"></div>';
    }
}
