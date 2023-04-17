Potager = (data) => {
    const templatePill = document.getElementById("template-potager-pill");
    const templateLine = document.getElementById("template-potager-line");
    const imageWrapper = document.getElementById("imageWrapper");
    const image = document.getElementById("image");
    const potagersList = document.getElementById("potagersList");
    const inputNextPotager = document.getElementById("nextPotager");
    const canDrawPotager = templatePill != null;
    const canListPotager = templateLine != null && potagersList;

    let existingPotagers = data.existingPotagers.map((potager) => ({
        ...potager,
        new: false,
    }));
    let {
        creating = false,
        editing = false,
        increment = false,
        showAttribution = true,
        showState = true,
        url = null,
    } = data;
    let newPotagers = [];

    function addPotager(potager) {
        if (canListPotager) {
            const clone = templateLine.content.cloneNode(true);
            clone.querySelector(".potager__line").dataset.name = potager.name;
            clone.querySelector(".potager__name").value = potager.name;
            clone.querySelector(".potager__coordinates").value = JSON.stringify(
                potager.coordinates
            );
            clone.querySelector(".potager__delete").dataset.name = potager.name;
            potagersList.appendChild(clone);
            potagersList.lastElementChild
                .querySelector(".potager__delete")
                .addEventListener("click", (event) =>
                    deletePotager(event.target.dataset.name)
                );
        }

        newPotagers.push(potager);
        drawPotager(potager);
    }

    function editPotager(potager) {
        document.getElementById("coordinates").value = JSON.stringify(
            potager.coordinates
        );
        deletePotager(potager.name);
        drawPotager(potager);
    }

    function deletePotager(name) {
        deletePotagerLine(name);
        deletePotagerPill(name);
        newPotagers = newPotagers.filter(
            (filterPotager) => filterPotager.name != name
        );
    }

    function deletePotagerPill(name) {
        document.querySelector(`.potager__pill[data-name="${name}"]`)?.remove();
    }

    function deletePotagerLine(name) {
        document.querySelector(`.potager__line[data-name="${name}"]`)?.remove();
    }

    function drawPotager(potager) {
        if (canDrawPotager) {
            deletePotagerPill(potager.name);

            const fixX = image.width / image.naturalWidth;
            const fixY = image.height / image.naturalHeight;
            const clone = templatePill.content.cloneNode(true);
            clone.querySelector(".potager__pill").dataset.name = potager.name;
            clone
                .querySelector(".potager__pill")
                .classList.add(potager.new ? "bg-jaune" : "bg-custom");
            clone.querySelector(".potager__link").textContent = potager.name;
            if (url) {
                clone.querySelector(
                    ".potager__link"
                ).href = `${url}/${potager.id}`;
            }
            imageWrapper.appendChild(clone);
            const pill = imageWrapper.lastElementChild;
            pill.style.left = `${potager.coordinates.x * fixX}px`;
            pill.style.top = `${potager.coordinates.y * fixY}px`;

            if (showAttribution) {
                const userTooltip = imageWrapper.lastElementChild.querySelector(
                    ".potager__user[data-bs-toggle='tooltip']"
                );
                userTooltip.classList.add(
                    potager.jardinier?.id ? "text-vert" : "text-bleu"
                );
                userTooltip.style.display = "block";
                userTooltip.dataset.bsTitle = potager.jardinier?.id
                    ? "Attribué"
                    : "Libre";
                new bootstrap.Tooltip(userTooltip);
            }

            if (showState && potager.state && potager.state != "ok") {
                const stateTooltip =
                    imageWrapper.lastElementChild.querySelector(
                        ".potager__state[data-bs-toggle='tooltip']"
                    );
                stateTooltip.style.display = "block";
                stateTooltip.dataset.bsTitle = potager.state_text;
                new bootstrap.Tooltip(stateTooltip);
            }
        }
    }

    function redrawPotagers(potagers) {
        potagers.forEach((potager) => drawPotager(potager));
    }

    function setCrossHairCursor() {
        if (creating || editing) {
            image.style.cursor = "crosshair";
        }
    }

    function addEventListeners() {
        document.querySelectorAll(".potager__hover").forEach((element) => {
            element.addEventListener("mouseleave", () => {
                document
                    .querySelectorAll(".potager__pill")
                    .forEach((element) => {
                        element.classList.remove("active");
                    });
            });
            element.addEventListener("mouseenter", (event) => {
                document
                    .querySelector(
                        `.potager__pill[data-name="${event.target.dataset.name}"]`
                    )
                    .classList.add("active");
            });
        });

        if (creating || editing) {
            let nextPotager = "";
            if (inputNextPotager) {
                nextPotager = inputNextPotager.value;
                inputNextPotager.addEventListener("change", () => {
                    nextPotager = inputNextPotager.value;
                });
            }

            image.addEventListener("click", (event) => {
                const rect = event.target.getBoundingClientRect();
                if (creating) {
                    addPotager({
                        name: nextPotager,
                        new: true,
                        coordinates: {
                            x: Math.round(event.clientX - rect.left),
                            y: Math.round(event.clientY - rect.top),
                        },
                    });
                    if (increment) {
                        nextPotager++;
                    }
                    if (inputNextPotager) {
                        inputNextPotager.value = nextPotager;
                    }
                } else if (editing) {
                    const potager = existingPotagers[0];
                    potager.new = true;
                    potager.coordinates = {
                        x: Math.round(event.clientX - rect.left),
                        y: Math.round(event.clientY - rect.top),
                    };
                    editPotager(potager);
                }
            });
        }

        addEventListener("resize", () => {
            redrawPotagers([...existingPotagers, ...newPotagers]);
        });
    }

    function init() {
        redrawPotagers(existingPotagers);
        setCrossHairCursor();
        addEventListeners();
    }

    return { init };
};
