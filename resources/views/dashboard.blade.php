@php
    $navItems = [
        [
            'href' => 'jardins',
            'fa' => 'seedling',
            'text' => 'Jardins',
            'permission' => Permissions::READ_JARDINS,
        ],
        [
            'href' => 'users',
            'fa' => 'users',
            'text' => 'Jardiniers',
            'permission' => Permissions::READ_USERS,
        ],
        [
            'href' => 'potagers',
            'fa' => 'carrot',
            'text' => 'Potagers',
            'permission' => Permissions::READ_POTAGERS,
        ],
    ];
@endphp
<x-app-layout>
    <x-page>
        <div class="row">
            @foreach ($navItems as $navItem)
                @can($navItem['permission'])
                    <div class="col-lg-4 mx-auto">
                        <x-link
                            class="mt-2 mt-lg-0 w-100 text-start text-lg-center"
                            href="{{ $navItem['href'] }}"
                            fa="{{ $navItem['fa'] }}"
                            size="nm"
                        >
                            {{ $navItem['text'] }}
                        </x-link>
                    </div>
                @endcan
            @endforeach
        </div>
    </x-page>
</x-app-layout>
