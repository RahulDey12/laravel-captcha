<?php

namespace Rahul900day\Captcha\Drivers;

use Illuminate\Support\Facades\Http;
use Rahul900day\Captcha\Contracts\Captcha;

class ReCaptcha implements Captcha
{
    /**
     * The url to verify the captcha response.
     *
     * @var string
     */
    const VERIFY_URL = 'https://www.google.com/recaptcha/api/siteverify';

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
        return 'g-recaptcha-response';
    }

    public function getContainerClassName(): string
    {
        return 'g-recaptcha';
    }

    /**
     * Get javascript for captcha service.
     */
    public function getJs(string $hl = null): string
    {
        $hl = $hl ?? config('captcha.locale', 'en');

        return '<script src="https://www.google.com/recaptcha/api.js?hl='.$hl.'" async defer></script>';
    }

    /**
     * Get captcha checkbox container.
     */
    public function getContainer(string $theme = null, string $size = null): string
    {
        $site_key = config('captcha.sitekey', '');
        $theme = $theme ?? config('captcha.theme', 'light');
        $size = $size ?? config('captcha.size', 'normal');

        return '<div class="g-recaptcha" data-sitekey="'.$site_key.'" data-theme="'.$theme.'" data-size="'.$size.'"></div>';
    }
}
