<template id="template-potager-line">
    <div
        class="potager__line gap-2 list-group-item d-flex justify-content-between align-items-center"
        data-name
    >
        <div>
            <label class="text-muted">
                <span>Nom</span>
                <input
                    class="potager__name form-control form-control-sm"
                    name="names[]"
                    type="number"
                    placeholder="Nom"
                >
            </label>
        </div>
        <div>
            <label class="text-muted">
                <x-sqm>Taille&nbsp;</x-sqm>
                <input
                    class="potager__size form-control form-control-sm"
                    name="sizes[]"
                    type="number"
                    value="1"
                    min="1"
                    placeholder="Taille m²"
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
