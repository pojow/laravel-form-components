<?php

namespace Pojow\LaravelFormComponents\Tests\Unit\Bootstrap5\Inputs\FloatingLabel;

use Pojow\LaravelFormComponents\Components\Input;
use Pojow\LaravelFormComponents\Tests\TestCase;

class InputFloatingLabelTest extends TestCase
{
    /** @test */
    public function it_can_globally_set_input_floating_label_mode_from_config(): void
    {
        config()->set('form-components.floating_label', true);
        $component = app(Input::class, ['name' => 'first_name']);
        self::assertTrue($component->shouldDisplayFloatingLabel());
        config()->set('form-components.floating_label', false);
        $component = app(Input::class, ['name' => 'first_name']);
        self::assertFalse($component->shouldDisplayFloatingLabel());
    }

    /** @test */
    public function it_can_set_input_non_floating_label_mode_and_override_config(): void
    {
        config()->set('form-components.floating_label', true);
        $html = $this->renderComponent(Input::class, ['name' => 'first_name', 'floatingLabel' => false]);
        self::assertStringNotContainsString('form-floating ', $html);
        $labelPosition = mb_strrpos($html, '<label');
        $inputPosition = mb_strrpos($html, '<input');
        self::assertLessThan($inputPosition, $labelPosition);
    }

    /** @test */
    public function it_can_set_input_floating_label_mode_and_override_config(): void
    {
        config()->set('form-components.floating_label', false);
        $html = $this->renderComponent(Input::class, ['name' => 'first_name', 'floatingLabel' => true]);
        self::assertStringContainsString('form-floating ', $html);
        $labelPosition = mb_strrpos($html, '<label');
        $inputPosition = mb_strrpos($html, '<input');
        self::assertLessThan($labelPosition, $inputPosition);
    }
}
