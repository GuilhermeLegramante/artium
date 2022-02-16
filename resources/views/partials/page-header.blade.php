<div class="page-header">
    <div wire:loading.delay style="position: fixed; top: 50%; left: 50%; z-index: 99999;">
        <div class="spinner-border" style="width: 3rem; height: 3rem; color:blueviolet">
        </div>
    </div>
    <h3 style="font-size: 1.5rem" class="page-title"><i class="{{ $icon }}"></i> {{ $pageTitle }} </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $pageTitle }}</li>
        </ol>
    </nav>
</div>
