<div class="d-flex flex-column bd-highlight mb-3">
    <div class="p-2 bd-highlight">
        <button wire:click="callForm" class="add btn btn-gradient-primary font-weight-bold todo-list-add-btn">
            <i class="mdi mdi mdi-plus btn-icon-prepend"></i> Adicionar {{ $entityName }}
        </button>
    </div>
    <div class="p-2 bd-highlight"> <input type="text" wire:model.lazy='search' class="form-control todo-list-input"
            placeholder="Busca por {{ $searchFields }}">
    </div>
</div>
