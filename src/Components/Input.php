<?php

namespace Okipa\LaravelFormComponents\Components;

use Closure;
use Okipa\LaravelFormComponents\Components\Abstracts\AbstractComponent;
use Okipa\LaravelFormComponents\Components\Traits\CanBeWired;
use Okipa\LaravelFormComponents\Components\Traits\HasAddon;
use Okipa\LaravelFormComponents\Components\Traits\HasFloatingLabel;
use Okipa\LaravelFormComponents\Components\Traits\HasId;
use Okipa\LaravelFormComponents\Components\Traits\HasLabel;
use Okipa\LaravelFormComponents\Components\Traits\HasName;
use Okipa\LaravelFormComponents\Components\Traits\HasPlaceholder;
use Okipa\LaravelFormComponents\Components\Traits\HasValidation;
use Okipa\LaravelFormComponents\Components\Traits\HasValue;

class Input extends AbstractComponent
{
    use CanBeWired;
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
        public string $type = 'text',
        protected array|object|null $bind = null,
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
        return 'input';
    }
}
