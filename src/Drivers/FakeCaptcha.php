<?php

namespace Rahul900day\Captcha\Drivers;

use Rahul900day\Captcha\Contracts\Captcha;

class FakeCaptcha implements Captcha
{
    public function verify(string $token): bool
    {
        return true;
    }

    public function getResponseName(): string
    {
        return 'fake-response';
    }

    public function getContainerClassName(): string
    {
        return '';
    }

    public function getJs(string $hl): string
    {
        return '<script></script>';
    }

    public function getContainer(string $theme = 'light', string $size = 'compact'): string
    {
        return "<input name='{$this->getResponseName()}' value='pass' type='hidden'>";
    }
}
