<p align="center"><img src="/art/poster.png" alt="Poster Laravel Captcha"></p>

<h1 align="center">Laravel Captcha</h1>

<p align="center">
    <a href="https://styleci.io/repos/471343273"><img src="https://github.styleci.io/repos/471343273/shield" alt="StyleCI Status"></a>
    <a href="https://github.com/rahuldey12/laravel-captcha/actions"><img src="https://github.com/RahulDey12/laravel-captcha/workflows/run-tests/badge.svg" alt="Build Status"></a>
    <a href="https://packagist.org/packages/rahul900day/laravel-captcha"><img src="https://poser.pugx.org/rahul900day/laravel-captcha/version" alt="Version"></a>
    <a href="https://packagist.org/packages/rahul900day/laravel-captcha"><img src="https://poser.pugx.org/rahul900day/laravel-captcha/downloads" alt="Total Downloads"></a>
</p>

Laravel Captcha is a wrapper around HCaptcha & Google Recaptcha. It provides very easy to use Facade, Validation Rule 
and blade directives.

## Installation
> **Requires [PHP 7.3+](https://php.net/releases/)**

Via [Composer](https://getcomposer.org):

```bash
composer require rahul900day/laravel-captcha
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="captcha-config"
```

This is the contents of the published config file:

```php
return [
    'driver' => env('CAPTCHA_DRIVER', 'hCaptcha'),

    'sitekey' => env('CAPTCHA_SITE_KEY', ''),

    'secret' => env('CAPTCHA_SECRET_KEY', ''),

    'locale' => env('CAPTCHA_LOCALE', 'en'),

    'theme' => env('CAPTCHA_THEME', 'light'),

    'size' => env('CAPTCHA_SIZE', 'normal'),
];
```

## Configuration

To get started with Laravel Captcha add this configuration bellow to your `.env` file.

```dotenv
CAPTCHA_DRIVER=hCaptcha
CAPTCHA_SITE_KEY="{Your Site Key}"
CAPTCHA_SECRET_KEY="{Your Site Secret}"
```
### Supported ENV Variables
| Variable           | Default    | Description                                                                                                                                                                                    |
|--------------------|------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| CAPTCHA_DRIVER     | `hCaptcha` | Default Captcha driver <br> Supported:`hCaptcha`, `reCaptcha`                                                                                                                                  |
| CAPTCHA_SITE_KEY   | `''`       | The Site Key. <br/> *HCaptcha Docs*: https://docs.hcaptcha.com/configuration <br/> *ReCaptcha Docs*: https://developers.google.com/recaptcha/docs/display                                      |
| CAPTCHA_SECRET_KEY | `''`       | The Site Secret. <br/> *HCaptcha Docs*: https://docs.hcaptcha.com/configuration <br/> *ReCaptcha Docs*: https://developers.google.com/recaptcha/docs/display                                   |
| CAPTCHA_LOCALE     | `en`       | The Captcha localization code. <br/> *HCaptcha Supported Codes*:  https://docs.hcaptcha.com/languages <br/> *Recaptcha Supported Codes*: https://developers.google.com/recaptcha/docs/language |
| CAPTCHA_THEME      | `light`    | The Captcha checkbox theme. <br/> Supported: `light`, `dark`                                                                                                                                   |
| CAPTCHA_SIZE       | `normal`   | The Captcha checkbox size. <br/> Supported: `normal`, `compact`                                                                                                                                |

> **Note:** Laravel Captcha Does not support *ReCaptcha V3*

## Usage

```php
use Rahul900day\Captcha\Facades\Captcha;
use Rahul900day\Captcha\Rules\Captcha as CaptchaRule;
use Illuminate\Support\Facades\Validator;

Validator::make($request, [
   Captcha::getResponseName() => new CaptchaRule() 
]);

```

## Testing

```bash
composer test
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
