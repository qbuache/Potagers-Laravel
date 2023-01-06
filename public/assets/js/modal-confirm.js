(() => {
    const modalConfirm = document.getElementById("modalConfirm");
    const validateButton = document.querySelector(
        "#modalConfirm .modal-footer button.yes"
    );

    modalConfirm.addEventListener("shown.bs.modal", (event) => {
        validateButton.focus();
    });
})();
