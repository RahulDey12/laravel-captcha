<?php

use Rahul900day\Captcha\Facades\Captcha;

beforeEach(function () {
    Captcha::fake();
});

it('can be succeed', function () {
    $res = Captcha::verify('test_success_token');

    expect($res)->toBeTrue();
});

it('can\'t be failed', function () {
    $res = Captcha::verify('test_fail_token');

    expect($res)->toBeTrue();
});

it('can give captcha class', function () {
    expect(Captcha::getContainerClassName())->toBe('fake-captcha-container');
});

it('can give fake captcha javascript', function () {
    $js_code = Captcha::getJs('fr');

    expect($js_code)->toBe('<script></script>');
})->skip();
