<x-app-layout>
    <x-page noHeader>
        <h4 class="mb-3">{{ config('myConfig.appName') }}</h4>
        <ul class="m-0">
            <li>
                © <a href="{{ config('myConfig.appOwnerWebsite') }}"
                    target="_blank">{{ config('myConfig.appOwner') }}</a>
            </li>
            <li>Auteur: {{ config('myConfig.appAuthor') }}</li>
            <li>
                Aide:
                <a href="mailto:{{ config('myConfig.appSupport') }}">{{ config('myConfig.appSupport') }}</a>
            </li>
            <li>
                Version: {{ config('myConfig.appVersion') }}
            </li>
        </ul>
    </x-page>
</x-app-layout>
