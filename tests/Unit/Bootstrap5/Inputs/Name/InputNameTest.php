<?php

namespace Pojow\LaravelFormComponents\Tests\Unit\Bootstrap5\Inputs\Name;

use Pojow\LaravelFormComponents\Components\Input;
use Pojow\LaravelFormComponents\Tests\TestCase;

class InputNameTest extends TestCase
{
    /** @test */
    public function it_can_set_input_name(): void
    {
        $html = $this->renderComponent(Input::class, ['name' => 'first_name']);
        self::assertStringContainsString(' name="first_name"', $html);
    }

    /** @test */
    public function it_can_set_input_localized_names(): void
    {
        $html = $this->renderComponent(Input::class, ['name' => 'first_name', 'locales' => ['fr', 'en']]);
        self::assertStringContainsString(' name="first_name[fr]"', $html);
        self::assertStringContainsString(' name="first_name[en]"', $html);
    }
}
