<?php

namespace Pojow\LaravelFormComponents\Tests\Unit\Bootstrap5\Inputs\OldValue;

use Pojow\LaravelFormComponents\Components\Radio;
use Pojow\LaravelFormComponents\Tests\TestCase;

class RadioOldValueTest extends TestCase
{
    /** @test */
    public function it_can_retrieve_radio_old_checked_status_in_group_mode(): void
    {
        $this->app['router']->get('test', [
            'middleware' => 'web',
            'uses' => fn () => request()->merge(['gender' => 'female'])->flash(),
        ]);
        $this->call('GET', 'test');
        $html = $this->renderComponent(Radio::class, [
            'name' => 'gender',
            'group' => ['female' => 'Female', 'male' => 'Male'],
        ]);
        self::assertStringContainsString(' value="female" checked="checked"', $html);
    }

    /** @test */
    public function it_can_retrieve_radio_old_checked_status_with_array_name_in_group_mode(): void
    {
        $this->app['router']->get('test', [
            'middleware' => 'web',
            'uses' => fn () => request()->merge(['gender[0]' => 'female'])->flash(),
        ]);
        $this->call('GET', 'test');
        $html = $this->renderComponent(Radio::class, [
            'name' => 'gender[0]',
            'group' => ['female' => 'Female', 'male' => 'Male'],
        ]);
        self::assertStringContainsString(' value="female" checked="checked"', $html);
    }
}
