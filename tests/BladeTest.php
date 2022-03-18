<?php

use Illuminate\Support\Facades\Artisan;
use Rahul900day\Captcha\Facades\Captcha;

it('can give captcha javascript', function () {
    Captcha::shouldReceive('getJs')
                ->once()
                ->withNoArgs()
                ->andReturn('<script src="test_captcha.js?hl=en"></script>');

    expect(renderView('captcha_js'))->toBe('<script src="test_captcha.js?hl=en"></script>');
});

it('can give captcha container', function () {
    Captcha::shouldReceive('getContainer')
                ->twice()
                ->withAnyArgs()
                ->andReturn('<div></div>');

    $rendered_output = <<<'HTML'
    <div></div>
    <div></div>
    HTML;

    expect(renderView('captcha_container'))->toBe($rendered_output);
});

function renderView($view, $parameters = [])
{
    Artisan::call('view:clear');

    if (is_string($view)) {
        $view = view($view)->with($parameters);
    }

    return trim((string) ($view));
}
