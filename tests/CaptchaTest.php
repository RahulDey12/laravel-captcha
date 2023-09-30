<?php

use Rahul900day\Captcha\Contracts\Captcha as CaptchaContract;
use Rahul900day\Captcha\Drivers\FakeCaptcha;
use Rahul900day\Captcha\Drivers\HCaptcha;
use Rahul900day\Captcha\Drivers\ReCaptcha;
use Rahul900day\Captcha\Drivers\TurnstileCaptcha;
use Rahul900day\Captcha\Exceptions\InvalidCaptchaDriverException;
use Rahul900day\Captcha\Facades\Captcha;
use Rahul900day\Captcha\Rules\Captcha as CaptchaRule;

it('can verify captcha', function () {
    Captcha::shouldReceive('verify')
        ->once()
        ->with('value')
        ->andReturn(true);

    (new CaptchaRule)->passes('test_captcha', 'value');
});

it('can give correct driver', function () {
    // Setting up HCaptcha Driver
    app()->forgetInstance(CaptchaContract::class);
    config()->set('captcha.driver', 'hCaptcha');
    expect(app(CaptchaContract::class)->driver())->toBeInstanceOf(HCaptcha::class);

    // Setting up ReCaptcha Driver
    app()->forgetInstance(CaptchaContract::class);
    config()->set('captcha.driver', 'reCaptcha');
    expect(app(CaptchaContract::class)->driver())->toBeInstanceOf(ReCaptcha::class);

    // Setting up Turnstile Driver
    app()->forgetInstance(CaptchaContract::class);
    config()->set('captcha.driver', 'turnstile');
    expect(app(CaptchaContract::class)->driver())->toBeInstanceOf(TurnstileCaptcha::class);
});

it('can throw error on incorrect driver', function () {
    $this->expectException(InvalidArgumentException::class);

    config()->set('captcha.driver', 'fakeDriver');
    app(CaptchaContract::class)->getJs();
});

it('can be faked', function () {
    Captcha::fake();

    expect(app(CaptchaContract::class))->toBeInstanceOf(FakeCaptcha::class);
    expect(Captcha::getFacadeRoot())->toBeInstanceOf(FakeCaptcha::class);
});
