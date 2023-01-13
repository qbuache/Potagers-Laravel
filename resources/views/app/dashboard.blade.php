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
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-4 gap-3">
                @can(Permissions::READ_JARDINS)
                    <div class="card card-body h-100">
                        <x-link
                            class="text-start text-lg-center stretched-link"
                            href="jardins"
                            fa="seedling"
                            size="nm"
                        >Jardins</x-link>
                        <div class="mt-3 text-center">
                            Nombre de jardins : {{ $countJardins }}
                        </div>
                    </div>
                @endcan
                @can(Permissions::READ_USERS)
                    <div class="card card-body h-100">
                        <x-link
                            class="text-start text-lg-center stretched-link"
                            href="users"
                            fa="users"
                            size="nm"
                        >Jardiniers</x-link>
                        <div class="mt-3 text-center">
                            Nombre de jardiniers : {{ $countJardiniers }}
                        </div>
                    </div>
                @endcan
                @can(Permissions::READ_POTAGERS)
                    <div class="card card-body h-100">
                        <x-link
                            class="text-start text-lg-center stretched-link"
                            href="potagers"
                            fa="carrot"
                            size="nm"
                        >Potagers</x-link>
                        <div class="mt-3 text-center">
                            Nombre de potagers : {{ $countPotagers }}
                        </div>
                    </div>
                @endcan
            </div>
        </div>
    </x-page>
</x-app-layout>
