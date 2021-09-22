@extends('layouts.base')
@section('title', 'Avson - Hotel and Room Service')
@section('active_home', 'active-page')
@section('content')
<main>
<section class="hero-section slick-initialized" id="heroSlideActive" style="height: 800px;">
  <div id="slide1" class="carousel slide" data-ride="carousel" data-interval="3000" style="z-index: 0">
    <ol class="carousel-indicators" style="bottom: 100px;z-index: 1001">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="single-hero-slide bg-img-center d-flex align-items-center text-center" style="background-image: url(&quot;/assets/img/bg/hero-bg-1.jpg&quot;); width: 100%; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;"data-slick-index="0" aria-hidden="false" tabindex="0">
          <div class="container">
            <div class="slider-text">
              <span class="small-text" data-animation="fadeInDown" data-delay=".3s" style="animation-delay: 0.3s;">Welcome to MoonLight</span>
              <h1 data-animation="fadeInLeft" data-delay=".6s" style="animation-delay: 0.6s;" class="">Another day in paradise</h1>
              <a class="btn filled-btn" data-animation="fadeInUp" data-delay=".9s" href="/room-list" style="animation-delay: 0.9s;" tabindex="0">get started <i class="far fas fa-long-arrow-alt-right"></i></a>
            </div>
          </div>
          <h1 class="big-text">Moon</h1>
        </div>
      </div>
    <div class="carousel-item">
      <div class="single-hero-slide bg-img-center d-flex align-items-center text-center" style="background-image: url(&quot;/assets/img/bg/hero-bg-2.jpg&quot;); width: 100%; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;" data-slick-index="0" aria-hidden="false" tabindex="0">
        <div class="container">
          <div class="slider-text">
            <span class="small-text" data-animation="fadeInDown" data-delay=".3s" style="animation-delay: 0.3s;">Welcome to MoonLight</span>
            <h1 data-animation="fadeInLeft" data-delay=".6s" style="animation-delay: 0.6s;" class="">Another day in paradise</h1>
            <a class="btn filled-btn" data-animation="fadeInUp" data-delay=".9s" href="/room-list" style="animation-delay: 0.9s;" tabindex="0">get started <i class="far fas fa-long-arrow-alt-right"></i></a>
          </div>
        </div>
        <h1 class="big-text">Moon</h1>
      </div>
    </div>
    <a class="carousel-control-prev" href="#slide1" role="button" data-slide="prev" style="z-index: 1002">
      <span class="prev slick-arrow" style="display: block;">
      <i  class="fas fa-angle-double-left"></i></span>
      <span class="sr-only">Previous</span>
    </a>
      <a class="carousel-control-next" href="#slide1" role="button" data-slide="next" style="z-index: 1002">
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
          <div class="input-wrap"><input type="text" name="checkin" placeholder="Arrive Date" id="arrive-date"/><i class="far fa-calendar-alt"></i></div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="input-wrap"><input type="text" name="checkout" placeholder="Depart Date" id="depart-date" /><i class="far fa-calendar-alt"></i></div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="input-wrap">
            <select name="category" id="adult" class="nice-select" >
                    <option disabled="" value="DEFAULT" selected="">Rooms Category</option>
              @forelse($category_data as $item)
                    <option value="{{$item->id}}" class="option">{{$item->name}}</option>
                @empty
                  <h1>No Category</h1>
              @endforelse
            </select>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="input-wrap">
            <select name="adult" id="adult" class="nice-select" >
                <option disabled="" selected="">People</option>
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
          <button formaction="/room-list" type="submit" class="btn filled-btn btn-block">book now <i class="fas fa-long-arrow-alt-right"></i></button>
          </div>
        </div>
      </div>
      </form>
      <div class="booking-shape-1"><img src="/assets/img/shape/01.png" alt="shape" /></div>
      <div class="booking-shape-2"><img src="/assets/img/shape/02.png" alt="shape" /></div>
      <div class="booking-shape-3"><img src="/assets/img/shape/03.png" alt="shape" /></div>
    </div>
  </div>
</section>
<section class="welcome-section section-padding">
  <div class="container">
    <div class="row align-items-center no-gutters">
      <div class="col-lg-6">
        <div class="tile-gallery">
            <img src="/assets/img/tile-gallery/01.jpg" alt="Tile Gallery" />
            <div class="tile-gallery-content">
                <div class="tile-icon"><img src="/assets/img/icons/hostel-hover.png" alt="" /></div>
                <h3>Luxury Interior</h3>
                <p>Builder of human happiness. No one rejects dislikes or apleasure itself cause it is pleasure</p>
            </div>
        </div>
      </div>
      <div class="col-lg-5 offset-lg-1">
        <div class="section-title">
            <span class="title-top with-border">About Us</span>
            <h1>Welcome To Avson Modern Hotel Room Sells Services</h1>
            <p>
                Avson Hotel is the first international hotel in Hanoi. With 218 Deluxe Rooms and Suites overlooking the scenic Phu Dien Lake, the centrally-located hotel is the perfect place for business or leisure stay. Luxurious accommodations are elegantly furnished and equipped with a wide range of high-end amenities. Hanoi Hotel is renowned for its complete arena of evening entertainments and finest Chinese cuisine in the city. Your stay with us is guaranteed to be a pleasant and the most memorable one.
            </p>
        </div>
        <div class="counter">
          <div class="row">
            <div class="col-4">
              <div class="counter-box wow fadeInLeft animated" data-wow-duration="1500ms" data-wow-delay="400ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 400ms; animation-name: fadeInLeft;">
                  <img src="/assets/img/icons/building.png" alt="" /><span class="counter-number"></span>
                  <p>Luxury Appartment</p>
              </div>
            </div>
            <div class="col-4">
              <div class="counter-box wow fadeInUp animated" data-wow-duration="1500ms" data-wow-delay="600ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 600ms; animation-name: fadeInUp;">
                  <img src="/assets/img/icons/hostel.png" alt="" /><span class="counter-number"></span>
                  <p>Modern Bedroom</p>
              </div>
            </div>
            <div class="col-4">
              <div class="counter-box wow fadeInRight animated" data-wow-duration="1500ms" data-wow-delay="800ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 800ms; animation-name: fadeInRight;">
                  <img src="/assets/img/icons/trophy.png" alt="" /><span class="counter-number"></span>
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
             <h1>Modern Hotel &amp; Room For Luxury Living</h1>
             <p>We will be happy to assist you anytime to enjoy the unique charm and atmosphere of this lovely hotel with balance and harmony</p>
          </div>
        </div>
        <div class="col-lg-8 offset-lg-1">
          <div class="row">
            <div class="MultiCarousel"data-items="1,2,2,3" data-slide="1" id="MultiCarousel"data-interval="1000">
              <div class="MultiCarousel-inner">
                  @forelse($room_data as $item)
                      <div class="item col-lg-4">
                          <div class="pad15 single-room">
                              <div class="room-thumb"><img src="/upload/cover/{{$item->image}}" alt="Room"></div>
                              <div class="room-desc">
{{--                                  <div class="room-cat"><p>{{$item->category->name}}</p></div>--}}
                                  <h4 class="avson-go-top"><a href="" tabindex="-1">{{$item->name}}</a></h4>
                                  <p>{{$item->description}}</p>
                                  <ul class="room-info list-inline">
                                      <li><i class="fas fa-bed"></i>2 Bads</li>
                                      <li><i class="fas fa-bath"></i>2 Baths</li>
                                      <li><i class="fas fa-ruler-combined"></i>{{$item->area}} m</li>
                                  </ul>
                                  <div class="room-price">
{{--                                      <p>{{$item->room_prices[0]->Weekends}}</p>--}}
{{--                                      --}}{{-- <p>{{$roomPrice_data[$loop->index]->Weekends}}</p> --}}
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
         <span class="title-top">Our Services</span>
         <h1>
             We Provide Most Exclusive <br/>
             Hotel &amp; Room Services
         </h1>
      </div>
      <div class="row">
{{--          @foreach($service as $item)--}}
{{--              <div class="avson-go-top col-lg-6 col-md-6">--}}
{{--                  <div class="single-service-box text-center wow fadeIn animated" data-wow-duration="1500ms" data-wow-delay="400ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 400ms; animation-name: fadeIn;">--}}
{{--                      <span class="service-counter">{{$loop->index+1}}</span>--}}
{{--                      <div class="service-icon"><i class="service_icon1 {{$item->icon}}"></i></div>--}}
{{--                      <h4>{{$item->name}}</h4>--}}
{{--                      <p>{{$item->description}}</p>--}}
{{--                      <a class="read-more" href="{{route('service.show',$item->id)}}">Read More <i class="fas fa-long-arrow-alt-right"></i></a>--}}
{{--                  </div>--}}
{{--              </div>--}}
{{--          @endforeach}--}}
      </div>
   </div>
</section>
<section class="cta-section bg-img-center"style="background-image:url('/assets/img/bg/cta-01.jpg');">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-10">
                <div class="cta-left-content avson-go-top">
                    <span>Looking For Luxury Hotel</span>
                    <h1>Booking Now</h1>
                    <a class="btn filled-btn" href="/room-list">Booking now <i class="far fas fa-long-arrow-alt-right"></i></a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="video-icon text-right">
                    <a href="https://www.youtube.com/watch?v=NpEaa2P7qZI" class="video-popup"> <i style="padding-top: 40px;"class="fas fa-play"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="ma-gallery-section section-padding avson-go-top">
    <div class="container">
        <div class="section-title text-center">
            <span class="title-top">Our Project</span>
            <h1>
                Let’s See Luxury Property <br />
                Insides Beautys
            </h1>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div
                    class="gallery-box bg-img-center big wow fadeIn animated"
                    data-wow-duration="1500ms"
                    data-wow-delay="0ms"
                    style="background-image: url('/assets/img/home-gallery/01.jpg'); visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeIn;">
                    <div class="gallery-box-content">
                        <a class="view-more" href="/room-details"><i class="fas fa-plus"></i></a>
                        <h3>Deluxe Rooms</h3>
                        <p>Couple Room Deluxe</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div
                            class="gallery-box bg-img-center semi-big wow fadeIn animated"
                            data-wow-duration="1500ms"
                            data-wow-delay="400ms"
                            style="background-image: url('/assets/img/home-gallery/02.jpg'); visibility: visible; animation-duration: 1500ms; animation-delay: 400ms; animation-name: fadeIn;">
                            <div class="gallery-box-content">
                                <a class="view-more" href="/room-details"><i class="fas fa-plus"></i></a>
                                <h3>Deluxe Rooms</h3>
                                <p>Couple Room Deluxe</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div
                            class="gallery-box bg-img-center small wow fadeIn animated"
                            data-wow-duration="1500ms"
                            data-wow-delay="800ms"
                            style="background-image: url('/assets/img/home-gallery/03.jpg'); visibility: visible; animation-duration: 1500ms; animation-delay: 800ms; animation-name: fadeIn;">
                            <div class="gallery-box-content">
                                <a class="view-more" href="/room-details"><i class="fas fa-plus"></i></a>
                                <h3>Deluxe Rooms</h3>
                                <p>Couple Room Deluxe</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div
                            class="gallery-box bg-img-center medium wow fadeIn animated"
                            data-wow-duration="1500ms"
                            data-wow-delay="1200ms"
                            style="background-image: url('/assets/img/home-gallery/04.jpg'); visibility: visible; animation-duration: 1500ms; animation-delay: 1200ms; animation-name: fadeIn;" >
                            <div class="gallery-box-content">
                                <a class="view-more" href="/room-details"><i class="fas fa-plus"></i></a>
                                <h3>Deluxe Rooms</h3>
                                <p>Couple Room Deluxe</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div
                            class="gallery-box bg-img-center medium wow fadeIn animated"
                            data-wow-duration="1500ms"
                            data-wow-delay="1600ms"
                            style="background-image: url('/assets/img/home-gallery/05.jpg'); visibility: visible; animation-duration: 1500ms; animation-delay: 1600ms; animation-name: fadeIn;"
                        >
                            <div class="gallery-box-content">
                                <a class="view-more" href="/room-details"><i class="fas fa-plus"></i></a>
                                <h3>Deluxe Rooms</h3>
                                <p>Couple Room Deluxe</p>
                            </div>
                        </div>
                    </div>
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
                  <span class="title-top with-border">Why Choose Us</span>
                  <h1>We Care You &amp; We Feel What’s Needs For Good Living</h1>
              </div>
              <ul class="feature-list">
                  <li class="wow fadeInUp animated" data-wow-duration="1000ms" data-wow-delay="0ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 0ms; animation-name: fadeInUp;">
                      <div class="feature-icon"><i style="padding-top: 20px;" class="fas fa-cocktail"></i></div>
                      <h4>Relex Living</h4>
                      <p>You can enjoy the convenience of modern amenities such as wireless broadband internet access, laundry and dry cleaning services and more. </p>
                  </li>
                  <li class="wow fadeInUp animated" data-wow-duration="1000ms" data-wow-delay="200ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 200ms; animation-name: fadeInUp;">
                      <div class="feature-icon"><i style="padding-top: 20px;" class="fas fa-square-full"></i></div>
                      <h4>High Security System</h4>
                      <p> The security of guests, staff, and anyone that comes to the hotel is vital to the hotel industry, making security systems a valuable tool. </p>
                  </li>
                  <li class="wow fadeInUp animated" data-wow-duration="1000ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: fadeInUp;">
                      <div class="feature-icon"><i style="padding-top: 20px;" class="fas fa-music"></i></div>
                      <h4>Such Events &amp; Party</h4>
                      <p>Let our professional pre-organized theme parties create an event that you’ll always remember.s</p>
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
              <img src="/assets/img/tile-gallery/02.jpg" alt="Image" />
          </div>
      </div>
    </div>
  </div>
</section>
<section class="contact-section section-padding">
   <div class="container">
      <div class="row align-items-center no-gutters">
         <div class="col-lg-6">
             <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d658.2535814025008!2d105.76291211855609!3d21.046903083079442!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454c1af4d6691%3A0x141f1d7cdc526545!2zNDFhIMSQLiBQaMO6IERp4buFbiwgTMOgbmcgUGjDuiBEaeG7hW4sIFThu6sgTGnDqm0sIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1616573391175!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
         </div>
         <div class="col-lg-5 offset-lg-1">
          <div class="section-title">
              <span class="title-top with-border">Have A Coffee </span>
              <h1>Don’t Hesitate To Contact With Us</h1>
              <p>Provident, similique sunt in culpa qui officia deserunt mollitia animie est laborum et dolorum fuga harum quidem</p>
          </div>
          <div class="contact-box wow fadeInUp animated" data-wow-duration="1500ms" data-wow-delay="400ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 400ms; animation-name: fadeInUp;">
              <ul>
                  <li><i class="fas fa-map-marker-alt"></i>41A Bac Tu Liem Ha Noi</li>
                  <li>
                      <a><i class="far fa-envelope-open"></i>dmquang1999@gmail.com</a>
                  </li>
                  <li>
                      <a><i class="fas fa-phone"></i>+89 (456) 789 999</a>
                  </li>
              </ul>
          </div>
         </div>
      </div>
   </div>
</section>
</main>
@endsection

