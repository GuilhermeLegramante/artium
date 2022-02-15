<div>
    @include('partials.crud-header')
    
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @yield('form')

                @include('partials.footer-crud')
            </div>
        </div>
    </div>
</div>