<?php

namespace Pojow\LaravelFormComponents\Tests\Unit\Bootstrap5\Inputs\Input;

use Pojow\LaravelFormComponents\Components\Textarea;
use Pojow\LaravelFormComponents\Tests\TestCase;

class TextareaInputTest extends TestCase
{
    /** @test */
    public function it_can_set_textarea_input_class(): void
    {
        $html = $this->renderComponent(Textarea::class, ['name' => 'description']);
        self::assertStringContainsString('<textarea id="textarea-description" class="form-control"', $html);
    }
}
