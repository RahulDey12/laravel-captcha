<?php

declare(strict_types=1);

namespace Rahul900day\Captcha\Views\Components;

use Illuminate\View\Component;
use Rahul900day\Captcha\Facades\Captcha;

class Js extends Component
{
    public function __construct(public ?string $lang = null)
    {
    }

    public function render(): string
    {
        return Captcha::getJs($this->lang);
    }
}
