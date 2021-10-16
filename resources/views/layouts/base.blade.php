<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="/FrontEnd/img/logo.png" sizes="20x20" type="image/png" />
    <link rel="stylesheet" href="{{asset('/FrontEnd/css/Lib/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{ asset('FrontEnd/css/Lib/bootstrap-4.4.1.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/FrontEnd/css/Lib/nice-select-1.0.css') }}">
    <link rel="stylesheet" href="{{ asset('/FrontEnd/css/Lib/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('/FrontEnd/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('/FrontEnd/css/Lib/meanmenu-2.0.7.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/FrontEnd/css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('/FrontEnd/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('/FrontEnd/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('/FrontEnd/css/Lib/responsive.css') }}">
    @yield('style')
    <link rel="stylesheet" href="{{ asset('backEnd/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>
<body>
<div id="avson">
    <div>
        <div>
            @include('parital.FrontEnd.header')
            <main>
                @yield('content')
            </main>
            @include('parital.FrontEnd.footer')
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('/FrontEnd/js/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('/FrontEnd/js/bootstrap-4.4.1.min.js')}}"></script>
<script src="{{asset('/FrontEnd/js/meanmenu-2.0.7.min.js')}}"></script>
<script src="{{asset('/FrontEnd/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('/FrontEnd/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('/FrontEnd/js/test.js')}}"></script>
<script src="{{asset('backEnd/toastr/toastr.min.js') }}"></script>
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
@yield('scripts')
@yield('scripts_lang')
</body>
</html>
