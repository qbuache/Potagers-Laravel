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
<nav
    class="navbar navbar-light bg-custom navbar-expand-lg py-0"
    id="pageNavbar"
>
    <div class="container-lg">
        <div
            class="navbar-brand pt-0"
            id="pageLogo"
        >
            <a
                class="text-decoration-none"
                href="{{ url('') }}"
            >
                <div class="p-2 bg-white rounded d-flex gap-2 align-items-center">
                    <x-logo
                        height="60px"
                        logo="logo3"
                    />
                    <h6 class="m-0 text-custom fw-bold">{{ config('app.name') }}</h6>
                </div>
            </a>
        </div>
        <button
            class="navbar-toggler text-white"
            data-bs-target="#pageNavbarCollapsible"
            data-bs-toggle="collapse"
            type="button"
            aria-controls="pageNavbarCollapsible"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <i class="fa fa-lg fa-fw fa-bars"></i>
        </button>
        <div
            class="navbar-collapse collapse"
            id="pageNavbarCollapsible"
        >
            <div class="d-block d-lg-flex justify-content-between flex-fill position-relative pt-2 pb-3 py-lg-0">
                <div class="d-block d-lg-flex flex-grow-1">
                    <ul class="navbar-nav align-items-lg-center">
                        @foreach ($navItems as $navItem)
                            @can($navItem['permission'])
                                <li class="nav-item">
                                    <a
                                        href="{{ url($navItem['href']) }}"
                                        @class([
                                            'nav-link text-white',
                                            'active' => request()->is("{$navItem['href']}*"),
                                        ])
                                    >
                                        <x-fa-span fa="{{ $navItem['fa'] }}">{{ $navItem['text'] }}</x-fa-span>
                                    </a>
                                </li>
                            @endcan
                        @endforeach
                    </ul>
                </div>
                <div class="d-flex flex-column flex-lg-row align-items-lg-center">
                    <ul class="navbar-nav ms-0 ms-lg-2">
                        <li class="nav-item dropdown"><a
                                class="nav-link text-white py-1 dropdown-toggle"
                                id="navbarAuth"
                                data-bs-toggle="dropdown"
                                role="button"
                                aria-expanded="false"
                            >
                                <span>
                                    <x-fa-span fa="user-circle">{{ Auth::user()->name }}</x-fa-span>
                                </span>
                            </a>
                            <div
                                class="dropdown-menu dropdown-menu-end shadow"
                                aria-labelledby="navbarAuth"
                            >
                                <a
                                    class="dropdown-item"
                                    href="{{ url('profil') }}"
                                >
                                    <x-fa-span fa="user">Mon compte</x-fa-span>
                                </a>
                                <form
                                    action="{{ route('logout') }}"
                                    method="POST"
                                >
                                    @csrf
                                    <button
                                        class="dropdown-item"
                                        type="submit"
                                    >
                                        <x-fa-span fa="right-from-bracket">
                                            Se déconnecter
                                        </x-fa-span>
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
