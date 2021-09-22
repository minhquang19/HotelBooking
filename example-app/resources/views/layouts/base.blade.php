<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="assets/img/favicon.png" sizes="20x20" type="image/png" />
    <link rel="stylesheet" href="/assets/css/jquery-ui.min.css" />
    <link rel="stylesheet" href="/assets/css/all.min.css" />
    <link rel="stylesheet" href="/assets/css/bootstrap-4.4.1.min.css" />
    <link rel="stylesheet" href="/assets/css/animate.css" />
    <link rel="stylesheet" href="/assets/css/magnific-popup-1.1.0.css" />
    <link rel="stylesheet" href="/assets/css/nice-select-1.0.css" />
    <link rel="stylesheet" href="/assets/css/meanmenu-2.0.7.min.css" />
    @yield('style')
    <link rel="stylesheet" href="/assets/css/bootstrap-datepicker.css" />
    <link rel="stylesheet" href="/assets/css/styles1.css" />
    <link rel="stylesheet" href="/assets/css/custom.css" />
    <link rel="stylesheet" href="/assets/css/responsive.css"/>
    <link rel="stylesheet" href="{{ asset('admin/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>
<body>
<div id="avson">
    <div>
        <div>
            @include('parital.frontEnd.header')
            <main>
                @yield('content')
            </main>
            @include('parital\frontEnd\footer')
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="/assets/js/modernizr-3.6.0.min.js"></script>
<script src="/assets/js/jquery-1.12.4.min.js"></script>
<script src="/assets/js/popper.min-1.16.0.js"></script>
<script src="/assets/js/bootstrap-4.4.1.min.js"></script>
<script src="/assets/js/meanmenu-2.0.7.min.js"></script>
<script src="/assets/js/wow-1.1.3.min.js"></script>
<script src="/assets/js/jquery.inview.min.js"></script>
<script src="/assets/js/waypoints-2.0.3.min.js"></script>

<script src="/assets/js/bootstrap-datepicker.js"></script>
<script src="/assets/js/jquery-ui.min.js"></script>
<script src="/assets/js/test.js"></script>
<script src="{{ asset('admin/toastr/toastr.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
@yield('scripts')
<script>
</script>
</body>
</html>
