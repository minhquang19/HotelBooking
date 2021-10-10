@extends('layouts.base')
@section('title', 'MoonLight - Hotel and Room Service')
@section('active_home', 'active-page')
@section('content')
    <main>
        <section class="hero-section slick-initialized" id="heroSlideActive" style="height: 800px;">
            <div id="slide1" class="carousel slide" data-ride="carousel" data-interval="3000" style="z-index: 0">
                <ol class="carousel-indicators" style="bottom: 100px;z-index: 1001">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="single-hero-slide bg-img-center d-flex align-items-center text-center"
                             style="background-image: url(&quot;/frontEnd/img/bg/hero-bg-1.jpg&quot;); width: 100%; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;"
                             data-slick-index="0" aria-hidden="false" tabindex="0">
                            <div class="container">
                                <div class="slider-text">
                                    <span class="small-text" data-animation="fadeInDown" data-delay=".3s"
                                          style="animation-delay: 0.3s;">{{__('wellcome')}}</span>
                                    <h1 data-animation="fadeInLeft" data-delay=".6s" style="animation-delay: 0.6s;"
                                        class="">Another day in paradise</h1>
                                    <a class="btn filled-btn" data-animation="fadeInUp" data-delay=".9s"
                                       href="/room" style="animation-delay: 0.9s;" tabindex="0">{{__('booking')}}<i
                                            class="far fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                            <h1 class="big-text">Moon</h1>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="single-hero-slide bg-img-center d-flex align-items-center text-center"
                             style="background-image: url(&quot;/frontEnd/img/bg/hero-bg-2.jpg&quot;); width: 100%; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;"
                             data-slick-index="0" aria-hidden="false" tabindex="0">
                            <div class="container">
                                <div class="slider-text">
                                    <span class="small-text" data-animation="fadeInDown" data-delay=".3s"
                                          style="animation-delay: 0.3s;">Welcome to MoonLight</span>
                                    <h1 data-animation="fadeInLeft" data-delay=".6s" style="animation-delay: 0.6s;"
                                        class="">Another day in paradise</h1>
                                    <a class="btn filled-btn" data-animation="fadeInUp" data-delay=".9s"
                                       href="/room-list" style="animation-delay: 0.9s;" tabindex="0">get started <i
                                            class="far fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                            <h1 class="big-text">Moon</h1>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="single-hero-slide bg-img-center d-flex align-items-center text-center"
                             style="background-image: url(&quot;/frontEnd/img/bg/bg-03.jpg&quot;); width: 100%; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;"
                             data-slick-index="0" aria-hidden="false" tabindex="0">
                            <div class="container">
                                <div class="slider-text">
                                    <span class="small-text" data-animation="fadeInDown" data-delay=".3s"
                                          style="animation-delay: 0.3s;">Welcome to MoonLight</span>
                                    <h1 data-animation="fadeInLeft" data-delay=".6s" style="animation-delay: 0.6s;"
                                        class="">Another day in paradise</h1>
                                    <a class="btn filled-btn" data-animation="fadeInUp" data-delay=".9s"
                                       href="/room" style="animation-delay: 0.9s;" tabindex="0">{{__('booking')}}<i
                                            class="far fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                            <h1 class="big-text">Moon</h1>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="single-hero-slide bg-img-center d-flex align-items-center text-center"
                             style="background-image: url(&quot;/frontEnd/img/bg/bg-04.jpg&quot;); width: 100%; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;"
                             data-slick-index="0" aria-hidden="false" tabindex="0">
                            <div class="container">
                                <div class="slider-text">
                                    <span class="small-text" data-animation="fadeInDown" data-delay=".3s"
                                          style="animation-delay: 0.3s;">Welcome to MoonLight</span>
                                    <h1 data-animation="fadeInLeft" data-delay=".6s" style="animation-delay: 0.6s;"
                                        class="">Another day in paradise</h1>
                                    <a class="btn filled-btn" data-animation="fadeInUp" data-delay=".9s"
                                       href="/room" style="animation-delay: 0.9s;" tabindex="0"{{__('booking')}}<i
                                            class="far fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                            <h1 class="big-text">Moon</h1>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#slide1" role="button" data-slide="prev"
                       style="z-index: 1002">
      <span class="prev slick-arrow" style="display: block;">
      <i class="fas fa-angle-double-left"></i></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#slide1" role="button" data-slide="next"
                       style="z-index: 1002">
      <span class="next slick-arrow" style="display: block;">
      <i class="fas fa-angle-double-right"></i><span>
      <span class="sr-only">Previous</span>
                    </a>
                </div>
            </div>
        </section>
        <section class="booking-section">
            <div class="container">
                <div class="booking-form-wrap bg-img-center section-bg">
                    <form id="bookIng-form" method="GET">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="input-wrap"><input type="text" name="checkin" placeholder="{{__('arrive')}}" id="arrive-date"/><i class="far fa-calendar-alt"></i>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="input-wrap"><input type="text" name="checkout" placeholder="{{__('depart')}}" id="depart-date"/>
                                    <i class="far fa-calendar-alt"></i></div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="input-wrap">
                                    <select name="category" id="adult" class="nice-select">
                                        <option disabled="" value="DEFAULT" selected="">{{__('category')}}</option>
                                        @forelse($listCategory as $item)
                                            <option value="{{$item->id}}" class="option">{{$item->name}}</option>
                                        @empty
                                            <h1>No Category</h1>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="input-wrap">
                                    <select name="adult" id="adult" class="nice-select">
                                        <option disabled="" selected="">{{__('people')}}</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="input-wrap">
                                    <button formaction="/room" type="submit"
                                            class="btn filled-btn btn-block">{{__('booking')}}
                                        <i class="fas fa-long-arrow-alt-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="booking-shape-1"><img src="/frontEnd/img/shape/01.png" alt="shape"/></div>
                    <div class="booking-shape-2"><img src="/frontEnd/img/shape/02.png" alt="shape"/></div>
                    <div class="booking-shape-3"><img src="/frontEnd/img/shape/03.png" alt="shape"/></div>
                </div>
            </div>
        </section>
        <section class="welcome-section section-padding">
            <div class="container">
                <div class="row align-items-center no-gutters">
                    <div class="col-lg-6">
                        <div class="tile-gallery">
                            <img src="/frontEnd/img/tile-gallery/01.jpg" alt="Tile Gallery"/>
                            <div class="tile-gallery-content">
                                <div class="tile-icon"><img src="/frontEnd/img/icons/hostel-hover.png" alt=""/></div>
                                <h3>{{__('namehotel')}}</h3>
                                <p>{{__('text01')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 offset-lg-1">
                        <div class="section-title">
                            <span class="title-top with-border">{{__('about')}}</span>
                            <h1>{{__('wellcome')}}</h1>
                            <p>
                                {{__('introduceDes')}}
                            </p>
                            <p>
                                {{__('introduceDes2')}}
                            </p>
                        </div>
                        <div class="counter">
                            <div class="row">
                                <div class="col-4">
                                    <div class="counter-box wow fadeInLeft animated" data-wow-duration="1500ms"
                                         data-wow-delay="400ms"
                                         style="visibility: visible; animation-duration: 1500ms; animation-delay: 400ms; animation-name: fadeInLeft;">
                                        <img src="/frontEnd/img/icons/building.png" alt=""/><span
                                            class="counter-number"></span>
                                        <p>Luxury Appartment</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="counter-box wow fadeInUp animated" data-wow-duration="1500ms"
                                         data-wow-delay="600ms"
                                         style="visibility: visible; animation-duration: 1500ms; animation-delay: 600ms; animation-name: fadeInUp;">
                                        <img src="/frontEnd/img/icons/hostel.png" alt=""/><span
                                            class="counter-number"></span>
                                        <p>Modern Bedroom</p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="counter-box wow fadeInRight animated" data-wow-duration="1500ms"
                                         data-wow-delay="800ms"
                                         style="visibility: visible; animation-duration: 1500ms; animation-delay: 800ms; animation-name: fadeInRight;">
                                        <img src="/frontEnd/img/icons/trophy.png" alt=""/><span
                                            class="counter-number"></span>
                                        <p>Win Int Awards</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="latest-room section-bg" style="padding: 50px 0">
            <div class="container-fluid">
                <div class="row align-items-center no-gutters">
                    <div class="col-lg-3" style="bottom: 100px;">
                        <div class="section-title">
                            <span class="title-top with-border" style="margin-top: 50px;">Latest Product</span>
                            <h2 style="color: white;font-size: 28px">{{__('text02a')}}</h2>
                            <h2 style="color: white;font-size: 28px">{{__('text02b')}}</h2>
                            <p>{{__('text03')}}</p>
                        </div>
                    </div>
                    <div class="col-lg-8 offset-lg-1">
                        <div class="row">
                            <div class="MultiCarousel" data-items="1,2,2,3" data-slide="1" id="MultiCarousel"
                                 data-interval="1000">
                                <div class="MultiCarousel-inner">
                                    @forelse($listRoom as $item)
                                        <div class="item col-lg-4">
                                            <div class="pad15 single-room">
                                                <div class="room-thumb"><img src="{{$item->coverImages}}" alt="Room"></div>
                                                <div class="room-desc">
                                                    @if(App()->getLocale()=='en')
                                                        <div class="room-cat"><p>{{$item->category->name}}</p></div>
                                                        <h4 class="avson-go-top">
                                                            <a href="{{ route('room.show',$item->id) }}" tabindex="-1">{{$item->name}}</a>
                                                        </h4>
                                                        <p class="des_text">{{$item->description}}</p>
                                                    @else
                                                        <div class="room-cat"><p>{{$item->category->name_vi}}</p></div>
                                                        <h4 class="avson-go-top"><a href="{{ route('room.show',$item->id) }}" tabindex="-1">{{$item->name_vi}} </a>
                                                        </h4>
                                                        <p class="des_text">{{$item->description_vi}}</p>
                                                    @endif

                                                    <ul class="room-info list-inline">
                                                        <li><i class="fas fa-bed"></i>{{$item->bad}} Bads
                                                        </li>
                                                        <li><i class="fas fa-bath"></i>{{$item->bath}} Baths
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-ruler-combined"></i>{{$item->area}}
                                                            m
                                                        </li>
                                                        <li><i class="fas fa-user"></i>{{$item->category->maxPeople}}</li>
                                                    </ul>
                                                    <div class="room-price">
                                                        @if(App()->getLocale()=='en')
                                                            <p class="price">{{$item->RoomPrice->Weekly}} $</p>
                                                        @else
                                                            <p class="price">{{number_format($item->RoomPrice->Weekly_vi)}} VNĐ</p>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <strong>Sorry!</strong> No Product Found.
                                    @endforelse
                                </div>
                                <button class="btn btn-arrow leftLst"><</button>
                                <button class="btn btn-arrow rightLst">></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="service-section section-padding">
            <div class="container">
                <div class="section-title text-center">
                    <span class="title-top"> {{__('service')}}</span>
                    <h1>
                        {{__('serviceDes')}}
                    </h1>
                </div>
                <div class="row">
                    @foreach($listService as $item)
                        <div class="avson-go-top col-lg-4 col-md-6">
                            <div class="single-service-box text-center wow fadeIn animated" data-wow-duration="1500ms"
                                 data-wow-delay="400ms"
                                 style="visibility: visible; animation-duration: 1500ms; animation-delay: 400ms; animation-name: fadeIn;">
                                <span class="service-counter">{{$loop->index+1}}</span>
                                <img class="cover_Image" src="{{$item->image}}" alt="">
                                @if(App()->getLocale()=='en')
                                    <h4>{{$item->name}}</h4>
                                    <p class="des_text">{{$item->description}}</p>
                                @else
                                    <h4>{{$item->name_vi}}</h4>
                                    <p class="des_text">{{$item->description_vi}}</p>
                                @endif
                                <a class="read-more" href="{{route('service.show',$item->id)}}">{{__('readmore')}}<i
                                        class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="cta-section bg-img-center" style="background-image:url('/frontEnd/img/bg/cta-01.jpg');">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-10">
                        <div class="cta-left-content avson-go-top">
                            <h1>{{__('booking')}}</h1>
                            <a class="btn filled-btn" href="/room-list">{{__('booking')}} <i
                                    class="far fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="video-icon text-right">
                            <a href="https://www.youtube.com/watch?v=NpEaa2P7qZI" class="video-popup"> <i
                                    style="padding-top: 40px;" class="fas fa-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="wcu-section section-bg section-padding">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 offset-lg-1">
                        <div class="feature-left">
                            <div class="section-title">
                                <span class="title-top with-border">{{__('introduce')}}</span>
                                <h1>{{__('serviceDes')}}</h1>
                            </div>
                            <ul class="feature-list">
                                <li class="wow fadeInUp animated" data-wow-duration="1000ms" data-wow-delay="0ms"
                                    style="visibility: visible; animation-duration: 1000ms; animation-delay: 0ms; animation-name: fadeInUp;">
                                    <div class="feature-icon"><i style="padding-top: 20px;" class="fas fa-cocktail"></i>
                                    </div>
                                    <h4>{{__('relex')}}</h4>
                                    <p>{{__('relexDes')}}</p>
                                </li>
                                <li class="wow fadeInUp animated" data-wow-duration="1000ms" data-wow-delay="200ms"
                                    style="visibility: visible; animation-duration: 1000ms; animation-delay: 200ms; animation-name: fadeInUp;">
                                    <div class="feature-icon"><i style="padding-top: 20px;"
                                                                 class="fas fa-square-full"></i></div>
                                    <h4>{{__('security')}}</h4>
                                    <p> {{__('security_des')}} </p>
                                </li>
                                <li class="wow fadeInUp animated" data-wow-duration="1000ms" data-wow-delay="300ms"
                                    style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: fadeInUp;">
                                    <div class="feature-icon"><i style="padding-top: 20px;" class="fas fa-music"></i>
                                    </div>
                                    <h4>{{__('Dining')}}</h4>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="feature-img">
                            <div class="feature-abs-con">
                                <div class="f-inner">
                                    <i class="far fa-stars"></i>
                                    <p>Popular Features</p>
                                </div>
                            </div>
                            <img src="/frontEnd/img/cover.jpg" alt="Image"/>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="contact-section section-padding">
            <div class="container">
                <div class="row align-items-center no-gutters">
                    <div class="col-lg-6">
                        <iframe style="display: block !important;"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.0060158206306!2d105.85210081408836!3d21.032445293030282!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abc044f3fa91%3A0x67a19a82b90dde0!2zOTBiIE5ndXnhu4VuIEjhu691IEh1w6JuLCBIw6BuZyBC4bqhYywgSG_DoG4gS2nhur9tLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1632202930690!5m2!1svi!2s"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    <div class="col-lg-5 offset-lg-1">
                        <div class="section-title">
                            <span class="title-top with-border">{{__('contact')}}</span>
                            <h1>{{__('contactUs')}}</h1>
                        </div>
                        <div class="contact-box wow fadeInUp animated" data-wow-duration="1500ms" data-wow-delay="400ms"
                             style="visibility: visible; animation-duration: 1500ms; animation-delay: 400ms; animation-name: fadeInUp;">
                            <ul>
                                <li><i class="fas fa-map-marker-alt"></i>{{__('hoteladdress')}}</li>
                                <li>
                                    <a><i class="far fa-envelope-open"></i>{{__('hotelemail')}}</a>
                                </li>
                                <li>
                                    <a><i class="fas fa-phone"></i>{{__('tel')}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('scripts')
    <script>
        var arr = $('.price').text();
        console.log(arr[0].val)
        for (var i = 0; i < arr.length; i++) {
            arr[i].value = arr[i].value.replace(/[($)\s\._\-]+/g, '');
        };
        console.log(arr);
    </script>
@endsection
