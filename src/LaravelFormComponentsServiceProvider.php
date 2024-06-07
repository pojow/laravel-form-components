<?php

namespace Pojow\LaravelFormComponents;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class LaravelFormComponentsServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'form-components');
        $this->publishes([
            __DIR__ . '/../config/form-components.php' => config_path('form-components.php'),
        ], 'form-components:config');
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/form-components'),
        ], 'form-components:views');
        $this->declareComponents();
        $this->declareBladeDirectives();
    }

    protected function declareComponents(): void
    {
        Blade::componentNamespace('Pojow\\LaravelFormComponents\\Components', 'form');
    }

    protected function declareBladeDirectives(): void
    {
        Blade::directive('bind', function ($dataBatch) {
            return '<?php app(Pojow\LaravelFormComponents\FormBinder::class)->bindNewDataBatch(' . $dataBatch . ') ?>';
        });
        Blade::directive('endbind', function () {
            return '<?php app(Pojow\LaravelFormComponents\FormBinder::class)->unbindLastDataBatch() ?>';
        });
        Blade::directive('errorbag', function ($errorBagKey) {
            return '<?php app(Pojow\LaravelFormComponents\FormBinder::class)->bindErrorBag(' . $errorBagKey . ') ?>';
        });
        Blade::directive('enderrorbag', function () {
            return '<?php app(Pojow\LaravelFormComponents\FormBinder::class)->unbindErrorBag() ?>';
        });
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/form-components.php', 'form-components');
        $this->app->singleton(FormBinder::class, fn () => new FormBinder());
    }
}
