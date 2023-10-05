<?php

declare(strict_types=1);

namespace Rahul900day\Captcha\Drivers;

use Rahul900day\Captcha\Contracts\Captcha;

class FakeCaptcha implements Captcha
{
    public function __construct(protected bool $verify = true)
    {
    }

    public function verify(string $token): bool
    {
        return $this->verify;
    }

    public function getResponseName(): string
    {
        return 'fake-response';
    }

    public function getContainerClassName(): string
    {
        return 'fake-captcha-container';
    }

    public function getJs(?string $hl): string
    {
        return <<<HTML
            <script defer async>
                window.addEventListener('load', () => {
                    const container = document.querySelector('.{$this->getContainerClassName()}');
                    const input = document.createElement('input');
                    input.setAttribute('type', 'hidden');
                    input.setAttribute('name', '{$this->getResponseName()}')
                    input.setAttribute('value', 'pass')
                    container.parentElement.appendChild(input)
                })
            </script>
        HTML;
    }
}
