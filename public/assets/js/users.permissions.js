(() => {
    const checkboxes = document.querySelectorAll(".form-check-input");
    checkboxes.forEach((element) =>
        element.addEventListener("change", (event) => {
            const nothingChecked = ![...checkboxes]
                .map((checkbox) => checkbox.checked)
                .some((checked) => checked);
            checkboxes.forEach(
                (checkbox) => (checkbox.required = nothingChecked)
            );
        })
    );
})();
