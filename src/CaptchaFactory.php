<?php

namespace Rahul900day\Captcha;

use Rahul900day\Captcha\Contracts\Captcha;
use Rahul900day\Captcha\Drivers\HCaptcha;
use Rahul900day\Captcha\Drivers\ReCaptcha;
use Rahul900day\Captcha\Exceptions\InvalidCaptchaDriverException;

class CaptchaFactory
{
    /**
     * The captcha configurations.
     *
     * @var array
     */
    protected $config;

    /**
     * Create a new captcha factory instance.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * Make a captcha service based on the configuration.
     *
     * @return \Rahul900day\Captcha\Contracts\Captcha
     * @throws \Rahul900day\Captcha\Exceptions\InvalidCaptchaDriverException
     */
    public function make(): Captcha
    {
        $driver = $this->config['driver'];

        switch ($driver) {
            case 'hCaptcha':
                return new HCaptcha();
            case 'reCaptcha':
                return new ReCaptcha();
            default:
                throw new InvalidCaptchaDriverException($driver);
        }
    }
}
