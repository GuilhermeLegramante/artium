<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Artium</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">


    @livewireStyles

    

</head>

<body>
    <div class="container-scroller">
        @include('partials.main-navbar')

        <div class="container-fluid page-body-wrapper">
            @include('partials.main-menu')

            @include('sweetalert::alert')

            <div class="main-panel">
                <div class="content-wrapper">
                    {{ $slot }}
                </div>
                <footer class="footer">
                    <div class="container-fluid d-flex justify-content-between">
                        <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright ©
                            Guilherme
                            Legramante {{ date('Y') }}</span>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    @livewireScripts


    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    {{-- <script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script> --}}
    <script src="{{ asset('assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    {{-- <script src="{{ asset('assets/js/off-canvas.js') }}"></script> --}}
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>

    <script src="{{ asset('js/scripts.js') }}"></script>

</body>

</html>
