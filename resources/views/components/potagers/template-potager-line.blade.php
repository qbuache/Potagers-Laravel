<template id="template-potager-line">
    <div
        class="potager__line gap-2 list-group-item d-flex justify-content-between align-items-center"
        data-name
    >
        <div>
            <label class="text-muted">
                <span>{{ __('messages.label.name') }}</span>
                <input
                    class="potager__name form-control form-control-sm"
                    name="names[]"
                    type="number"
                    required
                >
            </label>
        </div>
        <div>
            <label class="text-muted">
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
        <input
            class="potager__coordinates"
            name="coordinates[]"
            type="hidden"
        >
        <x-button
            class="potager__delete btn__action"
            fa="trash"
        />
    </div>
</template>
