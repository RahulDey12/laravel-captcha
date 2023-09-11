<?php

declare(strict_types=1);

namespace Rahul900day\Captcha\Views\Components;

use Illuminate\View\Component;
use Rahul900day\Captcha\Facades\Captcha;

class Container extends Component
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
     * @var string|null
     */
    public $theme;

    /**
     * @var string|null
     */
    public $size;

    public function __construct(string $theme = null, string $size = null)
    {
        $this->sitekey = config('captcha.sitekey', '');
        $this->theme = $theme ?? config('captcha.theme', 'light');
        $this->size = $size ?? config('captcha.size', 'normal');
        $this->containerClass = Captcha::getContainerClassName();
    }

    public function render()
    {
        return view('captcha::components.container');
    }
}
