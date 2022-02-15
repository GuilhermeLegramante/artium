<div>
    <div wire:ignore.self id="{{ $modalId }}" class="modal">
        <div style="padding: 0px;" class="modal-content container">
            <div style="height: 3rem;" class="bg-gradient-primary text-white">
                <div class="card-body">
                    <div style="margin-top: -1.5rem;" class="row">
                        <div style="margin-left: -1.5rem" class="col-sm-10">
                            <p><strong>{{ $title }}</strong></p>
                        </div>

                        <div style="margin-top: -0.5rem; margin-right: -1.5rem;" class="col sm-2">
                            <span id="{{ $spanId }}" class="close">&times;</span>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            @include('partials.search-header')

            <div style="max-height: 450px;" class="table-responsive mt-n2">
                <table class="table table-striped table-hover">
                    @include('partials.table-header')
                    @include('partials.table-body')
                </table>
            </div>
        </div>
    </div>
</div>
