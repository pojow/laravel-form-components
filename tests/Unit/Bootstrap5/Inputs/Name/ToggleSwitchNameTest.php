<?php

namespace Pojow\LaravelFormComponents\Tests\Unit\Bootstrap5\Inputs\Name;

use Pojow\LaravelFormComponents\Components\ToggleSwitch;
use Pojow\LaravelFormComponents\Tests\TestCase;

class ToggleSwitchNameTest extends TestCase
{
    /** @test */
    public function it_can_set_toggle_switch_name(): void
    {
        $html = $this->renderComponent(ToggleSwitch::class, ['name' => 'active']);
        self::assertStringContainsString(' name="active"', $html);
    }

    /** @test */
    public function it_can_set_toggle_switches_name_in_group_mode(): void
    {
        $html = $this->renderComponent(ToggleSwitch::class, [
            'name' => 'technologies',
            'group' => [
                'laravel' => 'Laravel',
                'bootstrap' => 'Bootstrap',
                'tailwind' => 'Tailwind',
                'livewire' => 'Livewire',
            ],
        ]);
        self::assertEquals(4, mb_substr_count($html, ' name="technologies[]"'));
    }
}
