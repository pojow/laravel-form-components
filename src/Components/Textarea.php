<?php

namespace Pojow\LaravelFormComponents\Components;

use Closure;
use Pojow\LaravelFormComponents\Components\Abstracts\AbstractComponent;
use Pojow\LaravelFormComponents\Components\Traits\HasAddon;
use Pojow\LaravelFormComponents\Components\Traits\HasFloatingLabel;
use Pojow\LaravelFormComponents\Components\Traits\HasId;
use Pojow\LaravelFormComponents\Components\Traits\HasLabel;
use Pojow\LaravelFormComponents\Components\Traits\HasName;
use Pojow\LaravelFormComponents\Components\Traits\HasPlaceholder;
use Pojow\LaravelFormComponents\Components\Traits\HasValidation;
use Pojow\LaravelFormComponents\Components\Traits\HasValue;

class Textarea extends AbstractComponent
{
    use HasAddon;
    use HasFloatingLabel;
    use HasId;
    use HasLabel;
    use HasName;
    use HasPlaceholder;
    use HasValidation;
    use HasValue;

    /** @SuppressWarnings(PHPMD.ExcessiveParameterList) */
    public function __construct(
        public string $name,
        protected string|null $id = null,
        protected object|array|null $bind = null,
        protected string|false|null $label = null,
        protected bool|null $floatingLabel = null,
        protected string|false|null $placeholder = null,
        protected string|Closure|null $prepend = null,
        protected string|Closure|null $append = null,
        protected string|int|array|Closure|null $value = null,
        public string|null $caption = null,
        protected bool|null $displayValidationSuccess = null,
        protected bool|null $displayValidationFailure = null,
        protected string|null $errorBag = null,
        public array $locales = [null],
        public bool $marginBottom = true
    ) {
        parent::__construct();
    }

    protected function setViewPath(): string
    {
        return 'textarea';
    }
}
