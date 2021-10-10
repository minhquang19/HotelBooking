@extends('layouts.base')
@section('title', $serviceDetail->name)
@section('active_service', 'active-page')
@section('content')
    <main>
        <section class="breadcrumb-area d-flex align-items-center position-relative bg-img-center"
                 style="background-image: url('/frontEnd/img/bg/breadcrumb-02.jpg');">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h1>{{__('serviceDetail')}}</h1>
                    <ul class="list-inline">
                        <li>
                            <a href="/">{{__('home')}}</a>
                        </li>
                        <li>
                            <i class="fas fa-angle-double-right"></i></i>
                        </li>
                        <li>{{__('serviceDetail')}} </li>
                    </ul>
                </div>
            </div>
            <h1 class="big-text">Service</h1>
        </section>
        <section class="blog-details-wrapper section-padding section-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        @if(App()->getLocale() =='en')
                            <div class="post-details">
                            <div class="entry-header">
                                <div class="post-thumb">
                                    <img src="{{$serviceDetail->image}}" alt="Image">
                                </div>
                                <h2 class="entry-title">{{$serviceDetail->name}} </h2>
                            </div>
                            <div class="entry-content">
                                {!! $serviceDetail->content !!}
                                <div class="entry-gallery-img">
                                    <blockquote>
                                        {{$serviceDetail->description}}
                                    </blockquote>
                                </div>
                            </div>
                            <div class="entry-footer d-flex justify-content-md-between">
                                <ul class="social-share list-inline">
                                    <li class="title">Share</li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-google-plus-g"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @else
                            <div class="post-details">
                                <div class="entry-header">
                                    <div class="post-thumb">
                                        <img src="{{$serviceDetail->image}}" alt="Image">
                                    </div>
                                    <h2 class="entry-title">{{$serviceDetail->name_vi}} </h2>
                                </div>
                                <div class="entry-content">
                                    {!! $serviceDetail->content_vi !!}
                                    <div class="entry-gallery-img">
                                        <blockquote>
                                            {{$serviceDetail->description_vi}}
                                        </blockquote>
                                    </div>
                                </div>
                                <div class="entry-footer d-flex justify-content-md-between">
                                    <ul class="social-share list-inline">
                                        <li class="title">Share</li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-google-plus-g"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
