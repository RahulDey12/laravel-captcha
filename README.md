<p align="center"><img src="/art/poster.png" alt="Poster Laravel Captcha"></p>

<h1 align="center">Laravel Captcha</h1>

<p align="center">
    <a href="https://styleci.io/repos/471343273"><img src="https://github.styleci.io/repos/471343273/shield" alt="StyleCI Status"></a>
    <a href="https://github.com/rahuldey12/laravel-captcha/actions"><img src="https://github.com/RahulDey12/laravel-captcha/workflows/run-tests/badge.svg" alt="Build Status"></a>
    <a href="https://packagist.org/packages/rahul900day/laravel-captcha"><img src="https://poser.pugx.org/rahul900day/laravel-captcha/version" alt="Version"></a>
    <a href="https://packagist.org/packages/rahul900day/laravel-captcha"><img src="https://poser.pugx.org/rahul900day/laravel-captcha/downloads" alt="Total Downloads"></a>
</p>

Laravel Captcha is a wrapper around Turnstile, HCaptcha & Google Recaptcha. It provides very easy-to-use Facade, Validation Rule, and blade directives.

## Installation
> **Requires [PHP 7.3+](https://php.net/releases/)**

1. Install via  [Composer](https://getcomposer.org):

```bash
composer require rahul900day/laravel-captcha
```

2. Publish the config file with:

```bash
php artisan vendor:publish --tag="captcha-config"
```

3. Add required configuration to `.env` file:

```dotenv
CAPTCHA_DRIVER=turnstile
CAPTCHA_SITE_KEY="{Your Site Key}"
CAPTCHA_SECRET_KEY="{Your Site Secret}"
```
> **Don't know how to get the *Site Key* or *Site Secret* ?** <br>
> Read **[Turnstile](https://developers.cloudflare.com/turnstile/get-started/client-side-rendering/#configurations)** or **[HCaptcha](https://docs.hcaptcha.com/configuration)** or **[ReCaptcha](https://developers.google.com/recaptcha/docs/display)** Docs.

## Configuration
Laravel Captcha supports very different customizations like theme, language, size. Just
add these configurations to your `.env` file to customize.

### Supported ENV Variables
| Variable           | Default     | Description                                                                                                                                                                                                                                                                                                                                                                                                                                                                     |
|--------------------|-------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| CAPTCHA_DRIVER     | `turnstile` | Default Captcha driver <br> Supported:`turnstile`, `hCaptcha`, `reCaptcha`                                                                                                                                                                                                                                                                                                                                                                                                      |
| CAPTCHA_SITE_KEY   | `''`        | The Site Key. <br/> *Turnstile Docs*: https://developers.cloudflare.com/turnstile/get-started/client-side-rendering/#configurations <br/> *HCaptcha Docs*: https://docs.hcaptcha.com/configuration <br/> *ReCaptcha Docs*: https://developers.google.com/recaptcha/docs/display                                                                                                                                                                                                 |
| CAPTCHA_SECRET_KEY | `''`        | The Site Secret. <br/> *Turnstile Docs*: https://developers.cloudflare.com/turnstile/get-started/client-side-rendering/#configurations <br/> *HCaptcha Docs*: https://docs.hcaptcha.com/configuration <br/> *ReCaptcha Docs*: https://developers.google.com/recaptcha/docs/display                                                                                                                                                                                              |
| CAPTCHA_LOCALE     | `en`        | The Captcha localization code. <br/> *HCaptcha Supported Codes*:  https://docs.hcaptcha.com/languages <br/> *Recaptcha Supported Codes*: https://developers.google.com/recaptcha/docs/language <br/> <br/> You cannot use default localization with **Turnstile** you need to use it with the captch container <br/> `<x-captcha-container data-language="es" />` <br/> *Turnstile Supported Codes:* https://developers.cloudflare.com/turnstile/reference/supported-languages/ |
| CAPTCHA_THEME      | `light`     | The Captcha checkbox theme. <br/> Supported: `light`, `dark`                                                                                                                                                                                                                                                                                                                                                                                                                    |
| CAPTCHA_SIZE       | `normal`    | The Captcha checkbox size. <br/> Supported: `normal`, `compact`                                                                                                                                                                                                                                                                                                                                                                                                                 |

> **Note:** Laravel Captcha Does not support *ReCaptcha V3*

## Usage

### Displaying Captcha

Laravel Captcha Provides laravel components to working with the captcha

```blade
<head>
    <x-captcha-js />
</head>
<body>
  <form action="" method="post">
      <x-captcha-container />
  </form>
</body>
```
#### The `<x-captcha-js />` Component

The `<x-captcha-js />` component allows you to inject the javascript for captcha. You can 
also pass additional language attribute into it.

```blade
<x-captcha-js lang="fr" />
```
> Read the **[HCaptcha](https://docs.hcaptcha.com/languages)** & **[ReCaptcha](https://developers.google.com/recaptcha/docs/language)** docs to get the full language code list. 
> 
> Turnstile has no localization support with javascript.

#### The `<x-captcha-container />` Component

The `<x-captcha-container />` component provides the captcha checkbox for your form. as it's a laravel component so you
can add any supported captcha container attribute to it.

```blade
<x-captcha-container data-theme="dark" data-size="compact" data-language="es" />
```

### Validation of Captcha

Laravel Captcha provides a very beautiful API to deal with captcha validation. In your
`Controller` or `FormRequest` you can just add this code to validate the captcha.

```php
use Rahul900day\Captcha\Facades\Captcha;
use Rahul900day\Captcha\Rules\Captcha as CaptchaRule;
use Illuminate\Support\Facades\Validator;

Validator::make($request, [
   Captcha::getResponseName() => [
       'required', 
        new CaptchaRule(),
   ],
]);
```

## Testing

With Laravel Captcha you can write tests very easily. The `Captcha` facade's `fake` method
allows you to fake the Captcha Validation for the current request.

```php
use Rahul900day\Captcha\Facades\Captcha;
use Rahul900day\Captcha\Rules\Captcha as CaptchaRule;
use Illuminate\Support\Facades\Validator;

Captcha::fake();

// If $request is an actual request or a request array
$validation = Validator::make($request, [
   Captcha::getResponseName() => [
       'required', 
        new CaptchaRule(),
   ],
]);

$this->assertTrue(! $validation->fails()) // This is always going to pass.
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Rahul Dey](https://github.com/RahulDey12)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
