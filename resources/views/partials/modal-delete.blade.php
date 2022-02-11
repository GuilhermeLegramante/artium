<!-- The Modal -->
<div id="modal-delete" class="modal">
    <!-- Modal content -->
    <div style="padding: 0px;" class="modal-content container">
        <div style="height: 3rem;" class="bg-gradient-danger text-white">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-10">
                        <p><strong>ATENÇÃO</strong></p>
                    </div>
                    <div style="margin-top: -0.5rem" class="col sm-2">
                        <span id="spanClose" class="close">&times;</span>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div style="padding-left: 2rem; padding-right: 2rem;" class="col-sm-12">
                <p class="text-secondary">Deseja realmente excluir o registro?</p>
            </div>
        </div>
        <div class="d-flex flex-row-reverse bd-highlight">
            <div class="p-2 bd-highlight">
                <button wire:click='destroy' class="btn btn-gradient-danger">Sim</button>
            </div>
            <div class="p-2 bd-highlight">
                <button id="btnClose" class="btn btn-gradient-light btn-fw">Cancelar</button>
            </div>
        </div>
    </div>
</div>
