<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >
    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        crossorigin="anonymous"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        referrerpolicy="no-referrer"
        rel="stylesheet"
    />
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css"
        crossorigin="anonymous"
        integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA=="
        referrerpolicy="no-referrer"
        rel="stylesheet"
    />
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.bundle.min.js"
        integrity="sha512-i9cEfJwUwViEPFKdC1enz4ZRGBj8YQo6QByFTF92YXHi7waCqyexvRD75S5NVTsSiTv7rKWqG9Y5eFxmRsOn0A=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    ></script>
    <link
        href="{{ url(mix('css/app.css')) }}"
        rel="stylesheet"
    >
    <script
        src="{{ url(mix('js/app.js')) }}"
        defer
    ></script>
    <title>{{ config('app.name', 'Potagers') }}</title>
</head>

<body class="bg-light">
    <div id="app">
        <section
            class="d-flex flex-column h-100"
            id="page"
        >
            <main
                class="my-auto container-lg"
                id="pageContent"
            >
                {{ $slot }}
            </main>
            <x-layout.footer />
        </section>
    </div>
</body>

</html>
