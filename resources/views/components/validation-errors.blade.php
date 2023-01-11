@if ($errors->any())
    <x-alert
        type="warning"
        {{ $attributes->merge() }}
    >
        <ul @class(['m-0', 'list-unstyled' => $errors->count() > 0])>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </x-alert>
@endif
