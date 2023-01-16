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
    <x-page title="{{ __('messages.text.dashboard') }}">
        <div class="d-flex flex-column flex-lg-row gap-3">
            @can(Permissions::READ_JARDINS)
                <x-link
                    class="flex-grow-1 text-start text-lg-center"
                    href="jardins"
                    fa="seedling"
                    size="nm"
                >
                    <span class="text-custom">{{ $countJardins }}</span>
                    <span>Jardins</span>
                </x-link>
            @endcan
            @can(Permissions::READ_USERS)
                <x-link
                    class="flex-grow-1 text-start text-lg-center"
                    href="users"
                    fa="users"
                    size="nm"
                >
                    <span class="text-custom">{{ $countJardiniers }}</span>
                    <span>Jardiniers</span>
                </x-link>
            @endcan
            @can(Permissions::READ_POTAGERS)
                <x-link
                    class="flex-grow-1 text-start text-lg-center"
                    href="potagers"
                    fa="carrot"
                    size="nm"
                >
                    <span class="text-custom">{{ $countPotagers }}</span>
                    <span>Potagers</span>
                </x-link>
            @endcan
        </div>
    </x-page>
</x-app-layout>
