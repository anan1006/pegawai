<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restoran</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/logo/logo-hitam.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('modernize/assets/css/styles.min.css') }}" />
    {{-- DATATABLE CSS --}}
    <link rel="stylesheet" href="{{ asset('css/datatable/dataTables.bootstrap5.css') }}">
    {{-- BOOTSTRAP ICON --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    {{-- <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> --}}

    @stack('css')
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        @include('layouts.navbar')
        <!--  Main wrapper -->
        <div class="body-wrapper">
            @include('layouts.header')
            <div class="container-fluid">
                @yield('konten')
            </div>
            <br><br><br>
        </div>
    </div>
    {{-- JQUERY --}}
    <script src="{{ asset('modernize/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    {{-- BOOTSTRAP --}}
    <script src="{{ asset('modernize/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('modernize/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('modernize/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('modernize/assets/libs/simplebar/dist/simplebar.js') }}"></script>
    {{-- DATATABLE --}}
    <script src="{{ asset('js/libs/dataTable/dataTables.js') }}"></script>
    <script src="{{ asset('js/libs/dataTable/dataTables.bootstrap5.js') }}"></script>
    {{-- CHART JS --}}
    <script src="{{ asset('js/libs/chartjs/chart.js') }}"></script>
    {{-- SWEETALERT --}}
    <script src="{{ asset('js/libs/sweetalert/sweetalert2@11.js') }}"></script>
    <script src="{{ asset('js/scriptdashboard.js') }}"></script>
    <script>
        @if (session('success'))
            Swal.fire({
                title: "Success",
                text: "{{ session('success') }}",
                icon: "success"
            });
        @elseif (session('error'))
            Swal.fire({
                title: "Gagal",
                text: "{{ session('error') }}",
                icon: "error"
            });
        @endif
    </script>


    @stack('scripts')
</body>

</html>
