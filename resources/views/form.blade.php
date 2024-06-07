@php
    $requiredCsrfToken = in_array($method, ['POST', 'PUT', 'PATCH', 'DELETE']);
    $requiredMethodSpoofing = in_array($method, ['PUT', 'PATCH', 'DELETE']);
@endphp
<form {{ $attributes->merge(['method' => $requiredMethodSpoofing ? 'POST' : $method]) }} novalidate>
    @if($requiredCsrfToken)
        @csrf
    @endif
    @if($requiredMethodSpoofing)
        @method($method)
    @endif
    {{ $slot ?? null }}
</form>
@php
    if($bind) {
        app(Pojow\LaravelFormComponents\FormBinder::class)->unbindLastDataBatch();
    }
    if($errorBag) {
        app(Pojow\LaravelFormComponents\FormBinder::class)->unbindErrorBag();
    }
@endphp
