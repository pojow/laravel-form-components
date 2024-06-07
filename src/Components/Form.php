<?php

namespace Pojow\LaravelFormComponents\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Pojow\LaravelFormComponents\FormBinder;

class Form extends Component
{
    public function __construct(
        public string $method = 'GET',
        public array|object|null $bind = null,
        public string|null $errorBag = null,
    ) {
        if ($bind) {
            app(FormBinder::class)->bindNewDataBatch($bind);
        }
        if ($errorBag) {
            app(FormBinder::class)->bindErrorBag($errorBag);
        }
        $this->method = mb_strtoupper($method);
    }

    public function render(): View
    {
        return view('form-components::form');
    }
}
