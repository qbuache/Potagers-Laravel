Jardin = (data) => {
    const templatePill = document.getElementById("template-jardin-pill");
    const templateLine = document.getElementById("template-jardin-line");
    const imageWrapper = document.getElementById("imageWrapper");
    const image = document.getElementById("image");
    const jardinsList = document.getElementById("jardinsList");
    const inputNextJardin = document.getElementById("nextJardin");
    const canDrawJardin = templatePill != null;
    const canListJardin = templateLine != null && jardinsList;

    let existingJardins = data.existingJardins.map((jardin) => ({
        ...jardin,
        new: false,
    }));
    let {
        creating = false,
        editing = false,
        increment = false,
        url = null,
    } = data;
    let newJardins = [];

    function addJardin(jardin) {
        if (canListJardin) {
            const clone = templateLine.content.cloneNode(true);
            clone.querySelector(".jardin__line").dataset.name = jardin.slug;
            clone.querySelector(".jardin__name").value = jardin.name;
            clone.querySelector(".jardin__coordinates").value = JSON.stringify(
                jardin.coordinates
            );
            clone.querySelector(".jardin__delete").dataset.name = jardin.slug;
            jardinsList.appendChild(clone);
            jardinsList.lastElementChild
                .querySelector(".jardin__delete")
                .addEventListener("click", (event) =>
                    deleteJardin(event.target.dataset.name)
                );
        }
        document.getElementById("coordinates").value = JSON.stringify(
            jardin.coordinates
        );

        newJardins.push(jardin);
        drawJardin(jardin);
    }

    function editJardin(jardin) {
        document.getElementById("coordinates").value = JSON.stringify(
            jardin.coordinates
        );
        deleteJardin(jardin.name);
        drawJardin(jardin);
    }

    function deleteJardin(name) {
        deleteJardinLine(name);
        deleteJardinPill(name);
        newJardins = newJardins.filter(
            (filterJardin) => filterJardin.name != name
        );
    }

    function deleteJardinPill(name) {
        document.querySelector(`.jardin__pill[data-name="${name}"]`)?.remove();
    }

    function deleteJardinLine(name) {
        document.querySelector(`.jardin__line[data-name="${name}"]`)?.remove();
    }

    function drawJardin(jardin) {
        if (canDrawJardin) {
            deleteJardinPill(jardin.slug);

            const fixX = image.width / image.naturalWidth;
            const fixY = image.height / image.naturalHeight;
            const clone = templatePill.content.cloneNode(true);

            clone.querySelector(".jardin__pill").dataset.name = jardin.slug;
            clone
                .querySelector(".jardin__pill")
                .classList.add(jardin.new ? "bg-jaune" : "bg-custom");
            clone.querySelector(".jardin__link").textContent = jardin.name;
            if (url) {
                clone.querySelector(
                    ".jardin__link"
                ).href = `${url}/${jardin.slug}`;
            }
            imageWrapper.appendChild(clone);
            const pill = imageWrapper.lastElementChild;
            pill.style.left = `${jardin.coordinates.x * fixX}px`;
            pill.style.top = `${jardin.coordinates.y * fixY}px`;
        }
    }

    function redrawJardins(jardins) {
        jardins.forEach((jardin) => drawJardin(jardin));
    }

    function setCrossHairCursor() {
        if (creating || editing) {
            image.style.cursor = "crosshair";
        }
    }

    function addEventListeners() {
        document.querySelectorAll(".jardin__hover").forEach((element) => {
            element.addEventListener("mouseleave", () => {
                document
                    .querySelectorAll(".jardin__pill")
                    .forEach((element) => {
                        element.classList.remove("active");
                    });
            });
            element.addEventListener("mouseenter", (event) => {
                document
                    .querySelector(
                        `.jardin__pill[data-name="${event.target.dataset.name}"]`
                    )
                    .classList.add("active");
            });
        });

        if (creating || editing) {
            let nextJardin = "ICI";
            if (inputNextJardin) {
                nextJardin = inputNextJardin.value;
                inputNextJardin.addEventListener("change", () => {
                    nextJardin = inputNextJardin.value;
                });
            }

            image.addEventListener("click", (event) => {
                const rect = event.target.getBoundingClientRect();
                if (creating) {
                    addJardin({
                        name: nextJardin,
                        new: true,
                        coordinates: {
                            x: Math.round(event.clientX - rect.left),
                            y: Math.round(event.clientY - rect.top),
                        },
                    });
                    if (increment) {
                        nextJardin++;
                    }
                    if (inputNextJardin) {
                        inputNextJardin.value = nextJardin;
                    }
                } else if (editing) {
                    const jardin = existingJardins[0];
                    jardin.new = true;
                    jardin.coordinates = {
                        x: Math.round(event.clientX - rect.left),
                        y: Math.round(event.clientY - rect.top),
                    };
                    editJardin(jardin);
                }
            });
        }

        addEventListener("resize", () => {
            redrawJardins([...existingJardins, ...newJardins]);
        });
    }

    function init() {
        redrawJardins(existingJardins);
        setCrossHairCursor();
        addEventListeners();
    }

    return { init };
};
