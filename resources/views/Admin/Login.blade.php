<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Page-->
    <title>Login to admin page</title>
    @yield('tabcontrol')
<!-- Fontfaces CSS-->
    <link href="{{ asset('Admin/css/font-face.css" rel="stylesheet') }}" media="all">
    <link href="{{ asset('Admin/vendor/font-awesome-4.7/css/font-awesome.min.css') }} " rel="stylesheet" media="all">
    <link href="{{ asset('Admin/vendor/font-awesome-5/css/fontawesome-all.min.css') }} " rel="stylesheet" media="all">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datepicker.css')}}" />
    <!-- Bootstrap CSS-->
    <link href="{{ asset('admin/vendor/bootstrap-4.1/bootstrap.min.css') }} " rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('Admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }} " rel="stylesheet" media="all">
    <link rel="stylesheet" href="{{ asset('Admin/toastr/toastr.min.css') }}">

    <!-- Main CSS-->
    <link href="{{ asset('Admin/css/theme.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('Admin/css/custom.css') }}" rel="stylesheet" media="all">
</head>

<body class="animsition">
<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="#">
                            <img src="/frontEnd/img/logo.png" alt="Admin Moon Light">
                        </a>
                    </div>
                    <div class="login-form">
                        <form action="{{ route('admin.login') }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label>Email Address</label>
                                <input class="au-input au-input--full" type="email" name="email" placeholder="Email" :value="old('email')" required autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input value="12345678" class="au-input au-input--full" type="password" name="password" placeholder="Password" required autocomplete="current-password" @error('password') is-invalid @enderror">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="login-checkbox">
                                <label>
                                    <input type="checkbox" name="remember">Remember Me
                                </label>
                            </div>
                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Jquery JS-->

<script src="backEnd/vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->

<!-- Main JS-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Jquery JS-->
<script src="{{ asset('Admin/vendor/jquery-3.2.1.min.js') }}"></script>
<!-- Bootstrap JS-->
<script src="{{ asset('Admin/vendor/bootstrap-4.1/popper.min.js') }}"></script>
<script src="{{ asset('Admin/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
<script src="{{ asset('Admin/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('//cdn.jsdelivr.net/npm/sweetalert2@10') }}"></script>
<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js') }}" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
<!-- Main JS-->
<script src="{{ asset('Admin/js/main.js') }}"></script>
<script src="https://cdn.tiny.cloud/1/30bff92iyitr99sd2d33td5ist5pzk1bta8ygh5u79slj1re/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@yield('scripts')
</body>

</html>
<!-- end document-->
