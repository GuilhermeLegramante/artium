<div>
    @include('partials.flash-messages')

    @include('partials.page-header')

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @include('partials.input-text',
                ['label' => 'Nome',
                'model' => 'name',
                'placeholder' => 'Nome completo'
                ])

                @include('partials.footer-crud')

            </div>
        </div>
    </div>
</div>

@push('scripts')
    
@endpush
