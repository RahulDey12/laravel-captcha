<?php

namespace Rahul900day\Captcha\Contracts;

interface Captcha
{
    /**
     * Verify the captcha response.
     */
    public function verify(string $token): bool;

    /**
     * Returns the name of captcha service input.
     */
    public function getResponseName(): string;

    /**
     * Returns the name of captcha container class.
     */
    public function getContainerClassName(): string;

    /**
     * Get javascript for captcha service.
     *
     * @param  null|string  $hl
     */
    public function getJs(string $hl): string;

    /**
     * Get captcha checkbox container.
     *
     * @param  null|string  $theme
     * @param  null|string  $size
     */
    public function getContainer(string $theme, string $size): string;
}
