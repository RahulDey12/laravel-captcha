<?php

use Illuminate\Support\Facades\Artisan;
use Rahul900day\Captcha\Facades\Captcha;

it('can give captcha javascript', function () {
    Captcha::shouldReceive('getJs')
        ->once()
        ->withAnyArgs()
        ->andReturn('<script src="test_captcha.js?hl=es"></script>');

    expect(renderView('captcha_js'))->toBe('<script src="test_captcha.js?hl=es"></script>');
});

it('can give captcha container', function () {
    Captcha::shouldReceive('getContainerClassName')
        ->twice()
        ->withAnyArgs()
        ->andReturn('demo-container');

    expect(renderView('captcha_container'))
        ->toContain('<div class="demo-container" data-theme="light" data-size="normal" data-sitekey=""></div>')
        ->toContain('<div class="demo-container" data-theme="dark" data-size="compact" data-sitekey="" id="test"></div>');
});

function renderView($view, $parameters = [])
{
    Artisan::call('view:clear');

    if (is_string($view)) {
        $view = view($view)->with($parameters);
    }

    return trim((string) $view);
}
