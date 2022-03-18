<?php

namespace Rahul900day\Captcha\Contracts;

interface Captcha
{
    /**
     * Verify the captcha response.
     *
     * @param string $token
     * @return bool
     */
    public function verify(string $token);

    /**
     * Returns the name of captcha service input.
     *
     * @return string
     */
    public function getResponseName();

    /**
     * Get javascript for captcha service.
     *
     * @param null|string $hl
     * @return string
     */
    public function getJs(string $hl);

    /**
     * Get captcha checkbox container.
     *
     * @param null|string $theme
     * @param null|string $size
     * @return string
     */
    public function getContainer(string $theme, string $size);
}
