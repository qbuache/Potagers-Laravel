@unless($breadcrumbs->isEmpty())
    <nav
        class="my-2 align-items-center"
        aria-label="Breadcrumbs"
    >
        <ol class="breadcrumb align-items-center m-0">
            @foreach ($breadcrumbs as $breadcrumb)
                <li
                    class="breadcrumb-item {{ $activeClass('active') }}"
                    {{ $ariaCurrent() }}
                >
                    @if ($breadcrumb->is_current_page)
                        <span class="text-dark">{{ $breadcrumb->title }}</span>
                    @else
                        <a href="{{ $breadcrumb->url }}">
                            {{ $breadcrumb->title }}
                        </a>
                    @endif
                </li>
            @endforeach
        </ol>
    </nav>
@endunless
