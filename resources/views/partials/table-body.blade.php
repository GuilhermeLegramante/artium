<tbody>
    @foreach ($data as $item)
        <tr>
            @foreach ($bodyColumns as $column)
                <td>
                    @switch($column['type'])
                        @case('string')
                            {{ $item->{$column['field']} }}
                        @break
                        @case('timestamps')
                            {{ date('d/m/Y H:i:s', strtotime($item->{$column['field']})) }}
                        @break
                        @case('year')
                            {{ date('Y', strtotime($item->{$column['field']})) }}
                        @break
                        @case('button')
                            @include($column['view'])
                        @break
                        @default
                    @endswitch
                </td>
            @endforeach
    @endforeach
</tbody>