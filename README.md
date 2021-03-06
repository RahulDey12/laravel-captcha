<p align="center"><img src="/art/poster.png" alt="Poster Laravel Captcha"></p>

<h1 align="center">Laravel Captcha</h1>

<p align="center">
    <a href="https://styleci.io/repos/471343273"><img src="https://github.styleci.io/repos/471343273/shield" alt="StyleCI Status"></a>
    <a href="https://github.com/rahuldey12/laravel-captcha/actions"><img src="https://github.com/RahulDey12/laravel-captcha/workflows/run-tests/badge.svg" alt="Build Status"></a>
    <a href="https://packagist.org/packages/rahul900day/laravel-captcha"><img src="https://poser.pugx.org/rahul900day/laravel-captcha/version" alt="Version"></a>
    <a href="https://packagist.org/packages/rahul900day/laravel-captcha"><img src="https://poser.pugx.org/rahul900day/laravel-captcha/downloads" alt="Total Downloads"></a>
</p>

Laravel Captcha is a wrapper around HCaptcha & Google Recaptcha. It provides very easy-to-use Facade, Validation Rule, and blade directives.

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
CAPTCHA_DRIVER=hCaptcha
CAPTCHA_SITE_KEY="{Your Site Key}"
CAPTCHA_SECRET_KEY="{Your Site Secret}"
```
> **Don't know how to get the *Site Key* or *Site Secret* ?** <br>
> Read **[HCaptcha](https://docs.hcaptcha.com/configuration)** or **[ReCaptcha](https://developers.google.com/recaptcha/docs/display)** Docs.

## Configuration
Laravel Captcha supports very different customizations like theme, language, size. Just
add these configurations to your `.env` file to customize.

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

### Displaying Captcha

Laravel Captcha Provide two blade directives for importing required javascript and
displaying the captcha itself.

```blade
<head>
    @captcha_js
</head>
<body>
  <form action="" method="post">
      @captcha_container
  </form>
</body>
```
#### The `@captcha_js` Directive

The `@captcha_js` directive allows you to inject the javascript for captcha. You can 
also pass additional language parameter into it.

```blade
@captcha_js('fr')
```
> Read the **[HCaptcha](https://docs.hcaptcha.com/languages)** & **[ReCaptcha](https://developers.google.com/recaptcha/docs/language)** docs to get the full language code list.

#### The `@captcha_container` Directive

The `@captcha_container` directive provides the captcha checkbox for your form. it also accepts
two parameters `theme` & `size` respectively.

```blade
@captcha_container('light', 'compact')
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
