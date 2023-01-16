(() => {
    const searchBox = document.getElementById("searchBox");
    const jardins = document.querySelectorAll(".jardin");
    const sizes = document.querySelectorAll(".size");
    const states = document.querySelectorAll(".state");
    const statuses = document.querySelectorAll(".status");
    const noResult = document.getElementById("noResult");
    const potagers = document.getElementById("potagers");
    const listItems = document.querySelectorAll(".potager");

    searchBox.addEventListener(
        "input",
        window._.debounce(() => search()),
        300
    );
    [...jardins, ...sizes, ...states, ...statuses].forEach((el) =>
        el.addEventListener(
            "change",
            window._.debounce(() => search()),
            300
        )
    );

    function search() {
        const selectedJardin = document.querySelector(".jardin:checked");
        const selectedSize = document.querySelector(".size:checked");
        const selectedState = document.querySelector(".state:checked");
        const selectedStatus = document.querySelector(".status:checked");
        const searchText = searchBox.value.length > 0;
        const searchJardin = selectedJardin.value.length > 0;
        const searchSize = selectedSize.value.length > 0;
        const searchState = selectedState.value.length > 0;
        const searchStatus = selectedStatus.value.length > 0;

        listItems.forEach((element) => {
            element.classList.remove("d-none");
        });

        // prettier-ignore
        if (searchText || searchJardin || searchSize || searchState || searchStatus) {
            if (searchText) {
                const search = searchBox.value.trim().toLowerCase();
                listItems.forEach((element) => {
                    if (!element.innerText.toLowerCase().includes(search)) {
                        element.classList.add("d-none");
                    }
                });
            }

            if (searchJardin) {
                listItems.forEach((element) => {
                    if (element.dataset.jardin != selectedJardin.value) {
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

            if (searchState) {
                listItems.forEach((element) => {
                    if (element.dataset.state != selectedState.value) {
                        element.classList.add("d-none");
                    }
                });
            }

            if (searchStatus) {
                listItems.forEach((element) => {
                    if (element.dataset.status != selectedStatus.value) {
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
