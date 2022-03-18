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

it('can give fake captcha javascript', function () {
    $js_code = Captcha::getJs('fr');

    expect($js_code)->toBe('<script></script>');
});

it('can give fake captcha container', function () {
    $container_code = Captcha::getContainer('dark', 'compact');
    $name_attr = Captcha::getResponseName();

    expect($container_code)->toBe("<input name='name' value='{$name_attr}' type='hidden'>");
});
