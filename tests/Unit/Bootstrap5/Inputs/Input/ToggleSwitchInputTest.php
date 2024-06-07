<?php

namespace Pojow\LaravelFormComponents\Tests\Unit\Bootstrap5\Inputs\Input;

use Pojow\LaravelFormComponents\Components\ToggleSwitch;
use Pojow\LaravelFormComponents\Tests\TestCase;

class ToggleSwitchInputTest extends TestCase
{
    /** @test */
    public function it_can_set_toggle_switch_input_class(): void
    {
        $html = $this->renderComponent(ToggleSwitch::class, ['name' => 'active']);
        self::assertStringContainsString('<input id="toggle-switch-active" class="form-check-input"', $html);
    }
}
