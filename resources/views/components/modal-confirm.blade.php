@props([
    'cancel' => 'Annuler',
    'action',
    'header' => 'Demande de confirmation',
    'method' => 'DELETE',
    'validate' => 'Valider',
])

<div
    class="modal"
    id="modalConfirm"
    tabindex="-1"
>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <span>{{ $header }}</span>
                <button
                    class="btn-close"
                    data-bs-dismiss="modal"
                    type="button"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">{{ $slot }}</div>
            <div class="modal-footer justify-content-center">
                <div class="d-grid d-sm-flex flex-fill gap-3">
                    <x-button
                        class="flex-grow-1"
                        data-bs-dismiss="modal"
                        fa="times"
                    >{{ $cancel }}
                    </x-button>
                    <form
                        class="flex-grow-1"
                        action="{{ url($action) }}"
                        method="POST"
                    >
                        @csrf
                        @method($method)
                        <x-button
                            class="yes btn-outline-custom w-100"
                            type="submit"
                            fa="check"
                        >{{ $validate }}
                        </x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@once
    <script src="{{ asset('assets/js/modal-confirm.js') }}"></script>
@endonce
