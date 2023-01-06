<template id="template-potager-line">
    <div class="potager__line gap-2 list-group-item d-flex justify-content-between align-items-center"
        data-name>
        <div>
            <label class="text-muted">
                <span>Nom</span>
                <input class="potager__name form-control form-control-sm"
                    name="names[]"
                    placeholder="Nom"
                    type="number">
            </label>
        </div>
        <div>
            <label class="text-muted">
                <span>Taille m<sup>2</sup></span>
                <input class="potager__size form-control form-control-sm"
                    min="1"
                    name="sizes[]"
                    placeholder="Taille m²"
                    type="number"
                    value="1">
            </label>
        </div>
        <input class="potager__coordinates"
            name="coordinates[]"
            type="hidden">
        <x-button class="potager__delete btn__action"
            fa="trash" />
    </div>
</template>
