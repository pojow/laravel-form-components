<?php

namespace Pojow\LaravelFormComponents\Tests\Unit\Bootstrap5\Inputs\ErrorBagFormBinding;

use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;
use Pojow\LaravelFormComponents\Components\Radio;
use Pojow\LaravelFormComponents\FormBinder;
use Pojow\LaravelFormComponents\Tests\TestCase;

class RadioErrorBagFormBindingTest extends TestCase
{
    /** @test */
    public function it_can_override_radio_form_error_bag_binding_from_component_error_bag_in_group_mode(): void
    {
        config()->set('form-components.display_validation_failure', true);
        $globalMessageBag = app(MessageBag::class)->add('gender', 'Form error test');
        $componentMessageBag = app(MessageBag::class)->add('gender', 'Component error test');
        $errors = app(ViewErrorBag::class)->put('form_error_bag', $globalMessageBag);
        $errors->put('component_error_bag', $componentMessageBag);
        session()->put(compact('errors'));
        $this->executeWebMiddlewareGroup();
        app(FormBinder::class)->bindErrorBag('form_error_bag');
        $html = $this->renderComponent(Radio::class, [
            'name' => 'gender',
            'group' => [1 => 'Male', 2 => 'Female'],
            'errorBag' => 'component_error_bag',
        ]);
        self::assertStringContainsString('<div class="invalid-feedback d-block">Component error test</div>', $html);
    }
}
