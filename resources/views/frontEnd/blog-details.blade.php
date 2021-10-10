@extends('layouts.base')
@section('title',$detailBlog->title)
@section('active_blog', 'active-page')
@section('content')
    <main>
        <section class="breadcrumb-area d-flex align-items-center position-relative bg-img-center"
                 style="background-image: url(/frontEnd/img/bg/breadcrumb-02.jpg);">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h1>{{__('blogDetail')}}</h1>
                    <ul class="list-inline">
                        <li>
                            <a href="/">{{__('home')}}</a>
                        </li>
                        <li>
                            <i class="fas fa-angle-double-right"></i></i>
                        </li>
                        <li>{{__('blogDetail')}}</li>
                    </ul>
                </div>
            </div>
            <h1 class="big-text">Room</h1>
        </section>
        <section class="blog-details-wrapper section-padding section-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="post-details" style=" width: 90%;margin: 0 auto;">
                            <div class="entry-header">
                                <div class="post-thumb">
                                    <img src="{{asset($detailBlog->coverImage)}}" alt="Image">
                                </div>
                                <ul class="entry-meta list-inline">
                                    <li>
                                        <a href="">
                                            <i class="fas fa-user-alt"></i>{{$detailBlog->creator}}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="single-blog.html">
                                            <i class="far fa-calendar-alt"></i>{{$detailBlog->created_at}}
                                        </a>
                                    </li>
                                </ul>
                                @if(App()->getLocale() =='en')
                                    <h2 class="entry-title">{{$detailBlog->title}} </h2>
                                </div>
                                <div class="entry-content">
                                    {!! $detailBlog->content !!}
                                </div>
                                @else
                                    <h2 class="entry-title">{{$detailBlog->title_vi}} </h2>
                                </div>
                                <div class="entry-content">
                                    {!! $detailBlog->content_vi !!}
                                </div>
                                @endif
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
                @foreach($randomBlog as $item)
                    <div class="col-lg-4 col-md-6" style="margin-top: 50px">
                        <div class="single-blog-wrap">
                            <div class="post-thumbnail"style="width: 100%;height: 200px;">
                                <img src="{{$item->coverImage}}" alt="Image" /></div>
                            <div class="post-desc">
                                <ul class="blog-meta list-inline">
                                    <li>
                                        <a href=""><i class="far fa-calendar-alt"></i>{{$item->created_at}}</a>
                                    </li>
                                </ul>
                                @if(App()->getLocale()=='en')
                                    <h3><a href="{{route('blog.show',$item->id)}}">{{$item->title}}</a></h3>
                                @else
                                    <h3><a href="{{route('blog.show',$item->id)}}">{{$item->title_vi}}</a></h3>
                                @endif
                                <a class="read-more" href="{{route('blog.show',$item->id)}}">{{__('readmore')}} <i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach

                </div>
            </div>
        </section>
    </main>
@endsection
