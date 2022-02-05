<hr>
<small>{{ $data->firstItem() }} até {{ $data->lastItem() }} de
    {{ $data->total() }} registros.</small>
<div class="d-flex justify-content-center">
    <div>{{ $data->links() }}</div>
</div>
