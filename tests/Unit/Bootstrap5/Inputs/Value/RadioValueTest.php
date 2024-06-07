<?php

namespace Pojow\LaravelFormComponents\Tests\Unit\Bootstrap5\Inputs\Value;

use Pojow\LaravelFormComponents\Components\Radio;
use Pojow\LaravelFormComponents\Tests\TestCase;

class RadioValueTest extends TestCase
{
    /** @test */
    public function it_can_set_radio_values_in_group_mode(): void
    {
        $html = $this->renderComponent(Radio::class, [
            'name' => 'gender',
            'group' => ['female' => 'Female', 'male' => 'Male'],
        ]);
        self::assertStringContainsString(' value="female"', $html);
        self::assertStringContainsString(' value="male"', $html);
    }
}
