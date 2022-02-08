<div>
    @if (session()->has('error'))
        <div wire:ignore class="alert alert-danger">
            <div class="row">
                <div class="col-sm-11">
                    {{ session('error') }}
                </div>
                <div style="padding-left: 5%" class="col-sm-1">
                    <i wire:click="resetFlashMessages" class="mdi mdi-close"></i>
                </div>
            </div>
        </div>
    @endif

    @if (session()->has('success'))
        <div wire:ignore class="alert alert-success">
            <div class="row">
                <div class="col-sm-11">
                    {{ session('success') }}
                </div>
                <div style="padding-left: 5%" class="col-sm-1">
                    <i wire:click="resetFlashMessages" class="mdi mdi-close"></i>
                </div>
            </div>
        </div>
    @endif

</div>
