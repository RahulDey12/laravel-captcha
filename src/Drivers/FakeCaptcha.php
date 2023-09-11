<?php

namespace Rahul900day\Captcha\Drivers;

use Rahul900day\Captcha\Contracts\Captcha;

class FakeCaptcha implements Captcha
{
    /**
     * Verify the captcha response.
     */
    public function verify(string $token): bool
    {
        return true;
    }

    /**
     * Returns the name of captcha service input.
     */
    public function getResponseName(): string
    {
        return 'fake-response';
    }

    /**
     * Get javascript for captcha service.
     */
    public function getJs(string $hl): string
    {
        return '<script></script>';
    }

    /**
     * Get captcha checkbox container.
     */
    public function getContainer(string $theme = 'light', string $size = 'compact'): string
    {
        return "<input name='name' value='{$this->getResponseName()}' type='hidden'>";
    }
}
