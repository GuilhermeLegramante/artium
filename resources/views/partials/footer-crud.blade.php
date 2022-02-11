<button wire:click='{{ $method }}' class="btn btn-gradient-primary me-2">Salvar</button>
@if ($method == 'update')
    <button id="btnOpen" data-toggle="modal" data-target="#modal-delete" class="btn btn-gradient-danger me-2">Excluir</button>
@endif
<button wire:click='redirectToPreviousRoute' class="btn btn-gradient-light btn-fw">Cancelar</button>
