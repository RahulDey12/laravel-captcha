<?php

declare(strict_types=1);

namespace Rahul900day\Captcha\Views\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\View\View;
use Rahul900day\Captcha\Facades\Captcha;

class Button extends Component
{
    public string $containerClass;

    public string $site_key;

    public string $callback;

    public bool $has_custom_callback;

    public string $nonce;

    public function __construct(public string $formId, string $callback = null)
    {
        $this->site_key = config('captcha.sitekey', '');
        $this->containerClass = Captcha::getContainerClassName();
        $this->nonce = Str::random(10);
        $this->callback = $callback ?? "onCaptchaSubmit_{$this->nonce}";
        $this->has_custom_callback = (bool) $callback;
    }

    public function render(): View
    {
        return view('captcha::components.button');
    }
}
