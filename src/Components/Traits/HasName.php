<?php

namespace Pojow\LaravelFormComponents\Components\Traits;

trait HasName
{
    protected function getNameTranslationFromValidation(null|string $locale = null): string
    {
        return __('validation.attributes.' . $this->getNameWithoutArrayNotation())
            . ($locale ? ' (' . mb_strtoupper($locale) . ')' : '');
    }

    protected function getNameWithoutArrayNotation(): string
    {
        return mb_strstr($this->name, '[', true) ?: $this->name;
    }

    protected function getNameWithArrayNotationConvertedInto(string $notation = '.'): string
    {
        return str_replace(['[', ']'], [$notation, ''], $this->name);
    }
}
