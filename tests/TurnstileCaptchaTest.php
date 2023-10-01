<?php

use Illuminate\Support\Facades\Http;
use Rahul900day\Captcha\Facades\Captcha;

beforeEach(function () {
    config()->set('captcha.driver', 'turnstile');
    config()->set('captcha.sitekey', 'test_site_key');
    config()->set('captcha.secret', 'test_site_secret');

    $this->captchaUrl = 'https://challenges.cloudflare.com/turnstile/v0/siteverify';
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
    expect(Captcha::getResponseName())->toBe('cf-turnstile-response');
});

it('can give captcha class', function () {
    expect(Captcha::getContainerClassName())->toBe('cf-turnstile');
});

it('can give captcha javascript', function () {
    $js_code = Captcha::getJs();

    expect($js_code)->toBe('<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>');
});
