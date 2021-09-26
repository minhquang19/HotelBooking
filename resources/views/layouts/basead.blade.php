<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Page-->
    <title>@yield('title')</title>
    @yield('tabcontrol')
    @yield('style')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <!-- Fontfaces CSS-->
    <link href="{{ asset('backEnd/css/font-face.css" rel="stylesheet') }}" media="all">
    <link href="{{ asset('backEnd/vendor/font-awesome-4.7/css/font-awesome.min.css') }} " rel="stylesheet" media="all">
    <link href="{{ asset('backEnd/vendor/font-awesome-5/css/fontawesome-all.min.css') }} " rel="stylesheet" media="all">
    <link href="{{ asset('backEnd/vendor/mdi-font/css/material-design-iconic-font.min.css') }} " rel="stylesheet" media="all">
    <!-- Bootstrap CSS-->
    <link href="{{ asset('backEnd/vendor/bootstrap-4.1/bootstrap.min.css') }} " rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('backEnd/vendor/animsition/animsition.min.css') }} " rel="stylesheet" media="all">
    <link href="{{ asset('backEnd/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }} " rel="stylesheet" media="all">
    <link href="{{ asset('backEnd/vendor/wow/animate.css') }} " rel="stylesheet" media="all">
    <link href="{{ asset('backEnd/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('backEnd/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('backEnd/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('backEnd/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">
    <link rel="stylesheet" href="{{ asset('admin/toastr/toastr.min.css') }}">

    <!-- Main CSS-->
    <link href="{{ asset('backEnd/css/theme.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('backEnd/css/custom.css') }}" rel="stylesheet" media="all">
</head>

<body class="">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        @include('parital\admin\headermobile')
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        @include('parital\admin\menusidebar')
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            @include('parital\admin\headerdesktop')
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            @yield('content')
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
    <script src="https://cdn.tiny.cloud/1/30bff92iyitr99sd2d33td5ist5pzk1bta8ygh5u79slj1re/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Jquery JS-->
    <script src="{{ asset('backEnd/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('backEnd/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('backEnd/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('backEnd/vendor/slick/slick.min.js') }}">
    </script>
    <script src="{{ asset('backEnd/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('backEnd/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('backEnd/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
    </script>
    <script src="{{ asset('backEnd/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('backEnd/vendor/counter-up/jquery.counterup.min.js') }}">
    </script>
    <script src="{{ asset('backEnd/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('backEnd/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('backEnd/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('backEnd/vendor/select2/select2.min.js') }}">
    </script>
    <script src="{{ asset('backEnd/toastr/toastr.min.js') }}"></script>
    <!-- Main JS-->
    <script src="{{ asset('backEnd/js/main.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    @yield('scripts')
    @if(Session::has('success'))
        <script>
            toastr.success("{{ session("success") }}")
        </script>
    @endif
    @if(Session::has('error'))
        <script>
            toastr.error("{{ session("error") }}")
        </script>
    @endif
</body>

</html>
<!-- end document-->
