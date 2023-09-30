<?php

declare(strict_types=1);

namespace Rahul900day\Captcha\Views\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Rahul900day\Captcha\Facades\Captcha;

class Container extends Component
{
    public string $containerClass;

    public string $sitekey;

    public ?string $theme;

    public ?string $size;

    public function __construct(string $theme = null, string $size = null)
    {
        $this->sitekey = config('captcha.sitekey', '');
        $this->theme = $theme ?? config('captcha.theme', 'light');
        $this->size = $size ?? config('captcha.size', 'normal');
        $this->containerClass = Captcha::getContainerClassName();
    }

    public function render(): View
    {
        return view('captcha::components.container');
    }
}
