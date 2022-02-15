@include('partials.flash-messages')

@include('partials.page-header')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body table-responsive">
            @include('partials.add-search-header')
            <table class="table table-striped table-hover">
                @include('partials.table-header')
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
            </table>
            @include('partials.table-links')
        </div>
    </div>
</div>
