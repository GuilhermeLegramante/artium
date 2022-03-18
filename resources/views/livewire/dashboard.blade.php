<div>
    <div class="page-header">
        <div wire:loading.delay style="position: fixed; top: 50%; left: 50%; z-index: 99999;">
            <div class="spinner-border" style="width: 3rem; height: 3rem; color:blueviolet">
            </div>
        </div>
        <h3 style="font-size: 1.5rem" class="page-title"><i class="mdi mdi-home"></i> Dashboard</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    
    <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
                    <h4 class="font-weight-normal mb-3">Total de Livros <i class="mdi mdi-library-books mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{ $totalBooks }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
                    <h4 class="font-weight-normal mb-3">Total de Leituras <i class="mdi mdi-book-open-page-variant mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{ $totalReadings }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image">
                    <h4 class="font-weight-normal mb-3">Leituras no Ano <i class="mdi mdi-calendar-multiple-check
                        mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">{{ $yearReadings }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>