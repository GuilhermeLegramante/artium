@extends('template.master')

@section('body')
    <div class="container-scroller">
        @include('partials.main-navbar')

        <div class="container-fluid page-body-wrapper">
            @include('partials.main-menu')

            <div class="main-panel">
                <div class="content-wrapper">
                    {{ $slot }}
                </div>
                <footer class="footer">
                    <div class="container-fluid d-flex justify-content-between">
                        <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © Guilherme
                            Legramante {{ date('Y') }}</span>
                    </div>
                </footer>
            </div>
        </div>
    </div>
@endsection
