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
     *
     * @param string $token
     * @return bool
     */
    public function verify(string $token)
    {
        $captcha_resp = Http::asForm()->post(self::VERIFY_URL, [
            'response' => $token,
            'secret' => config('captcha.secret'),
            'remoteip' => request()->ip(),
        ])->collect();

        return (bool) $captcha_resp->get('success');
    }

    /**
     * Returns the name of captcha service input.
     *
     * @return string
     */
    public function getResponseName()
    {
        return 'g-recaptcha-response';
    }

    /**
     * Get javascript for captcha service.
     *
     * @param null|string $hl
     * @return string
     */
    public function getJs(string $hl = null)
    {
        $hl = $hl ?? config('captcha.locale', 'en');

        return '<script src="https://www.google.com/recaptcha/api.js?hl='.$hl.'" async defer></script>';
    }

    /**
     * Get captcha checkbox container.
     *
     * @param null|string $theme
     * @param null|string $size
     * @return string
     */
    public function getContainer(string $theme = null, string $size = null)
    {
        $site_key = config('captcha.sitekey', '');
        $theme = $theme ?? config('captcha.theme', 'light');
        $size = $size ?? config('captcha.size', 'normal');

        return '<div class="g-recaptcha" data-sitekey="'.$site_key.'" data-theme="'.$theme.'" data-size="'.$size.'"></div>';
    }
}
