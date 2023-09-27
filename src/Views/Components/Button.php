<?php

namespace Rahul900day\Captcha\Views\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\View\View;
use Rahul900day\Captcha\Facades\Captcha;

class Button extends Component
{
    /**
     * @var string
     */
    public $containerClass;

    /**
     * @var string
     */
    public $sitekey;

    /**
     * @var string
     */
    public $formId;

    /**
     * @var string
     */
    public $callback;

    /**
     * @var bool
     */
    public $has_custom_callback;

    /**
     * @var string
     */
    public $nonce;

    public function __construct(string $formId, string $callback = null)
    {
        $this->sitekey = config('captcha.sitekey', '');
        $this->containerClass = Captcha::getContainerClassName();
        $this->formId = $formId;
        $this->nonce = Str::random(10);
        $this->callback = $callback ?? "onCaptchaSubmit_{$this->nonce}";
        $this->has_custom_callback = boolval($callback);
    }

    public function render(): View
    {
        return view('captcha::components.button');
    }
}
