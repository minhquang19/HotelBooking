@extends('layouts.base')
@section('title', 'Login')
@section('style')
    <link rel="stylesheet" href="/frontEnd/css/register.css" />

@endsection
@section('content')
    <div class="global-container container">
        <div class="card login-form">
            <div class="card-body">
                <h2 class="text-login"> {{__('register')}}</h2>
                <div class="card-text">
                    <!--
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!-- to error: add class "has-danger" -->
                        <div class="form-group">
                            <label class="label" for="email">{{ __('email') }}</label>
                            <input name="email" type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" id="email" required autocomplete="email" >
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="label" for="fullname">{{__('name')}}</label>
                            <input name="name" type="text" class="form-control form-control-sm" id="fullname">
                        </div>
                        <div class="form-group">
                            <label class="label" for="phonenumber">{{__('phone')}}</label>
                            <input name="phonenumber" type="text" class="form-control form-control-sm" id="phonenumber">
                        </div>
                        <div class="form-group">
                            <label class="label" for="address">{{__('address')}}</label>

                            <input type="text" name="address" class="form-control form-control-sm" id="address">
                        </div>
                            <div class="form-group">
                                <label class="label" for="sex">{{__('gender')}}</label>
                                <div class="gender">
                                    <input type='radio' id='male' checked='' name='sex' value="male">
                                    <label for='male'>{{__('Male')}}</label>
                                    <input type='radio' id='female' name='sex' value="female">
                                    <label for='female'>{{__('Female')}}</label>
                                </div>

                            </div>
                        <div class="form-group">
                            <label class="label" for="password">{{__('password')}}</label>
                            <input  name="password" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" id="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                            <div class="form-group">
                                <label class="label" for="password-confirm">{{__('confirmpass')}}</label>
                                <input  name="password_confirmation" required autocomplete="new-password" id="password-confirm" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" id="password">

                            </div>
                        <button type="submit" class="btn-login btn-primary btn-block">{{__('register')}}</button>
                        <div class="sign-up">
                            {{__('haveaccount')}}  <a href="{{route('login')}}">{{__('login')}}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
