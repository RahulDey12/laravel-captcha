<?php

namespace Rahul900day\Captcha;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Rahul900day\Captcha\Contracts\Captcha as CaptchaContract;
use Rahul900day\Captcha\Rules\Captcha;
use Rahul900day\Captcha\Views\Components\Button;
use Rahul900day\Captcha\Views\Components\Container;
use Rahul900day\Captcha\Views\Components\Js;

class CaptchaServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/captcha.php', 'captcha'
        );

        $this->app->singleton(CaptchaContract::class, function ($app) {
            return new CaptchaManager($app);
        });
    }

    /**
     * Bootstraps any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/captcha.php' => config_path('captcha.php'),
        ], 'captcha-config');

        $this->bootResources();
        $this->bootBladeComponents();
        $this->bootValidations();
    }

    protected function bootResources(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'captcha');
    }

    protected function bootBladeComponents(): void
    {
        $this->callAfterResolving(BladeCompiler::class, function (BladeCompiler $blade) {
            $blade->component(Js::class, 'js', 'captcha');
            $blade->component(Container::class, 'container', 'captcha');
            $blade->component(Button::class, 'button', 'captcha');
        });
    }

    protected function bootValidations(): void
    {
        Validator::extend('captcha', Captcha::class.'@passes', __(Captcha::MESSAGE));
    }
}
