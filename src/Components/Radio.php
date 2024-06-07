<?php

namespace Pojow\LaravelFormComponents\Components;

use Pojow\LaravelFormComponents\Components\Abstracts\AbstractComponent;
use Pojow\LaravelFormComponents\Components\Traits\HasId;
use Pojow\LaravelFormComponents\Components\Traits\HasLabel;
use Pojow\LaravelFormComponents\Components\Traits\HasName;
use Pojow\LaravelFormComponents\Components\Traits\HasValidation;
use Pojow\LaravelFormComponents\FormBinder;

class Radio extends AbstractComponent
{
    use HasId;
    use HasLabel;
    use HasName;
    use HasValidation;

    /** @SuppressWarnings(PHPMD.ExcessiveParameterList) */
    public function __construct(
        public string $name,
        public array $group,
        protected string|null $id = null,
        protected array|object|null $bind = null,
        protected string|false|null $label = null,
        protected int|string|null $checked = null,
        public string|null $caption = null,
        protected bool|null $displayValidationSuccess = null,
        protected bool|null $displayValidationFailure = null,
        protected string|null $errorBag = null,
        public bool $marginBottom = true,
        public bool $inline = false
    ) {
        $this->displayValidationSuccess = $this->shouldDisplayValidationSuccess();
        $this->displayValidationFailure = $this->shouldDisplayValidationFailure();
        parent::__construct();
    }

    public function getGroupModeCheckedStatus(int|string $value): bool
    {
        if (old($this->name)) {
            return (string) old($this->name) === (string) $value;
        }
        if ($this->checked) {
            return (string) $this->checked === (string) $value;
        }
        $dataBatch = $this->bind ?: app(FormBinder::class)->getBoundDataBatch();

        return (string) data_get($dataBatch, $this->name) === (string) $value;
    }

    protected function setViewPath(): string
    {
        return 'radio';
    }
}
