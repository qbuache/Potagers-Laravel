@props(['sizes'])

<x-card-line name="spread">
    <table class="table table-sm table-round table-boxed table-bordered">
        <tbody>
            <tr>
                @foreach ($sizes as $size)
                    <td>
                        <x-sqm>{{ $size['count'] }} x {{ $size['size'] }}</x-sqm>
                    </td>
                @endforeach
            </tr>
        </tbody>
    </table>
</x-card-line>
