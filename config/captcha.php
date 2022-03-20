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

    /*
    |------------------------------------------------------------
    | Captcha Locale Configuration
    |------------------------------------------------------------
    |
    | The captcha locale determines the default locale of your
    | Captcha. You can add any locale value that supported
    | by your captcha provider.
    |
    | ReCaptcha Language List: https://developers.google.com/recaptcha/docs/language
    | HCaptcha Language List: https://docs.hcaptcha.com/languages
    |
    */
    'locale' => env('CAPTCHA_LOCALE', 'en'),

    /*
    |------------------------------------------------------------
    | Captcha Theme
    |------------------------------------------------------------
    |
    | The captcha theme is the default theme that will display
    | the captcha checkbox.
    |
    | Supported: "light", "dark"
    |
    */
    'theme' => env('CAPTCHA_THEME', 'light'),

    /*
    |------------------------------------------------------------
    | Captcha Size
    |------------------------------------------------------------
    |
    | The captcha size is the default size of the captcha
    | checkbox. According to your style preference you
    | can use any of the supported captcha size.
    |
    | Supported: "normal", "compact"
    |
    */
    'size' => env('CAPTCHA_SIZE', 'normal'),
];
