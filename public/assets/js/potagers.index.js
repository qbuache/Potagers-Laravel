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
        el.addEventListener("change", search)
    );

    function search() {
        const selectedJardin = document.querySelector(".jardin:checked");
        const selectedSize = document.querySelector(".size:checked");
        const selectedState = document.querySelector(".state:checked");
        const selectedStatus = document.querySelector(".status:checked");
        const searchingText = searchBox.value.length > 0;
        const searchingJardin = selectedJardin.value.length > 0;
        const searchingSize = selectedSize.value.length > 0;
        const searchingState = selectedState.value.length > 0;
        const searchingStatus = selectedStatus.value.length > 0;

        listItems.forEach((element) => {
            element.classList.remove("d-none");
        });

        // prettier-ignore
        if (searchingText || searchingJardin || searchingSize || searchingState || searchingStatus) {
            if (searchingText) {
                const search = searchBox.value.trim().toLowerCase();
                listItems.forEach((element) => {
                    if (!element.innerText.toLowerCase().includes(search)) {
                        element.classList.add("d-none");
                    }
                });
            }

            isSearchingWithRadio(searchingJardin, selectedJardin, "jardin");
            isSearchingWithRadio(searchingSize, selectedSize, "size");
            isSearchingWithRadio(searchingState, selectedState, "state");
            isSearchingWithRadio(searchingStatus, selectedStatus, "status");

            displayNoResult(
                document.querySelectorAll(".potager:not(.d-none)").length < 1
            );
        } else {
            displayNoResult(false);
        }
    }

    function isSearchingWithRadio(searching, search, searchBy) {
        if (searching) {
            listItems.forEach((element) => {
                if (element.dataset[searchBy] != search.value) {
                    element.classList.add("d-none");
                }
            });
        }
    }

    function displayNoResult(toggle) {
        noResult.style.display = toggle ? "block" : "none";
        potagers.style.display = toggle ? "none" : "block";
    }
})();
