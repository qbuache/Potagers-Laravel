@php
    $navItems = [
        [
            'href' => 'jardins',
            'text' => 'Jardins',
            'permission' => Permissions::READ_JARDINS,
        ],
        [
            'href' => 'users',
            'text' => 'Jardiniers',
            'permission' => Permissions::READ_USERS,
        ],
        [
            'href' => 'potagers',
            'text' => 'Potagers',
            'permission' => Permissions::READ_POTAGERS,
        ],
    ];
@endphp
<x-app-layout>
    <div class="col-lg-12">
        <x-page>
            <div class="row">
                @foreach ($navItems as $navItem)
                    @can($navItem['permission'])
                        <div class="col-lg-4 mx-auto">
                            <a {{-- :class="{
                              active: $page.component.startsWith(navItem.component),
                            }" --}}
                                class="btn btn-light mt-2 mt-lg-0 w-100 text-start text-lg-center"
                                href="{{ $navItem['href'] }}">
                                {{ $navItem['text'] }}
                            </a>
                        </div>
                    @endcan
                @endforeach
            </div>
        </x-page>
    </div>
</x-app-layout>
