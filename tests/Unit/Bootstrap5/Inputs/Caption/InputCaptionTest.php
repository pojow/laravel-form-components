<?php

namespace Pojow\LaravelFormComponents\Tests\Unit\Bootstrap5\Inputs\Caption;

use Pojow\LaravelFormComponents\Components\Input;
use Pojow\LaravelFormComponents\Tests\TestCase;

class InputCaptionTest extends TestCase
{
    /** @test */
    public function it_can_set_input_caption(): void
    {
        $html = $this->renderComponent(Input::class, ['name' => 'first_name', 'caption' => 'Test caption']);
        $this->assertSeeHtmlInOrder($html, [
            ' aria-describedby="text-first-name-caption"',
            '<div id="text-first-name-caption" class="form-text">Test caption</div>',
        ]);
    }
}
