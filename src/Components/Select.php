<?php

namespace Pojow\LaravelFormComponents\Components;

use Closure;
use Pojow\LaravelFormComponents\Components\Abstracts\AbstractComponent;
use Pojow\LaravelFormComponents\Components\Traits\HasAddon;
use Pojow\LaravelFormComponents\Components\Traits\HasFloatingLabel;
use Pojow\LaravelFormComponents\Components\Traits\HasId;
use Pojow\LaravelFormComponents\Components\Traits\HasLabel;
use Pojow\LaravelFormComponents\Components\Traits\HasName;
use Pojow\LaravelFormComponents\Components\Traits\HasOptions;
use Pojow\LaravelFormComponents\Components\Traits\HasPlaceholder;
use Pojow\LaravelFormComponents\Components\Traits\HasValidation;

class Select extends AbstractComponent
{
    use HasAddon;
    use HasFloatingLabel;
    use HasId;
    use HasLabel;
    use HasName;
    use HasOptions;
    use HasPlaceholder;
    use HasValidation;

    /** @SuppressWarnings(PHPMD.ExcessiveParameterList) */
    public function __construct(
        public string $name,
        public array $options,
        protected string|null $id = null,
        protected array|object|null $bind = null,
        protected string|false|null $label = null,
        protected bool|null $floatingLabel = null,
        protected string|false|null $placeholder = null,
        public bool $allowPlaceholderToBeSelected = false,
        protected string|Closure|null $prepend = null,
        protected string|Closure|null $append = null,
        protected int|string|array|null $selected = null,
        public string|null $caption = null,
        protected bool|null $displayValidationSuccess = null,
        protected bool|null $displayValidationFailure = null,
        protected string|null $errorBag = null,
        public bool $marginBottom = true
    ) {
        parent::__construct();
    }

    protected function setViewPath(): string
    {
        return 'select';
    }
}
