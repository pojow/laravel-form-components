<?php

namespace Pojow\LaravelFormComponents\Tests\Unit\Bootstrap5\Inputs\DataLocaleAttribute;

use Pojow\LaravelFormComponents\Components\Textarea;
use Pojow\LaravelFormComponents\Tests\TestCase;

class TextareaDataLocaleAttributeTest extends TestCase
{
    /** @test */
    public function it_cant_setup_data_locale_attribute_on_textarea_when_not_multilingual(): void
    {
        $html = $this->renderComponent(Textarea::class, ['name' => 'description', 'locales' => ['fr', 'en']]);
        self::assertStringContainsString('data-locale="fr"', $html);
        self::assertStringContainsString('data-locale="en"', $html);
    }

    /** @test */
    public function it_can_setup_component_classes_by_default_on_textarea_when_multilingual(): void
    {
        $html = $this->renderComponent(Textarea::class, ['name' => 'description', 'locales' => ['fr', 'en']]);
        self::assertStringContainsString('data-locale="fr"', $html);
        self::assertStringContainsString('data-locale="en"', $html);
    }
}
