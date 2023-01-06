@props(['logo' => 'logo1', 'width' => 'auto', 'height' => 'auto'])

<img {{ $attributes->merge([
    'style' => "width:$width; height:$height",
]) }}
    alt="Logo Fiches Nord"
    src="{{ asset("assets/img/$logo.jpeg") }}">
