<x-app-layout>
    <div class="col-lg-10 mx-auto">
        <x-page>
            <form
                action="{{ route('users.permissions', $user->id) }}"
                method="POST"
            >
                @csrf
                @method('PATCH')
                <x-validation-errors class="mb-3" />
                <div class="list-group">
                    @foreach ($roles as $role)
                        <div class="list-group-item">
                            <label class="d-flex flex-column">
                                <x-form.simple.checkbox
                                    id="{{ $role->name }}"
                                    name="roles[]"
                                    value="{{ $role->name }}"
                                    disabled="{{ $role->name === Permissions::ADMIN &&
                                        !auth()->user()->hasRole(Permissions::ADMIN) }}"
                                    checked="{{ $user->roles->contains('name', $role->name) }}"
                                    chkLabel='{{ __("messages.label.{$role->name}") }}'
                                    switch
                                />
                                <small class="text-muted">{{ __("messages.text.{$role->name}") }}</small>
                            </label>

                        </div>
                    @endforeach
                </div>
                <x-form.submit />
            </form>
        </x-page>
    </div>
    <script>
        (() => {
            const checkboxes = document.querySelectorAll(".form-check-input");
            checkboxes.forEach(element => element.addEventListener("change", (
                event) => {
                const nothingChecked = ![...checkboxes].map(checkbox => checkbox.checked).some(checked =>
                    checked);
                checkboxes.forEach(checkbox => checkbox.required = nothingChecked)
            }))
        })()
    </script>
</x-app-layout>
