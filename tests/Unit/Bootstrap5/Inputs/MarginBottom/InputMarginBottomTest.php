<?php

namespace Pojow\LaravelFormComponents\Tests\Unit\Bootstrap5\Inputs\MarginBottom;

use Pojow\LaravelFormComponents\Components\Input;
use Pojow\LaravelFormComponents\Tests\TestCase;

class InputMarginBottomTest extends TestCase
{
    /** @test */
    public function it_can_enable_input_margin_bottom_by_default(): void
    {
        $html = $this->renderComponent(Input::class, ['name' => 'first_name']);
        self::assertStringContainsString('<div class="mb-3">', $html);
    }

    /** @test */
    public function it_can_disable_input_margin_bottom(): void
    {
        $html = $this->renderComponent(Input::class, ['name' => 'first_name', 'marginBottom' => false]);
        self::assertStringNotContainsString('<div class="mb-3">', $html);
    }
}
