<?php

namespace Pojow\LaravelFormComponents\Tests\Unit\Bootstrap5\Inputs\FloatingLabel;

use Pojow\LaravelFormComponents\Components\Select;
use Pojow\LaravelFormComponents\Tests\TestCase;

class SelectFloatingLabelTest extends TestCase
{
    /** @test */
    public function it_can_globally_set_select_floating_label_mode_from_config(): void
    {
        config()->set('form-components.floating_label', true);
        $component = app(Select::class, ['name' => 'hobby_id', 'options' => []]);
        self::assertTrue($component->shouldDisplayFloatingLabel());
        config()->set('form-components.floating_label', false);
        $component = app(Select::class, ['name' => 'hobby_id', 'options' => []]);
        self::assertFalse($component->shouldDisplayFloatingLabel());
    }

    /** @test */
    public function it_can_set_select_non_floating_label_mode_and_override_config(): void
    {
        config()->set('form-components.floating_label', true);
        $html = $this->renderComponent(Select::class, [
            'name' => 'hobby_id',
            'options' => [],
            'floatingLabel' => false,
        ]);
        self::assertStringNotContainsString('form-floating ', $html);
        $labelPosition = mb_strrpos($html, '<label');
        $inputPosition = mb_strrpos($html, '<select');
        self::assertLessThan($inputPosition, $labelPosition);
    }

    /** @test */
    public function it_can_set_select_floating_label_mode_and_override_config(): void
    {
        config()->set('form-components.floating_label', false);
        $html = $this->renderComponent(Select::class, [
            'name' => 'hobby_id',
            'options' => [],
            'floatingLabel' => true,
        ]);
        self::assertStringContainsString('form-floating ', $html);
        $labelPosition = mb_strrpos($html, '<label');
        $inputPosition = mb_strrpos($html, '<select');
        self::assertLessThan($labelPosition, $inputPosition);
    }
}
