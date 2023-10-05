<?php

declare(strict_types=1);

namespace Rahul900day\Captcha\Contracts;

interface Captcha
{
    public function verify(string $token): bool;

    public function getResponseName(): string;

    public function getContainerClassName(): string;

    public function getJs(?string $hl): string;
}
