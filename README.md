<p align="center"><img src="/art/poster.png" alt="Poster Laravel Captcha"></p>

<h1 align="center">Laravel Captcha</h1>

<p align="center">
    <a href="https://styleci.io/repos/471343273"><img src="https://github.styleci.io/repos/471343273/shield" alt="StyleCI Status"></a>
    <a href="https://github.com/rahuldey12/laravel-captcha/actions"><img src="https://github.com/RahulDey12/laravel-captcha/workflows/run-tests/badge.svg" alt="Build Status"></a>
    <a href="https://packagist.org/packages/rahul900day/laravel-captcha"><img src="https://poser.pugx.org/rahul900day/laravel-captcha/version" alt="Version"></a>
    <a href="https://packagist.org/packages/rahul900day/laravel-captcha"><img src="https://poser.pugx.org/rahul900day/laravel-captcha/downloads" alt="Total Downloads"></a>
</p>

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

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

## Usage

```php

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
