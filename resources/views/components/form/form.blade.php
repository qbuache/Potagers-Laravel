@props(['element', 'multipart' => false, 'route'])

@php
    $method = empty($element) ? 'POST' : 'PATCH';
@endphp

<form
    {{ $attributes->merge([
        'action' => $route,
        'enctype' => $multipart ? 'multipart/form-data' : null,
        'method' => 'POST',
    ]) }}
>
    @csrf
    @if ($method != 'POST')
        @method($method)
    @endif
    {{ $slot }}
</form>
