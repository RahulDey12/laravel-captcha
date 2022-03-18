<?php

namespace Rahul900day\Captcha\Drivers;

use Rahul900day\Captcha\Contracts\Captcha;

class FakeCaptcha implements Captcha
{
    /**
     * Verify the captcha response.
     *
     * @param string $token
     * @return bool
     */
    public function verify(string $token): bool
    {
        return true;
    }

    /**
     * Returns the name of captcha service input.
     *
     * @return string
     */
    public function getResponseName(): string
    {
        return 'fake-response';
    }

    /**
     * Get javascript for captcha service.
     *
     * @param string $hl
     * @return string
     */
    public function getJs(string $hl): string
    {
        return '<script></script>';
    }

    /**
     * Get captcha checkbox container.
     *
     * @param string $theme
     * @param string $size
     * @return string
     */
    public function getContainer(string $theme = 'light', string $size = 'compact'): string
    {
        return "<input name='name' value='{$this->getResponseName()}' type='hidden'>";
    }
}
