<?php

declare(strict_types=1);

namespace Rahul900day\Captcha\Views\Components;

use Illuminate\View\Component;
use Rahul900day\Captcha\Facades\Captcha;

class Js extends Component
{
    public ?string $lang;

    public function __construct(?string $lang = null)
    {
        $this->lang = $lang;
    }

    public function render(): string
    {
        return Captcha::getJs($this->lang);
    }
}
