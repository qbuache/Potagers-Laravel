<template id="template-potager-pill">
    <small
        class="potager__pill position-absolute text-white fw-bold rounded"
        data-name
        style="transform:translate(-50%,-45%);z-index:150;padding:2px;"
    >
        <a class="potager__link text-decoration-none text-white"></a>
        <i
            class="potager__user fa fa-user-circle rounded-circle bg-white"
            data-bs-toggle="tooltip"
            data-bs-title
            style="position:absolute;top:-25%;left:-25%;z-index:200"
        ></i>
        <i
            class="potager__state fa fa-circle-exclamation text-warning rounded-circle bg-white"
            data-bs-toggle="tooltip"
            data-bs-title
            style="position:absolute;top:-25%;right:-25%;z-index:200"
        ></i>
    </small>
</template>
