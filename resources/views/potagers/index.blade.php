<x-app-layout>
    <x-page>
        <input
            class="form-control"
            id="searchBox"
            type="search"
            placeholder="Rechercher..."
        >
        <div
            class="rounded p-0 mt-3"
            id="potagers"
        >
            <div class="list-group list-group-flush border border-bottom-0 overflow-hidden rounded">
                @forelse($potagers as $potager)
                    <a
                        class="list-group-item list-group-item-action d-flex justify-content-between border-bottom align-items-center"
                        href="{{ url("potagers/{$potager->id}") }}"
                    >
                        <span>{{ $potager->name }}</span>
                        <small class="text-muted">{{ $potager->jardin->name }}</small>
                    </a>
                @empty
                    <x-alert>Il n'y a pas de potager</x-alert>
                @endforelse
            </div>
        </div>
        <x-alert
            class="mt-3"
            id="noResult"
            style="display:none"
        >Pas de résultat</x-alert>
    </x-page>
</x-app-layout>

<script>
    (() => {
        const searchBox = document.getElementById("searchBox")
        const noResult = document.getElementById("noResult")
        const potagers = document.getElementById("potagers")
        const listItems = document.querySelectorAll(".list-group-item");
        searchBox.addEventListener("input", () => {
            if (searchBox.value.length) {
                let shown = 0;
                const search = searchBox.value.trim().toLowerCase();
                listItems.forEach(element => {
                    if (!element.innerText.toLowerCase().includes(search)) {
                        element.classList.add("d-none")
                    } else {
                        element.classList.remove("d-none")
                        shown++;
                    }
                });

                displayNoResult(shown < 1);
            } else {
                listItems.forEach(element => {
                    element.classList.remove("d-none")
                });
                displayNoResult(false);
            }
        })

        function displayNoResult(toggle) {
            noResult.style.display = toggle ? "block" : "none";
            potagers.style.display = toggle ? "none" : "block";
        }
    })()
</script>
