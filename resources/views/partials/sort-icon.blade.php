@if ($item['field'])
    <th wire:click="sortBy('{{ $item['field'] }}')" )>
    @else
    <th>
@endif
{{ $item['label'] }}
@isset($item['field'])
    @if ($sortBy !== $item['field'])
        <i style="color: lightgray" class="mdi mdi-arrow-up"></i>
        <i style="color: lightgray" class="mdi mdi-arrow-down"></i>
    @elseif ($sortDirection == 'asc')
        <i style="color: black" class="mdi mdi-arrow-up"></i>
        <i style="color: lightgray" class="mdi mdi-arrow-down"></i>
    @else
        <i style="color: lightgray" class="mdi mdi-arrow-up"></i>
        <i style="color: black" class="mdi mdi-arrow-down"></i>
    @endif
@endisset
</th>
