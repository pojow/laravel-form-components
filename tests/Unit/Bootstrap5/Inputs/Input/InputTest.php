<?php

namespace Pojow\LaravelFormComponents\Tests\Unit\Bootstrap5\Inputs\Input;

use Pojow\LaravelFormComponents\Components\Input;
use Pojow\LaravelFormComponents\Tests\TestCase;

class InputTest extends TestCase
{
    /** @test */
    public function it_can_set_input_class(): void
    {
        $html = $this->renderComponent(Input::class, ['name' => 'first_name']);
        self::assertStringContainsString('<input id="text-first-name" class="form-control"', $html);
    }

    /** @test */
    public function it_can_set_input_file_class(): void
    {
        $html = $this->renderComponent(Input::class, ['name' => 'document', 'type' => 'file']);
        self::assertStringContainsString('<input id="file-document" class="form-control"', $html);
    }
}
