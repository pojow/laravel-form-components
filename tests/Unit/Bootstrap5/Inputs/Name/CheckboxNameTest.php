<?php

namespace Pojow\LaravelFormComponents\Tests\Unit\Bootstrap5\Inputs\Name;

use Pojow\LaravelFormComponents\Components\Checkbox;
use Pojow\LaravelFormComponents\Tests\TestCase;

class CheckboxNameTest extends TestCase
{
    /** @test */
    public function it_can_set_checkbox_name(): void
    {
        $html = $this->renderComponent(Checkbox::class, ['name' => 'active']);
        self::assertStringContainsString(' name="active"', $html);
    }

    /** @test */
    public function it_can_set_checkboxes_name_in_group_mode(): void
    {
        $html = $this->renderComponent(Checkbox::class, [
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
