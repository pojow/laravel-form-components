<?php

namespace Pojow\LaravelFormComponents\Tests\Unit\Bootstrap5\Inputs\Id;

use Pojow\LaravelFormComponents\Components\Textarea;
use Pojow\LaravelFormComponents\Tests\TestCase;

class TextareaIdTest extends TestCase
{
    /** @test */
    public function it_can_setup_textarea_default_id_when_none_is_defined(): void
    {
        $html = $this->renderComponent(Textarea::class, ['name' => 'description']);
        self::assertStringContainsString(' id="textarea-description"', $html);
        self::assertStringContainsString(' for="textarea-description"', $html);
    }

    /** @test */
    public function it_can_setup_textarea_default_id_with_array_name_when_none_is_defined(): void
    {
        $html = $this->renderComponent(Textarea::class, ['name' => 'description[0]']);
        self::assertStringContainsString(' id="textarea-description-0"', $html);
        self::assertStringContainsString(' for="textarea-description-0"', $html);
    }

    /** @test */
    public function it_can_setup_textarea_default_localized_id_when_none_is_defined(): void
    {
        $html = $this->renderComponent(Textarea::class, ['name' => 'description', 'locales' => ['fr', 'en']]);
        self::assertStringContainsString(' id="textarea-description-fr"', $html);
        self::assertStringContainsString(' for="textarea-description-fr"', $html);
        self::assertStringContainsString(' id="textarea-description-en"', $html);
        self::assertStringContainsString(' for="textarea-description-en"', $html);
    }

    /** @test */
    public function it_can_set_textarea_id(): void
    {
        $html = $this->renderComponent(Textarea::class, ['name' => 'description', 'id' => 'test-id']);
        self::assertStringContainsString(' id="test-id"', $html);
        self::assertStringContainsString(' for="test-id"', $html);
    }

    /** @test */
    public function it_can_set_textarea_localized_id(): void
    {
        $html = $this->renderComponent(Textarea::class, [
            'name' => 'description',
            'id' => 'test-id',
            'locales' => ['fr', 'en'],
        ]);
        self::assertStringContainsString(' id="test-id-fr"', $html);
        self::assertStringContainsString(' for="test-id-fr"', $html);
        self::assertStringContainsString(' id="test-id-en"', $html);
        self::assertStringContainsString(' for="test-id-en"', $html);
    }
}
