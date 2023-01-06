@props(['element', 'route'])

@php
    $method = empty($element) ? 'POST' : 'PATCH';
@endphp

<form {{ $attributes->merge([
    'action' => $route,
    'method' => 'POST',
]) }}>
    @csrf
    @if ($method != 'POST')
        @method($method)
    @endif
    {{ $slot }}
</form>
