<?php

use Illuminate\Support\Facades\Validator;
use Rahul900day\Captcha\Facades\Captcha;
use Rahul900day\Captcha\Rules\Captcha as CaptchaRule;

it('can be pass', function () {
    Captcha::fake();

    $validator = Validator::make([Captcha::getResponseName() => 'test_resp'], [
        Captcha::getResponseName() => [
            'required',
            new CaptchaRule(),
        ],
    ]);

    expect($validator->fails())->toBeFalse();
});

it('can be fail', function () {
    Captcha::fake(false);

    $validator = Validator::make([Captcha::getResponseName() => 'test_resp'], [
        Captcha::getResponseName() => [
            'required',
            new CaptchaRule(),
        ],
    ]);

    expect($validator->fails())->toBeTrue();

    $messages = $validator->messages();
    expect($messages->get(Captcha::getResponseName())[0])->toBe(CaptchaRule::$message);
});

it('can have custom error messages', function ($message) {
    Captcha::fake(false);
    CaptchaRule::$message = $message;

    $validator = Validator::make([Captcha::getResponseName() => 'test_resp'], [
        Captcha::getResponseName() => [
            'required',
            new CaptchaRule(),
        ],
    ]);

    $messages = $validator->messages();
    expect($messages->get(Captcha::getResponseName())[0])->toBe($message);
})->with([
    'Failed.',
    'Validation Failed.',
]);

it('can validate with alias', function () {
    Captcha::fake();

    $validator = Validator::make([Captcha::getResponseName() => 'test_resp'], [
        Captcha::getResponseName() => [
            'required',
            'captcha',
        ],
    ]);

    expect($validator->fails())->toBeFalse();
});
