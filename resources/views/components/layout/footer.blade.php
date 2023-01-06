<footer class="border-top bg-white mt-auto px-2 py-1 d-flex justify-content-between">
    @env('staging', 'local')
    <span>
        <span class="d-inline d-sm-none">xs</span>
        <span class="d-none d-sm-inline d-md-none">sm</span>
        <span class="d-none d-md-inline d-lg-none">md</span>
        <span class="d-none d-lg-inline d-xl-none">lg</span>
        <span class="d-none d-xl-inline d-xxl-none">xl</span>
        <span class="d-none d-xxl-inline">xxl</span>
    </span>
    @endenv
    <span></span>
    <a class="text-dark"
        href="{{ url('info') }}">© 2022</a>
</footer>
