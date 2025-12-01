<!DOCTYPE html>
<html
    lang="en"
    dir="ltr"
    data-bs-theme="light"
    data-color-theme="Aqua_Theme"
    data-layout="vertical"
>
    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- Favicon icon-->
        <link
            rel="shortcut icon"
            type="image/png"
            href="{{ asset('assets/images/logos/logo.png') }}"
        />

        <!-- Core Css -->
        <link
            rel="stylesheet"
            href="{{ asset('assets/css/styles.css?v=1.4') }}"
        />
        <!-- Datatable -->
        <link
            rel="stylesheet"
            href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}"
        />

        <title>{{ $title }}</title>
    </head>

    <body>

        <div id="main-wrapper">
            {{-- SIDEBAR --}}
            @include('layout.sidebar')
            <div class="page-wrapper">
                {{-- HEADER --}} 
                @include('layout.header')
                {{-- CONTENT --}}
                @yield('content')
            </div>
        </div>

        @if(session('alert'))
        <div class="toast toast-onload align-items-center text-bg-{{ session('alert.type') }} border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body hstack align-items-start gap-6">
                <i class="ti ti-alert-circle fs-6"></i>
                <div>
                    <h5 class="text-white fs-3 mb-1">{{ session('alert.title') }}</h5>
                    <h6 class="text-white fs-2 mb-0">{{ session('alert.message') }}</h6>
                </div>
                <button type="button" class="btn-close btn-close-white fs-2 m-0 ms-auto shadow-none" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
        @endif

        <div class="dark-transparent sidebartoggler"></div>

        <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
        <!-- Import Js Files -->
        <script src="{{ asset('assets/js/breadcrumb/breadcrumbChart.js') }}"></script>
        <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/js/theme/app.init.js') }}"></script>
        <script src="{{ asset('assets/js/theme/theme.js') }}"></script>
        <script src="{{ asset('assets/js/theme/app.min.js') }}"></script>
        <script src="{{ asset('assets/js/theme/sidebarmenu.js') }}"></script>
        <script src="{{ asset('assets/js/theme/feather.min.js') }}"></script>
        <!-- solar icons -->
        <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
        <script src="{{ asset('assets/js/dashboards/dashboard1.js') }}"></script>
        <!-- Datatable -->
        <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatable-basic.init.js') }}"></script>
        {{-- Form Step --}}
        <script src="{{ asset('assets/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
        <script src="{{ asset('assets/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('assets/js/forms/form-wizard.js') }}"></script>
        <script>
            $(".floating-labels .form-control")
                .on("focus blur", function (e) {
                    $(this)
                        .parents(".form-group")
                        .toggleClass(
                            "focused",
                            e.type === "focus" || this.value.length > 0
                        );
                })
                .trigger("blur");
        </script>

    </body>
</html>
