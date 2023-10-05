<?php

use Rahul900day\Captcha\Facades\Captcha;

it('can be succeed', function () {
    Captcha::fake();
    $res = Captcha::verify('test_success_token');

    expect($res)->toBeTrue();
});

it('can be failed', function () {
    Captcha::fake(false);
    $res = Captcha::verify('test_fail_token');

    expect($res)->not->toBeTrue();
});

it('can give captcha class', function () {
    Captcha::fake();
    expect(Captcha::getContainerClassName())->toBe('fake-captcha-container');
});

it('can give fake captcha javascript', function () {
    Captcha::fake();
    $js_code = Captcha::getJs('fr');

    expect($js_code)->toMatchSnapshot();
});
