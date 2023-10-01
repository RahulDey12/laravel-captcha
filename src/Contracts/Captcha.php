<?php

declare(strict_types=1);

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
     */
    public function getJs(?string $hl): string;
}
