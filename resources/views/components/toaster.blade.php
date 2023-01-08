<div id="toaster">
    @if (session('success'))
        <div
            class="toast align-items-center text-bg-success border-0"
            role="alert"
            aria-atomic="true"
            aria-live="assertive"
        >
            <div class="d-flex">
                <div class="toast-body">{{ __('messages.done.' . session('success')) }}</div>
                <button
                    class="btn-close btn-close-white me-2 m-auto"
                    data-bs-dismiss="toast"
                    type="button"
                    aria-label="Close"
                ></button>
            </div>
        </div>
    @endif
</div>

<script>
    const toast = document.querySelector("#toaster .toast");
    if (toast) {
        bootstrap.Toast.getOrCreateInstance(toast).show();
    }
</script>
