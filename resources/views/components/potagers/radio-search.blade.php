@props(['name', 'elements', 'all' => 'Tous', 'dynamicComponent' => 'fragment', 'translate' => null, 'useValue' => null, 'useText' => null])

<div>
    <h6 class="text-custom">{{ __("messages.label.{$name}") }}</h6>
    <ul class="mb-0 list-unstyled">
        <li>
            <x-form.simple.radio
                class="{{ $name }}"
                id="{{ $name }}All"
                name="{{ $name }}"
                value=""
                :checked="true"
                noMb
            >{{ $all }}</x-form.simple.radio>
        </li>
        @foreach ($elements as $element)
            @php
                $value = !empty($useValue) ? $element[$useValue] : $element;
                $text = !empty($useText) ? $element[$useText] : $element;
            @endphp
            <li>
                <x-form.simple.radio
                    class="{{ $name }}"
                    id="{{ $name }}{{ $value }}"
                    name="{{ $name }}"
                    value="{{ $value }}"
                    noMb
                >
                    <x-dynamic-component
                        class="mt-4"
                        :component="$dynamicComponent"
                    >{{ !empty($translate) ? __("messages.label.{$translate}{$text}") : $text }}
                    </x-dynamic-component>
                </x-form.simple.radio>
            </li>
        @endforeach
    </ul>
</div>
