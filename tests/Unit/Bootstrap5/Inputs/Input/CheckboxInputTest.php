<?php

namespace Pojow\LaravelFormComponents\Tests\Unit\Bootstrap5\Inputs\Input;

use Pojow\LaravelFormComponents\Components\Checkbox;
use Pojow\LaravelFormComponents\Tests\TestCase;

class CheckboxInputTest extends TestCase
{
    /** @test */
    public function it_can_set_checkbox_input_class(): void
    {
        $html = $this->renderComponent(Checkbox::class, ['name' => 'active']);
        self::assertStringContainsString('<input id="checkbox-active" class="form-check-input"', $html);
    }
}
