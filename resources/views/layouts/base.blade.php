<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="/frontEnd/img/logo.png" sizes="20x20" type="image/png" />
    <link rel="stylesheet" href="'/frontEnd/css/Lib/jquery-ui.min.css'">
    <link rel="stylesheet" href="frontEnd/css/Lib/bootstrap-4.4.1.min.css'">
    <link rel="stylesheet" href="/frontEnd/css/Lib/nice-select-1.0.css'">
    <link rel="stylesheet" href="/frontEnd/css/Lib/bootstrap-datepicker.css'">
    <link rel="stylesheet" href="'/frontEnd/css/styles.css'">
    <link rel="stylesheet" href="'/frontEnd/css/Lib/meanmenu-2.0.7.min.css'">
    <link rel="stylesheet" href="'/frontEnd/css/global.css'">
    <link rel="stylesheet" href="'/frontEnd/css/header.css'">
    <link rel="stylesheet" href="'/frontEnd/css/custom.css'">
    <link rel="stylesheet" href="'/frontEnd/css/Lib/responsive.css'">
    @yield('style')
    <link rel="stylesheet" href="backEnd/toastr/toastr.min.css'">
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
            @include('parital.frontEnd.footer')
        </div>
    </div>
</div>
<script src="/frontEnd/js/jquery-1.12.4.min.js"></script>
<script src="/frontEnd/js/bootstrap-4.4.1.min.js"></script>
<script src="/frontEnd/js/meanmenu-2.0.7.min.js'"></script>
<script src="/frontEnd/js/bootstrap-datepicker.js"></script>
<script src="/frontEnd/js/jquery-ui.min.js'"></script>
<script src="/frontEnd/js/test.js')}}"></script>

@yield('scripts')
@yield('scripts_lang')
</body>
</html>
