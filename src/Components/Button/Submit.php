<?php

namespace Pojow\LaravelFormComponents\Components\Button;

use Pojow\LaravelFormComponents\Components\Abstracts\AbstractComponent;

class Submit extends AbstractComponent
{
    protected function setViewPath(): string
    {
        return 'button.submit';
    }
}
