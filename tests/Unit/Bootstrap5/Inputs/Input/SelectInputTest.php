<?php

namespace Pojow\LaravelFormComponents\Tests\Unit\Bootstrap5\Inputs\Input;

use Pojow\LaravelFormComponents\Components\Select;
use Pojow\LaravelFormComponents\Tests\TestCase;

class SelectInputTest extends TestCase
{
    /** @test */
    public function it_can_set_select_input_class(): void
    {
        $html = $this->renderComponent(Select::class, ['name' => 'hobby_id', 'options' => []]);
        self::assertStringContainsString('<select id="select-hobby-id" class="form-select"', $html);
    }
}
