@extends('layouts.base')
@section('title','MoonLight -'.__('blog'))
@section('active_blog', 'active-page')
@section('content')
<main>
    <section class="breadcrumb-area d-flex align-items-center position-relative bg-img-center" style="background-image: url('/FrontEnd/img/blog/blog-breadcrumb.jpg');">
                <div class="container">
                    <div class="breadcrumb-content text-center">
                        <h1>{{__('blog')}}</h1>
                        <ul class="list-inline">
                            <li><a href="/">{{__('home')}}</a></li>
                            <li><i class="fas fa-angle-double-right"></i></li>
                            <li>{{__('blog')}}</li>
                        </ul>
                    </div>
                </div>
                <h1 class="big-text">Blog</h1>
    </section>
    <section class="blog-wrapper blog-gird-view section-padding section-bg">
        <div class="container">
            <div class="post-loop avson-go-top">
                <div class="row">
                    @foreach($listBlogPage as $item)
                    <div class="col-lg-4 col-md-6">
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
            {{$listBlogPage->links('vendor.pagination.bootstrap-4')}}
        </div>
    </section>
</main>
@endsection
