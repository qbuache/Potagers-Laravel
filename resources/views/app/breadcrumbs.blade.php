@unless($breadcrumbs->isEmpty())
    <nav aria-label="Breadcrumbs"
        class="my-2 align-items-center">
        <ol class="breadcrumb align-items-center m-0">
            @foreach ($breadcrumbs as $breadcrumb)
                <li {{ $ariaCurrent() }}
                    class="breadcrumb-item {{ $activeClass('active') }}">
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
