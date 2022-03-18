<?php

namespace Rahul900day\Captcha;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Rahul900day\Captcha\Contracts\Captcha as CaptchaContract;

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

        $this->app->singleton(CaptchaContract::class, function($app) {
            return (new CaptchaFactory(config('captcha')))->make();
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
        ]);

        $this->registerBladeExtensions();
    }

    public function registerBladeExtensions()
    {
        Blade::directive('captcha_js', function ($arguments) {
            list($hl) = explode(',', $arguments);

            return "<?php echo \Rahul900day\Captcha\Facades\Captcha::getJs($hl) ?>";
        });

        Blade::directive('captcha_container', function ($arguments) {
            list($theme, $size) = explode(',', $arguments.',');

            if($arguments === '') {
                return "<?php echo \Rahul900day\Captcha\Facades\Captcha::getContainer() ?>";
            }

            return "<?php echo \Rahul900day\Captcha\Facades\Captcha::getContainer($theme, $size) ?>";
        });
    }
}
