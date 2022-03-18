<?php

return [

    /*
     |------------------------------------------------------------
     | Default Captcha Driver
     |------------------------------------------------------------
     |
     | Here you may define the default captcha driver for your
     | application. By default, we will use HCaptcha driver,
     | but you may specify other drivers provided here.
     |
     | Supported: "hCaptcha", "reCaptcha"
     |
     */
    'driver' => env('CAPTCHA_DRIVER', 'hCaptcha'),

    /*
    |------------------------------------------------------------
    | Captcha Site Key
    |------------------------------------------------------------
    |
    | The site key is used for showing the captcha in the front
    | end. You will get your site key from your preferred
    | vendor like "ReCaptcha" or "HCaptcha".
    |
    | ReCaptcha Docs: https://developers.google.com/recaptcha/docs/display
    | HCaptcha Docs: https://docs.hcaptcha.com/configuration
    |
    */
    'sitekey' => env('CAPTCHA_SITE_KEY', ''),

    /*
    |------------------------------------------------------------
    | Captcha Secret Key
    |------------------------------------------------------------
    |
    | The site key is used for validating the captcha responses.
    | You will get you secret key from your preferred vendor
    | like "ReCaptcha" or "HCaptcha".
    |
    | ReCaptcha Docs: https://developers.google.com/recaptcha/docs/display
    | HCaptcha Docs: https://docs.hcaptcha.com/configuration
    |
    */
    'secret' => env('CAPTCHA_SECRET_KEY', ''),

    'locale' => env('CAPTCHA_LOCALE', 'en'),

    'theme' => env('CAPTCHA_THEME', 'light'),

    'size' => env('CAPTCHA_SIZE', 'normal'),
];
