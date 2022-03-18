<?php

namespace Rahul900day\Captcha\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Rahul900day\Captcha\CaptchaServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            CaptchaServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('view.paths', [__DIR__.'/resources/views']);
    }
}
