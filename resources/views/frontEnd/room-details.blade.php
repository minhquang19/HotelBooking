@extends('layouts.base')
@section('title', __('roomDetail'))
@section('active_room', 'active-page')
@section('content')
<main>
  <section class="breadcrumb-area d-flex align-items-center position-relative bg-img-center" style="background-image: url('/frontEnd/img/blog/blog-breadcrumb.jpg');">
              <div class="container">
                  <div class="breadcrumb-content text-center">
                      <h1>Our Details</h1>
                      <ul class="list-inline">
                          <li><a href="/">{{__('home')}}</a></li>
                          <li><i class="fas fa-angle-double-right"></i></li>
                          <li><a href="">{{__('roomDetail')}}</a></li>
                      </ul>
                  </div>
              </div>
              <h1 class="big-text">Room</h1>
  </section>
  <section class="room-details-wrapper section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="room-details">
            <div class="entry-header">
              <div class="post-thumb position-relative">
                <div class="post-thumb-slider">
                  <div class="main-slider slick-initialized slick-slider" style="height: 430px;">
                    <div class="slick-list draggable">
                      <div class="slick-track " style="opacity: 1;height :430px;  width: 100%;">
                        <div id="slide2" class="carousel slide" data-ride="carousel" align="center">
                          <div class="carousel-inner">
                            @foreach($roomimages as $item)
                            <div class="carousel-item single-img"aria-hidden="true" style="width: 770px;">
                              <img src="{{$item->name}}" alt="Image" />
                            </div>
                            @endforeach
                            <a href="#slide2" data-slide="prev">
                              <span class="prev slick-arrow" style="display: block;">
                               <i class="fas fa-angle-double-left" style="padding-top: 15px;"></i></span>
                            </a>
                             <a class="carousel-control-next" href="#slide2" data-slide="next">
                              <span class="next slick-arrow" style="display: block;">
                                  <i class="fas fa-angle-double-right" style="padding-top: 15px;"></i>
                              </span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="price-tag">{{$roomPrice[0]->Weekends}}</div>
                </div>
                <div class="room-cat"  style="padding-top: 15px;"><a href="#">{{$room_detail->category->name}}</a>
                </div>
              <h2 class="entry-title">{{$room_detail->name}}</h2>
              <ul class="entry-meta list-inline">
                 <li><i class="fas fa-bed"></i>{{$room_detail->bad}} Bads</li>
                 <li><i class="fas fa-bath"></i>{{$room_detail->bath}} Baths</li>
                 <li><i class="fas fa-ruler-combined"></i>{{$room_detail->area}} m</li>
              </ul>
              </div>
            </div>
            <div class="room-details-tab">
                <div class="row">
                    <div class="col-sm-3">
                        <ul class="nav desc-tab-item" role="tablist">
                            <li class="nav-item"><a class="nav-link active" href="#desc" role="tab" data-toggle="tab">Room Details</a></li>
                            <li class="nav-item"><a class="nav-link" href="#reviews" role="tab" data-toggle="tab">Reviews</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-9" style=" border-left: 1px solid #fea116;">
                        <div class="tab-content desc-tab-content">
                            <div role="tabpanel" class="tab-pane fade in active show" id="desc">
                                <h5 class="tab-title">Room Details</h5>
                                <div class="entry-content">
                                    <p>
                                        {{$room_detail->description}}
                                    </p>
{{--                                    <div class="entry-gallery-img">--}}
{{--                                        <figure class="entry-media-img"><img src="/upload/image/{{$roomimages->pluck('name')->random()}}" alt="Image" /></figure>--}}
{{--                                    </div>--}}
                                </div>
                                <div class="room-specification">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-12 pl-3">
                                            <div class="pricing-plan">
                                                <h4 class="specific-title">Pricing Plan</h4>
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td>Nightly  </td>
                                                            <td> :</td>
                                                            <td class="big">{{$roomPrice[0]->Nightly}} $</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Weekends </td>
                                                            <td> :</td>
                                                            <td class="big">{{$roomPrice[0]->Weekends}}$</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Weekly </td>
                                                            <td> :</td>
                                                            <td class="big">{{$roomPrice[0]->Weekly}}$</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Monthly </td>
                                                            <td> :</td>
                                                            <td class="big">{{$roomPrice[0]->Moonly}}$</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Minimum Days</td>
                                                            <td> :</td>
                                                            <td class="big">1 day</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Maximum Days:</td>
                                                            <td> :</td>
                                                            <td class="big">45 days</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
{{--                                        <div class="col-lg-4 col-6">--}}
{{--                                            <div class="facilities">--}}
{{--                                                <h4 class="specific-title">Facilities</h4>--}}
{{--                                                <ul>--}}
{{--                                                  @foreach($fac_data as $item)--}}
{{--                                                    <li>{{$item->facility_name}}</li>--}}
{{--                                                  @endforeach--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <div class="col-lg-7 col-6">
                                            <div class="accomodation">
                                                <h4 class="specific-title">Extension</h4>
                                                <ul>
                                                  @foreach($tag_data as $item)
                                                    <li>{{$item->tag_name}}</li>
                                                  @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="reviews">
                                <h5 class="tab-title">Reviews</h5>
                                <div class="reviews-count">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="count-num d-flex align-items-center justify-content-center">
                                                <p><span>6.8</span>Suprrb</p>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="reviews-bars">
                                                <div class="single-bar">
                                                    <p class="bar-title">Acaommodation<span>8.0</span></p>
                                                    <div class="bar" data-width="80%"><div class="bar-inner"></div></div>
                                                </div>
                                                <div class="single-bar">
                                                    <p class="bar-title">Destination<span>6.0</span></p>
                                                    <div class="bar" data-width="60%"><div class="bar-inner"></div></div>
                                                </div>
                                                <div class="single-bar">
                                                    <p class="bar-title">Transport<span>7.0</span></p>
                                                    <div class="bar" data-width="70%"><div class="bar-inner"></div></div>
                                                </div>
                                                <div class="single-bar">
                                                    <p class="bar-title">Overall<span>9.0</span></p>
                                                    <div class="bar" data-width="90%"><div class="bar-inner"></div></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment-area">
                                    <h5 class="tab-title">All Reviews</h5>
                                    <ul class="comment-list">
                                        <li>
                                            <div class="comment-autor"><img src="{{asset('/frontEnd/img/blog-details/04.jpg')}}" alt="reviews" /></div>
                                            <div class="comment-desc">
                                                <h6>Alexzeder Alex <span class="comment-date"> 25 Feb 2020</span></h6>
                                                <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account</p>
                                                <a href="#" class="reply-comment">Reply <i class="far fa-long-arrow-right"></i></a>
                                                <div class="autor-rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-alt"></i></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="review-form">
                                    <h5 class="tab-title">Write a Review</h5>
                                    <div class="star-given-box">
                                        <ul class="list-inline">
                                            <li>
                                                <p class="st-title">Acaommodation</p>
                                                <p class="rating-box"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                                            </li>
                                            <li>
                                                <p class="st-title">Destination</p>
                                                <p class="rating-box"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                                            </li>
                                            <li>
                                                <p class="st-title">Transport</p>
                                                <p class="rating-box"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                                            </li>
                                            <li>
                                                <p class="st-title">Overall</p>
                                                <p class="rating-box"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                                            </li>
                                        </ul>
                                    </div>
                                    <form>
                                        <div class="input-wrap text-area"><textarea placeholder="Write Review"></textarea><i class="far fa-pencil"></i></div>
                                        <div class="input-wrap"><input type="text" placeholder="Name" id="name" /><i class="far fa-user-alt"></i></div>
                                        <div class="input-wrap"><input type="text" placeholder="Your Email" id="email" /><i class="far fa-envelope"></i></div>
                                        <div class="input-wrap"><button type="submit" class="btn btn-block">Submit</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
         <div class="col-lg-4">
                <div class="sidebar-wrap">
                    <div class="widget booking-widget">
                        <h4 class="widget-title">{{$roomPrice[0]->Nightly}}<span> Night</span></h4>
                        <form action="{{route('booking.store') }}" method="post">
                            @csrf
                            @method('POST')
                            @foreach($temp as $key => $item)
                            <input type="hidden" name="checkin[]"  value="{{$item->checkin}}">
                            <input type="hidden" name="checkout[]"  value="{{$item->checkout}}">
                            @endforeach
                            <div class="input-wrap"><input type="text" placeholder="Arrive Date" id="checkin"  name="checkin" required/><i class="far fa-calendar-alt"></i></div>
                            <div class="input-wrap"><input type="text" placeholder="Depart Date" id="checkout"  name="checkout" required /><i class="far fa-calendar-alt"></i></div>
                            <div class="input-wrap">
                                 <select name="amount_people" id="child" class="nice-select" required >
                                      <option disabled="" selected="">People</option>
                                       @for($i=1;$i<=$room_detail->category->maxPeople;$i++)
                                         <option value="{{$i}}">{{$i}}</option>
                                       @endfor
                                  </select>
                            </div>
                            <input type="hidden" value="{{$room_detail->id}}" name="id">
                            <input type="hidden" value="{{$room_detail->name}}" name="name">
                            <div class="input-wrap">
                                <button type="submit" class="btn filled-btn btn-block">book now<i class="fas fa-long-arrow-alt-right"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="widget category-widget avson-go-top">
                        <h4 class="widget-title">Category</h4>
                        <div class="single-cat bg-img-center" style="background-image: url('/frontEnd/img/blog/cat-01.jpg');"><a href="/room-details">{{$room_detail->category->name}}</a></div>
                    </div>
                    <div class="widget banner-widget avson-go-top" style="background-image: url({{asset('frontEnd/img/blog/sidebar-banner.jpg')}});">
                        <h2>Booking Your Latest apartment</h2>
                        <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit sed do eiusmod tempor incididunt ut labore</p>
                    </div>
                </div>
        </div>
      </div>
    </div>
  </section>
  <section class="latest-room-d section-bg ">
        <div class="container">
                    <div class="section-title text-center">
                        <span class="title-top">Latest Product</span>
                        <h1>Explore Latest Product</h1>
                    </div>
                    <div class="row">
                      @forelse($room_3 as $room)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-room">
                                <div class="room-thumb"><img src="{{$room->coverImages}}" alt="Room" /></div>
                                <div class="room-desc">
                                    <div class="room-cat"><p>{{$room->category->name}}</p></div>
                                    <h4><a href="{{ route('room.show',$room->id) }}">{{$room->name}}</a></h4>
                                    <p>{{$room->description}}</p>
                                    <ul class="room-info list-inline">
                                        <li><i class="fas fa-bed"></i>{{$room->bad}} Bed</li>
                                        <li><i class="fas fa-bath"></i>{{$room->bath}} Bath</li>
                                        <li><i class="fas fa-ruler-combined"></i>{{$room->area}} M</li>
                                    </ul>
                                    <div class="room-price"><p>{{$room->roomPrice->Weekly}} $ </p></div>
                                </div>
                            </div>
                        </div>
                        @empty
                          <p>No Room Here</p>
                        @endforelse
                    </div>
                </div>
  </section>
</main>
@endsection
@section('scripts')
<script>
           $(document).ready(function()
           {
             $('.carousel-item:nth-child(1)').addClass('active');
           });
        </script>
        <script>
        var checkin_arr =[];
        var checkout_arr =[];
        var checkin_val = document.getElementsByName('checkin[]');
        var checkout_val = document.getElementsByName('checkout[]');
        for (var i = 0; i < checkin_val.length; i++) {
            checkin_arr.push(checkin_val[i].value);
        };
        for (var i = 0; i < checkout_val.length; i++) {
            checkout_arr.push(checkout_val[i].value);
        };
        var getDaysArray = function(start, end) {
            for(var arr=[],dt=new Date(start); dt<=end; dt.setDate(dt.getDate()+1)){
                arr.push(new Date(dt));
            }
            return arr;
        };
        var test =[];
        for(var i=0;i < checkin_arr.length;i++)
        {
            var daylist = getDaysArray(new Date(checkin_arr[i]),new Date(checkout_arr[i]));
            daylist.map((v)=>v.toISOString().slice(0,10)).join("");
            daylist.forEach(covert);
            for(var j=0;j<daylist.length;j++)
            {
                test.push(daylist[j]);
            }
        }
        function covert(date, index, arr)
        {
            arr[index] = ((date.getMonth() > 8) ? (date.getMonth() + 1) : ('0' + (date.getMonth() + 1))) + '-' + ((date.getDate() > 9) ? date.getDate() : ('0' + date.getDate())) + '-' + date.getFullYear()
        }

        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        var checkin = $('#checkin').datepicker({

            beforeShowDay: function(date) {
                return date.valueOf() >= now.valueOf();
            },
            autoclose: true,
            datesDisabled :test,

        }).on('changeDate', function(ev) {
            if (ev.date.valueOf() > checkout.datepicker("getDate").valueOf() || !checkout.datepicker("getDate").valueOf()) {

                var newDate = new Date(ev.date);
                newDate.setDate(newDate.getDate() + 1);
                checkout.datepicker("update", newDate);

            }
            $('#checkout')[0].focus();
        });

        var checkout = $('#checkout').datepicker({
            beforeShowDay: function(date) {
                if (!checkin.datepicker("getDate").valueOf()) {
                    return date.valueOf() >= new Date().valueOf();
                } else {
                    return date.valueOf() > checkin.datepicker("getDate").valueOf();
                }
            },
            autoclose: true,
            datesDisabled :daylist

        }).on('changeDate', function(ev) {});
    </script>
@endsection
