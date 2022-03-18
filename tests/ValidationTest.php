<?php

use Illuminate\Support\Facades\Validator;
use Rahul900day\Captcha\Facades\Captcha;
use Rahul900day\Captcha\Rules\Captcha as CaptchaRule;

it('can validate', function () {
    Captcha::fake();

    $validator = Validator::make([Captcha::getResponseName() => 'test_resp'], [
        Captcha::getResponseName() => [
            'required',
            new CaptchaRule(),
        ]
    ]);

    expect($validator->fails())->toBeFalse();
});
