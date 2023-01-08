@props(['logo' => 'logo1', 'width' => 'auto', 'height' => 'auto'])

<img
    src="{{ asset("assets/img/$logo.jpeg") }}"
    alt="Logo Fiches Nord"
    {{ $attributes->merge([
        'style' => "width:$width; height:$height",
    ]) }}
>
