@extends('layouts.base')
@section('title', __('roomDetail'))
@section('active_room', 'active-page')
@section('content')
<main>
  <section class="breadcrumb-area d-flex align-items-center position-relative bg-img-center" style="background-image: url('/frontEnd/img/blog/blog-breadcrumb.jpg');">
              <div class="container">
                  <div class="breadcrumb-content text-center">
                      <h1>{{__('roomDetail')}}</h1>
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
                            @foreach($roomImages as $item)
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
                  <div class="price-tag">
                      @if(App()->getLocale() == "en")
                          {{$roomPrice[0]->Weekly}}$
                      @else
                          {{number_format($roomPrice[0]->Weekly_vi)}} VND
                      @endif
                  </div>
                </div>
                <div class="room-cat"  style="padding-top: 15px;"><a href="#">{{$roomDetail->category->name}}</a>
                </div>
              <h2 class="entry-title" style="margin: 30px 0;">{{$roomDetail->name}}</h2>
              <ul class="entry-meta list-inline">
                 <li><i class="fas fa-bed"></i>{{$roomDetail->bad}} Bads</li>
                 <li><i class="fas fa-bath"></i>{{$roomDetail->bath}} Baths</li>
                 <li><i class="fas fa-ruler-combined"></i>{{$roomDetail->area}} m</li>
                  <li><i class="fas fa-user"></i>{{$roomDetail->category->maxPeople}}</li>
              </ul>
              </div>
            </div>
            <div class="room-details-tab">
                <div class="row">
                    <div class="col-sm-3">
                        <ul class="nav desc-tab-item" role="tablist">
                            <li class="nav-item"><a class="nav-link active" href="#desc" role="tab" data-toggle="tab">{{__('roomDetail')}}</a></li>
                            <li class="nav-item"><a class="nav-link" href="#reviews" role="tab" data-toggle="tab">Reviews</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-9" style=" border-left: 1px solid #fea116;">
                        <div class="tab-content desc-tab-content">
                            <div role="tabpanel" class="tab-pane fade in active show" id="desc">
                                <h3 style="margin-bottom: 20px;" class="tab-title">{{__('roomDetail')}}</h3>
                                <div class="entry-content">
                                    <p>
                                        @if(App()->getLocale() == "en")
                                        {{$roomDetail->description}}
                                        @else
                                        {{$roomDetail->description_vi}}
                                        @endif
                                    </p>
                                    <div class="entry-gallery-img">
                                        <figure class="entry-media-img"><img src="{{$roomImages->pluck('name')->random()}}" alt="Image" /></figure>
                                    </div>
                                </div>
                                <div class="room-specification" style=" margin-top: 30px;">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 pl-3">
                                            <div class="pricing-plan">
                                                <h4 class="specific-title">{{__('pricingPlan')}}</h4>
                                                <table>
                                                    <tbody>
                                                    @if(App()->getLocale()=='en')
                                                        <tr>
                                                            <td>Weekly  </td>
                                                            <td> :</td>
                                                            <td class="big">{{$roomPrice[0]->Weekly}} $</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Weekends </td>
                                                            <td> :</td>
                                                            <td class="big">{{$roomPrice[0]->Weekends}}$</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Minimum Days</td>
                                                            <td> :</td>
                                                            <td class="big">1 day</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Maximum Days:</td>
                                                            <td> :</td>
                                                            <td class="big">30 days</td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <td>Ngày thường  </td>
                                                            <td> :</td>
                                                            <td class="big">{{number_format($roomPrice[0]->Weekly_vi)}}VNĐ</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Cuối Tuần </td>
                                                            <td> :</td>
                                                            <td class="big">{{number_format($roomPrice[0]->Weekends_vi)}}VNĐ</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Số ngày tối thiểu</td>
                                                            <td> :</td>
                                                            <td class="big">1 ngày</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Số ngày tối đa:</td>
                                                            <td> :</td>
                                                            <td class="big">30 ngày</td>
                                                        </tr>

                                                    @endif

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-6">
                                            <div class="accomodation">
                                                <h4 class="specific-title">{{__('Extension')}}</h4>
                                                <ul>
                                                  @foreach($tagName as $item)
                                                        @if(App()->getLocale() =='en')
                                                        <li>{{$item->name}}</li>
                                                        @else
                                                        <li>{{$item->name_vi}}</li>
                                                        @endif
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
                        <h4 class="widget-title"><span> {{__('booking')}}</span></h4>
                        <form  autocomplete="off" action="{{route('booking.store') }}" method="post">
                            @csrf
                            @method('POST')
                            @foreach($listCheckInOut as $key => $item)
                                <input type="hidden" name="checkin[]"  value="{{$item->checkin}}">
                                <input type="hidden" name="checkout[]"  value="{{$item->checkout}}">
                            @endforeach
                            <div class="input-wrap"><input type="text" placeholder="{{__('arrive')}}" class="checkin" onclick="fun()"  name="checkin" required/><i class="far fa-calendar-alt"></i></div>
                            <div class="input-wrap"><input type="text" placeholder="{{__('depart')}}" class="checkout"  name="checkout" required /><i class="far fa-calendar-alt"></i></div>
                            <div class="input-wrap">
                                 <select name="amount_people" id="child" class="nice-select" required >
                                      <option disabled="" selected="">{{__('people')}}</option>
                                       @for($i=1;$i<=$roomDetail->category->maxPeople;$i++)
                                         <option value="{{$i}}">{{$i}}</option>
                                       @endfor
                                  </select>
                            </div>
                            <input type="hidden" value="{{$roomDetail->id}}" name="id">
                            <input type="hidden" value="{{$roomDetail->name}}" name="name">
                            <div class="input-wrap">
                                <button type="submit" class="btn filled-btn btn-block">{{__('booking')}}<i class="fas fa-long-arrow-alt-right"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="widget category-widget avson-go-top">
                        <h4 class="widget-title">{{__('category')}}</h4>
                        <div class="single-cat bg-img-center" style="background-image: url('/frontEnd/img/blog/cat-01.jpg');"><a href="/room-details">{{$roomDetail->category->name}}</a></div>
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
                    <div class="section-title text-center" style=" padding-top: 15px;">
                        <h1>{{__('lastproduct')}}</h1>
                    </div>
                    <div class="row">
                        @if(App()->getLocale() == "en")
                         @forelse($RoomRand as $room)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-room">
                                <div class="room-thumb"><img src="{{$room->coverImages}}" alt="Room" /></div>
                                <div class="room-desc">
                                    <div class="room-cat"><p>{{$room->category->name}}</p></div>
                                    <h4><a href="{{ route('room.show',$room->id) }}">{{$room->name}}</a></h4>
                                    <p class="des_text">{{$room->description}}</p>
                                    <ul class="room-info list-inline">
                                        <li><i class="fas fa-bed"></i>{{$room->bad}} Beds</li>
                                        <li><i class="fas fa-bath"></i>{{$room->bath}} Bath</li>
                                        <li><i class="fas fa-ruler-combined"></i>{{$room->area}} M</li>
                                        <li><i class="fas fa-user"></i>{{$room->category->maxPeople}}</li>

                                    </ul>
                                    <div class="room-price">
                                        @if(App()->getLocale()=='en')
                                            <p class="price">{{$room->roomPrice->Weekly}} $</p>
                                        @else
                                            <p class="price">{{number_format($room->roomPrice->Weekly_vi)}} VNĐ</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                          <p>No Room Here</p>
                         @endforelse
                        @else
                            @forelse($RoomRand as $room)
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-room">
                                        <div class="room-thumb"><img src="{{$room->coverImages}}" alt="Room" /></div>
                                        <div class="room-desc">
                                            <div class="room-cat"><p>{{$room->category->name_vi}}</p></div>
                                            <h4><a href="{{ route('room.show',$room->id) }}">{{$room->name_vi}}</a></h4>
                                            <p class="des_text">{{$room->description_vi}}</p>
                                            <ul class="room-info list-inline">
                                                <li><i class="fas fa-bed"></i>{{$room->bad}} Bed</li>
                                                <li><i class="fas fa-bath"></i>{{$room->bath}} Bath</li>
                                                <li><i class="fas fa-ruler-combined"></i>{{$room->area}} M</li>
                                                <li><i class="fas fa-user"></i>{{$room->category->maxPeople}}</li>

                                            </ul>
                                            <div class="room-price">
                                                @if(App()->getLocale()=='en')
                                                    <p class="price">{{$room->roomPrice->Weekly}} $</p>
                                                @else
                                                    <p class="price">{{number_format($room->roomPrice->Weekly_vi)}} VNĐ</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p>No Room Here</p>
                            @endforelse
                        @endif
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
    var checkin_arr = [];
    var checkout_arr = [];
    var checkin_val = document.getElementsByName('checkin[]');
    var checkout_val = document.getElementsByName('checkout[]');
    for (var i = 0; i < checkin_val.length; i++) {
        checkin_arr.push(checkin_val[i].value);
    }
    ;
    for (var i = 0; i < checkout_val.length; i++) {
        checkout_arr.push(checkout_val[i].value);
    }
    ;
    var getDaysArray = function (start, end) {
        for (var arr = [], dt = new Date(start); dt <= end; dt.setDate(dt.getDate() + 1)) {
            arr.push(new Date(dt));
        }
        return arr;
    };
    var test = [];
    for (var i = 0; i < checkin_arr.length; i++) {
        var daylist = getDaysArray(new Date(checkin_arr[i]), new Date(checkout_arr[i]));
        daylist.map((v) => v.toISOString().slice(0, 10)).join("");
        daylist.forEach(covert);
        for (var j = 0; j < daylist.length; j++) {
            test.push(daylist[j]);
        }
    }

    function covert(date, index, arr) {
        arr[index] = ((date.getMonth() > 8) ? (date.getMonth() + 1) : ('0' + (date.getMonth() + 1))) + '-' + ((date.getDate() > 9) ? date.getDate() : ('0' + date.getDate())) + '-' + date.getFullYear()
    }

    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
    var checkin = $('.checkin').datepicker({
        todayHighlight: 'TRUE',
        autoclose: true,
        beforeShowDay: function (date) {
            return date.valueOf() >= now.valueOf();
        },
        datesDisabled: test,
    }).on('changeDate', function (ev) {
        fun();
        $(this).datepicker('hide');
        if (ev.date.valueOf() > checkout.datepicker("getDate").valueOf()
            || !checkout.datepicker("getDate").valueOf()) {
            var newDate = new Date(ev.date);
            newDate.setDate(newDate.getDate() + 1);
            checkout.datepicker("update", newDate);
        }

    });
     function fun()
    {
        var checkout = $('.checkout').datepicker({
            beforeShowDay: function (date) {
                console.log(typeof(checkin));
                if (!checkin.datepicker("getDate").valueOf()) {
                    return date.valueOf() >= new Date().valueOf();
                } else {
                    return date.valueOf() > checkin.datepicker("getDate").valueOf();
                }
            },
            autoclose: true,
            datesDisabled: daylist,
        }).on('changeDate', function (ev) {
        });
    }
</script>
@endsection
