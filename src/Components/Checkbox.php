<?php

namespace Pojow\LaravelFormComponents\Components;

use Pojow\LaravelFormComponents\Components\Abstracts\AbstractComponent;
use Pojow\LaravelFormComponents\Components\Traits\CanBeChecked;
use Pojow\LaravelFormComponents\Components\Traits\HasId;
use Pojow\LaravelFormComponents\Components\Traits\HasLabel;
use Pojow\LaravelFormComponents\Components\Traits\HasName;
use Pojow\LaravelFormComponents\Components\Traits\HasValidation;

class Checkbox extends AbstractComponent
{
    use CanBeChecked;
    use HasId;
    use HasLabel;
    use HasName;
    use HasValidation;

    /** @SuppressWarnings(PHPMD.ExcessiveParameterList) */
    public function __construct(
        public string $name,
        public array $group = [null],
        protected string|null $id = null,
        protected array|object|null $bind = null,
        protected string|false|null $label = null,
        protected bool|array|null $checked = null,
        public string|null $caption = null,
        protected bool|null $displayValidationSuccess = null,
        protected bool|null $displayValidationFailure = null,
        protected string|null $errorBag = null,
        public bool $marginBottom = true,
        public bool $inline = false,
        public bool $toggleSwitch = false
    ) {
        $this->displayValidationSuccess = $this->shouldDisplayValidationSuccess();
        $this->displayValidationFailure = $this->shouldDisplayValidationFailure();
        parent::__construct();
    }

    protected function setViewPath(): string
    {
        return 'checkbox';
    }
}
