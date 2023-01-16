(() => {
    const searchBox = document.getElementById("searchBox");
    const noResult = document.getElementById("noResult");
    const potagers = document.getElementById("potagers");
    const listItems = document.querySelectorAll(".list-group-item");
    searchBox.addEventListener("input", () => {
        if (searchBox.value.length) {
            let shown = 0;
            const search = searchBox.value.trim().toLowerCase();
            listItems.forEach((element) => {
                if (!element.innerText.toLowerCase().includes(search)) {
                    element.classList.add("d-none");
                } else {
                    element.classList.remove("d-none");
                    shown++;
                }
            });

            displayNoResult(shown < 1);
        } else {
            listItems.forEach((element) => {
                element.classList.remove("d-none");
            });
            displayNoResult(false);
        }
    });

    function displayNoResult(toggle) {
        noResult.style.display = toggle ? "block" : "none";
        potagers.style.display = toggle ? "none" : "block";
    }
})();
