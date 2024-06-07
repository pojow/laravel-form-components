<?php

namespace Pojow\LaravelFormComponents\Tests\Unit\Bootstrap5\Inputs\Inline;

use Pojow\LaravelFormComponents\Components\Radio;
use Pojow\LaravelFormComponents\Tests\TestCase;

class RadioInlineTest extends TestCase
{
    /** @test */
    public function it_can_set_radio_stacked_mode_by_default_in_group_mode(): void
    {
        $html = $this->renderComponent(Radio::class, [
            'name' => 'gender',
            'group' => [1 => 'Male', 2 => 'Female'],
        ]);
        self::assertStringNotContainsString('class="form-check form-check-inline', $html);
    }

    /** @test */
    public function it_can_set_radio_inlined_mode_in_group_mode(): void
    {
        $html = $this->renderComponent(Radio::class, [
            'name' => 'gender',
            'group' => [1 => 'Male', 2 => 'Female'],
            'inline' => true,
        ]);
        self::assertEquals(2, mb_substr_count($html, ' class="form-check form-check-inline'));
    }
}
