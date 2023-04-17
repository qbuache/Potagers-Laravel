@props(['states'])

<template id="template-potager-line">
    <div
        class="potager__line gap-2 list-group-item d-flex flex-column gap-1"
        data-name
    >

        <input
            class="potager__coordinates"
            name="coordinates[]"
            type="hidden"
        >
        <div class="d-flex gap-2">
            <div class="d-flex flex-grow-1">
                <label class="text-muted d-flex flex-grow-1 gap-2 align-items-center">
                    <span>{{ __('messages.label.name') }}</span>
                    <input
                        class="potager__name form-control form-control-sm"
                        name="names[]"
                        type="number"
                        required
                    >
                </label>
            </div>
            <x-button
                class="potager__delete btn__action"
                fa="trash"
            />
        </div>
        <div class="d-flex gap-2">
            <div class="d-flex flex-grow-1">
                <label class="text-muted d-flex flex-column flex-grow-1">
                    <x-sqm>{{ __('messages.label.size') }}&nbsp;</x-sqm>
                    <input
                        class="potager__size form-control form-control-sm"
                        name="sizes[]"
                        type="number"
                        value="1"
                        required
                        min="1"
                    >
                </label>
            </div>
            <div class="d-flex flex-grow-1">
                <label class="text-muted d-flex flex-column flex-grow-1">
                    {{ __('messages.label.state') }}
                    <select
                        class="potager__size form-select form-select-sm"
                        name="states[]"
                        required
                    >
                        @foreach ($states as $state)
                            <option value="{{ $state[0] }}">{{ $state[1] }}</option>
                        @endforeach
                    </select>
                </label>
            </div>
        </div>
    </div>
</template>
