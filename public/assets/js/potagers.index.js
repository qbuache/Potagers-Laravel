(() => {
    const searchBox = document.getElementById("searchBox");
    const sizes = document.querySelectorAll(".size");
    const noResult = document.getElementById("noResult");
    const potagers = document.getElementById("potagers");
    const listItems = document.querySelectorAll(".potager");

    searchBox.addEventListener(
        "input",
        window._.debounce(() => search()),
        300
    );
    sizes.forEach((el) =>
        el.addEventListener(
            "change",
            window._.debounce(() => search()),
            300
        )
    );

    function search() {
        const selectedSize = document.querySelector(".size:checked");
        const searchText = searchBox.value.length > 0;
        const searchSize = selectedSize.value.length > 0;

        listItems.forEach((element) => {
            element.classList.remove("d-none");
        });

        if (searchText || searchSize) {
            if (searchText) {
                const search = searchBox.value.trim().toLowerCase();
                listItems.forEach((element) => {
                    if (!element.innerText.toLowerCase().includes(search)) {
                        element.classList.add("d-none");
                    }
                });
            }

            if (searchSize) {
                listItems.forEach((element) => {
                    if (element.dataset.size != selectedSize.value) {
                        element.classList.add("d-none");
                    }
                });
            }

            displayNoResult(
                document.querySelectorAll(".potager:not(.d-none)").length < 1
            );
        } else {
            displayNoResult(false);
        }
    }

    function displayNoResult(toggle) {
        noResult.style.display = toggle ? "block" : "none";
        potagers.style.display = toggle ? "none" : "block";
    }
})();
