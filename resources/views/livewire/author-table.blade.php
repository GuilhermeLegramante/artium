<div>
    @include('partials.page-header', ['title' => 'Autores', 'icon' => 'mdi mdi-account-multiple'])

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body table-responsive">
                @include('partials.table-header', ['field' => 'Autor', 'search' => 'Código ou Nome'])

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th> Código </th>
                            <th> Nome </th>
                            <th> Data de Inclusão </th>
                            <th> Data de Edição </th>
                            <th> Ações </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>
                                    {{ $item->id }}
                                </td>
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td>
                                    {{ date('d/m/Y H:i:s', strtotime($item->created_at)) }}
                                </td>
                                <td>
                                    {{ date('d/m/Y H:i:s', strtotime($item->updated_at)) }}
                                </td>
                                <td>
                                    <button title="Editar o Registro" type="button"
                                        class="btn btn-xs btn-gradient-danger">
                                        <i class="mdi mdi-table-edit btn-icon-prepend"></i> </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @include('partials.table-links')
            </div>
        </div>
    </div>
</div>
