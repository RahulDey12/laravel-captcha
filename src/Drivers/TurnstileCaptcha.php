<?php

namespace Rahul900day\Captcha\Drivers;

use Illuminate\Support\Facades\Http;
use Rahul900day\Captcha\Contracts\Captcha;

class TurnstileCaptcha implements Captcha
{
    /**
     * The url to verify the captcha response.
     *
     * @var string
     */
    const VERIFY_URL = 'https://challenges.cloudflare.com/turnstile/v0/siteverify';

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
        return 'cf-turnstile-response';
    }

    /**
     * Get javascript for captcha service.
     */
    public function getJs(string $hl = null): string
    {
        // $hl = $hl ?? config('captcha.locale', 'en');
        // Language is currently not supported to Turnstile

        return '<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>';
    }

    /**
     * Get captcha checkbox container.
     */
    public function getContainer(string $theme = null, string $size = null): string
    {
        $site_key = config('captcha.sitekey', '');
        $theme = $theme ?? config('captcha.theme', 'light');
        $size = $size ?? config('captcha.size', 'normal');

        return '<div class="cf-turnstile" data-sitekey="'.$site_key.'" data-theme="'.$theme.'" data-size="'.$size.'"></div>';
    }
}
