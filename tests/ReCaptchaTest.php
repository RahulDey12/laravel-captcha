<?php

use Illuminate\Support\Facades\Http;
use Rahul900day\Captcha\Facades\Captcha;

beforeEach(function () {
    config()->set('captcha.driver', 'reCaptcha');
    config()->set('captcha.sitekey', 'test_site_key');
    config()->set('captcha.secret', 'test_site_secret');

    $this->captchaUrl = 'https://www.google.com/recaptcha/api/siteverify';
});

it('can be succeed', function () {
    Http::fake([
        $this->captchaUrl => Http::response(['success' => true], 200),
    ]);

    $res = Captcha::verify('test_success_token');

    expect($res)->toBeTrue();
});

it('can be failed', function () {
    Http::fake([
        $this->captchaUrl => Http::response(['success' => false], 200),
    ]);

    $res = Captcha::verify('test_fail_token');

    expect($res)->toBeFalse();
});

it('has correct response name', function () {
    expect(Captcha::getResponseName())->toBe('g-recaptcha-response');
});

it('can give captcha class', function () {
    expect(Captcha::getContainerClassName())->toBe('g-recaptcha');
});

it('can give captcha javascript', function ($hl, $expect) {
    $js_code = Captcha::getJs($hl);

    expect($js_code)->toContain($expect);
})->with([
    ['fr', '<script src="https://www.google.com/recaptcha/api.js?hl=fr" async defer></script>'],
    ['en', '<script src="https://www.google.com/recaptcha/api.js?hl=en" async defer></script>'],
    ['en-GB', '<script src="https://www.google.com/recaptcha/api.js?hl=en-GB" async defer></script>'],
]);
