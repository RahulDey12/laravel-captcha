<p align="center"><img src="/art/poster.png" alt="Poster Laravel Captcha"></p>

<h1 align="center">Laravel Captcha</h1>

<p align="center">
    <a href="https://styleci.io/repos/471343273"><img src="https://github.styleci.io/repos/471343273/shield" alt="StyleCI Status"></a>
    <a href="https://github.com/rahuldey12/laravel-captcha/actions"><img src="https://github.com/RahulDey12/laravel-captcha/workflows/run-tests/badge.svg" alt="Build Status"></a>
    <a href="https://packagist.org/packages/rahul900day/laravel-captcha"><img src="https://poser.pugx.org/rahul900day/laravel-captcha/version" alt="Version"></a>
    <a href="https://packagist.org/packages/rahul900day/laravel-captcha"><img src="https://poser.pugx.org/rahul900day/laravel-captcha/downloads" alt="Total Downloads"></a>
</p>

Laravel Captcha is a wrapper around Turnstile, HCaptcha & Google Recaptcha. It provides very easy-to-use Facade, Validation Rule, and laravel components.

> **Requires [PHP 8.0+](https://php.net/releases/)**

## Quick Start

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

4. Display the Captcha

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

Please read the full documentation on https://laravel-captcha.rahuldey.dev/

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Rahul Dey](https://github.com/RahulDey12)
- [All Contributors](../../contributors)

## Sponsors

- [Pricop Alexandru](https://twitter.com/PricopX)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
