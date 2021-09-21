@extends('layouts.base')
@section('title', $detail->name)
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
                    <div class="col-lg-8">
                        <div class="post-details">
                            <div class="entry-header">
                                <div class="post-thumb">
                                    <img src="/upload/service/{{$detail->image}}" alt="Image">
                                </div>
                                <h2 class="entry-title">{{$detail->name}} </h2>
                            </div>
                            <div class="entry-content">
                                {!! $detail->content !!}
                                <div class="entry-gallery-img">
                                    <blockquote>
                                        {{$detail->description}}
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
                    </div>
                    <div class="col-lg-4">
                        <div class="sidebar-wrap">
                            <div class="widget search-widget">
                                <h4 class="widget-title">Search Here</h4>
                                <form>
                                    <input type="text" placeholder="Seacrh Keywords">
                                    <button>
                                        <i class="fas fa-search"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="widget banner-widget avson-go-top"
                                 style="background-image: url(&quot;/assets/img/blog/sidebar-banner.jpg&quot;);">
                                <h2>Booking Your Latest apartment</h2>
                                <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit sed do eiusmod tempor
                                    incididunt ut labore </p>
                                <a class="btn filled-btn" href="/room-details">BOOK NOW
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
