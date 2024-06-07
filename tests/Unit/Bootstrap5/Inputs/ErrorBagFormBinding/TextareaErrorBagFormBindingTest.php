<?php

namespace Pojow\LaravelFormComponents\Tests\Unit\Bootstrap5\Inputs\ErrorBagFormBinding;

use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;
use Pojow\LaravelFormComponents\Components\Textarea;
use Pojow\LaravelFormComponents\FormBinder;
use Pojow\LaravelFormComponents\Tests\TestCase;

class TextareaErrorBagFormBindingTest extends TestCase
{
    /** @test */
    public function it_can_override_textarea_form_error_bag_binding_from_component_error_bag(): void
    {
        config()->set('form-components.display_validation_failure', true);
        $globalMessageBag = app(MessageBag::class)->add('description', 'Form error test');
        $componentMessageBag = app(MessageBag::class)->add('description', 'Component error test');
        $errors = app(ViewErrorBag::class)->put('form_error_bag', $globalMessageBag);
        $errors->put('component_error_bag', $componentMessageBag);
        session()->put(compact('errors'));
        $this->executeWebMiddlewareGroup();
        app(FormBinder::class)->bindErrorBag('form_error_bag');
        $html = $this->renderComponent(Textarea::class, ['name' => 'description', 'errorBag' => 'component_error_bag']);
        self::assertStringContainsString('<div class="invalid-feedback">Component error test</div>', $html);
    }
}
