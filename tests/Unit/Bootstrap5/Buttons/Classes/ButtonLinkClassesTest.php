<?php

namespace Pojow\LaravelFormComponents\Tests\Unit\Bootstrap5\Buttons\Classes;

use Illuminate\Support\HtmlString;
use Pojow\LaravelFormComponents\Components\Button\Link;
use Pojow\LaravelFormComponents\Tests\TestCase;

class ButtonLinkClassesTest extends TestCase
{
    /** @test */
    public function it_can_setup_default_classes_when_none_are_defined(): void
    {
        $html = $this->renderComponent(
            componentClass: Link::class,
            viewData: ['slot' => new HtmlString()]
        );
        self::assertStringContainsString(' class="btn btn-primary"', $html);
    }

    /** @test */
    public function it_can_set_custom_classes(): void
    {
        $html = $this->renderComponent(
            componentClass: Link::class,
            viewData: ['slot' => new HtmlString()],
            attributes: ['class' => 'btn-secondary'],
        );
        self::assertStringContainsString('class="btn btn-secondary"', $html);
    }
}
