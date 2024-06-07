<?php

namespace Pojow\LaravelFormComponents\Components\Button;

use Pojow\LaravelFormComponents\Components\Abstracts\AbstractComponent;

class Link extends AbstractComponent
{
    protected function setViewPath(): string
    {
        return 'button.link';
    }
}
