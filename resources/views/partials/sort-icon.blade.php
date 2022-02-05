<th wire:click="sortBy('{{ $field }}')">
    {{ $label }}
    @if ($sortBy !== $field)
        <i style="color: lightgray" class="mdi mdi-arrow-up"></i>
        <i style="color: lightgray" class="mdi mdi-arrow-down"></i>
    @elseif ($sortDirection == 'asc')
        <i style="color: black" class="mdi mdi-arrow-up"></i>
        <i style="color: lightgray" class="mdi mdi-arrow-down"></i>
    @else
        <i style="color: lightgray" class="mdi mdi-arrow-up"></i>
        <i style="color: black" class="mdi mdi-arrow-down"></i>
    @endif
</th>
