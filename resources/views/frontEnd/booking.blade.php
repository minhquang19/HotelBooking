@extends('layouts.base')
@section('title', 'Booking')
@section('active_home', 'active-page')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontEnd/css/tab/css/normalize.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontEnd/css/ticket.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('frontEnd/css/tab/css/demo.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontEnd/css/tab/css/tabs.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontEnd/css/tab/css/tabstyles.css') }}" />
@endsection
@section('content')
	<section class="rooms-warp list-view section-bg ">
    <div class="container-fluid pl-0 pr-0">
        <div class="row">
            <div class="tabs tabs-style-underline">
                <nav>
                    <ul>
                        <li><a href="#section-underline-1" class="icon"><i class="fas fa-info-circle"></i><span style="padding-left: 10px"> {{__('info')}}</span></a></li>
                        <li><a href="#section-underline-2" class="icon "><i class="fas fa-dollar-sign"></i><span style="padding-left: 10px"> {{__('booking')}}</span></a></li>
                        <li><a href="#section-underline-3" class="icon"><i class="fas fa-calendar-check"></i><span style="padding-left: 10px">{{__('booked')}}</span></a></li>
                    </ul>
                </nav>
                <div class="content-wrap">
                    <section id="section-underline-1 information">
                        <div class="container-fluid pl-0 pr-0">
                            <div class="row ">
                                <div class="col-lg-3 col-md-6">
                                    <div class="circle">
                                        <img class="image" src="https://media.istockphoto.com/photos/smiling-businesswoman-looking-at-camera-webcam-make-conference-call-picture-id1129638608?k=6&m=1129638608&s=612x612&w=0&h=8OhKQCq_elLsW_PAWA4n8pzQy3mlkf5a_ztp2Nbv8Y8=">
                                    </div>
                                    <div class="upload-btn-wrapper">
                                        <button class="button">{{__('ChangeAvatar')}}</button>
                                        <input type="file" name="myfile" />
                                    </div>
                                </div>
                                <div class="col-lg-9  col-md-6 widget fillter-widget">
                                    <h1 class="widget-title" style="padding-bottom: 20px;margin: 0px">{{__('info')}}</h1>
                                    <form action="" method="POST">
                                        <div class="input-wrap infoaccount">
                                            <label>{{__('name')}}</label>
                                            <input name="name" type="text"  value="{{ Auth::user()->name }}"/>
                                        </div>
                                        <div class="input-wrap infoaccount">
                                            <label for="arrive-date">{{__('email')}}</label>
                                            <input type="text" name="email" value="{{ Auth::user()->email }}"/>
                                        </div>
                                        <div class="input-wrap infoaccount">
                                            <label for="arrive-date">{{__('address')}}</label>
                                            <input type="text" name="address"  value="{{ Auth::user()->address }}"/>
                                        </div>
                                        <div class="input-wrap infoaccount">
                                            <label for="arrive-date">{{__('phone')}}</label>
                                            <input type="text"  name="phonenumber" value="{{ Auth::user()->phonenumber }}"/>
                                        </div>
                                        <div class="input-wrap infoaccount" style="padding-top: 10px">
                                            <label style="float: left;padding-left: 5%">{{__('gender')}}</label>
                                            <div class="gender">
                                                <input type='radio' id='male' checked='' name='sex'
                                                       value="male" {{ (Auth::user()->sex=="Male")? "checked" : "" }}>
                                                <label for='male'>{{__('Male')}}</label>
                                                <input type='radio' id='female' name='sex'
                                                       value="female" {{ (Auth::user()->sex=="Female")? "checked" : "" }}>
                                                <label for='female'>{{__('Female')}}</label>
                                            </div>
                                        </div>
                                        <button class="button">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section id="section-underline-2 Price">
                        <div class="container-fluid pl-0 pr-0">
                            <div class="sidebar-wrap">
                                <div class="widget fillter-widget">
                                    <h3 class="widget-title">Your Booking</h3>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Room Name</th>
                                            <th>Image</th>
                                            <th>Check In</th>
                                            <th>Check Out</th>
                                            <th>Date</th>
                                            <th>People</th>
                                            <th>Area</th>
                                            <th>Unit Price</th>
                                            <th>Price</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($items == null)
                                            <span>No room booked</span>
                                        @else
                                            @foreach($items as $item)
                                                <tr>
                                                    <td>{{$loop->index+1}}</td>
                                                    <td>{{$item['room_name']}}</td>
                                                    <td><img class="img-thumbnail" style="max-width: 120px !important;"
                                                             src="upload/cover/{{$item['image']}}"></img></td>
                                                    <td>{{$item['checkin']}}</td>
                                                    <td>{{$item['checkout']}}</td>
                                                    <td>{{$item['date']}}</td>
                                                    <td>{{$item['amount']}}</td>
                                                    <td>{{$item['area']}}</td>
                                                    <td>{{$item['unit_price']}}</td>
                                                    <td>{{$item['price']}}</td>
                                                    <td>
                                                        <form id="deleteForm"
                                                              action="{{ route('booking.destroy',$item['session_id']) }}"
                                                              method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button onclick="return confirm('Are you sure?')"
                                                                    data-toggle="tooltip"
                                                                    data-placement="top" title="Delete">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-3 float-right h-25">
                                <div class="input-wrap">
                                    Total Price : {{$totalPrice}}
                                    <div id="paypal-button"></div>
                                    <a href="/booking/add" onclick="return confirm('Are you sure?')" type="submit"
                                       style="height: 50px;line-height: 50px;" class="btn filled-btn btn-block">Booking
                                        <i class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section id="section-underline-3 Images">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sidebar-wrap" style="height: 100%;">
                                    <div class="widget fillter-widget" style="height: 100%;">
                                        <h4 class="widget-title">Your Booked Room</h4>
                                        @if($booked == null)
                                            <p>You no book any room</p>
                                        @else
                                            @foreach($booked as $test)
                                                <div class="cardWrap ">
                                                    <div class="card cardLeft">
                                                        <h1>Booked Room </h1>
                                                        <table class="table" style="margin-top: 50px">
                                                            <thead class="thead">
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Name</th>
                                                                <th>Check In</th>
                                                                <th>Check Out</th>
                                                                <th>Date</th>
                                                                <th>Amount People</th>
                                                                <th>Unit Price</th>
                                                                <th>Price</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($book->where('booking_id',$test->id) as $item)
                                                                <tr>
                                                                    <td>{{$loop->index+1}}</td>
                                                                    <td>{{$item->room_name}}</td>
                                                                    <td>{{$item->checkin}}</td>
                                                                    <td>{{$item->checkout}}</td>
                                                                    <td>{{$item->amount_date}}</td>
                                                                    <td>{{$item->amount}}</td>
                                                                    <th>{{$item->unit_price}}</th>
                                                                    <th>{{$item->price}}</th>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="card cardRight">
                                                        <div class="eye"></div>
                                                        <div class="number">
                                                            <h3>{{$book->where('booking_id',$test->id)->count()}}</h3>
                                                            <span>Room</span>
                                                        </div>
                                                        <span class="title_book">Total Price  : {{$test->totalPrice}}</span>
                                                        <span class="title_book">Booked At    : {{$test->created_at}}</span>
                                                        <span class="title_book">Booking Id   : {{$test->id}}</span>
                                                        <div class="barcode"></div>

                                                    </div>

                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div><!-- /content -->
            </div><!-- /tabs -->
        </div>
    </div>
</section>
@endsection
@section('scripts')
    @if(Session::has('success'))
        <script>
            toastr.success("{{ session("success") }}")
        </script>
    @endif
    @if(Session::has('error'))
        <script>
            toastr.error("{{ session("error") }}")
        </script>
    @endif
    <script src="{{ asset('frontEnd/css/tab/js/cbpFWTabs.js') }}"></script>
    <script>
        (function() {
            [].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
                new CBPFWTabs( el );
            });
        })();
    </script>
    <script>
        $(function()
        {
            var checkbox = $('#checkbox'), path = $('#path'), bow = $('#bow'), male = $('#male');

            checkbox.on('change',function()
            {
                if( $(this).is(':checked') )
                {
                    male.removeClass('ma');
                    setTimeout(function(){ path.addClass('fe'); male.addClass('fe'); bow.addClass('fe'); },390);
                }
                else
                {
                    male.addClass('ma');
                    setTimeout(function(){ path.removeClass('fe'); male.removeClass('fe'); bow.removeClass('fe'); },390);
                }
            });
        });
    </script>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
{{--    --------------------------PayPal---------------------------}}
    <script>
        paypal.Button.render({
            // Configure environment
            env: 'sandbox',
            client: {
                sandbox: 'demo_sandbox_client_id',
                production: 'demo_production_client_id'
            },
            // Customize button (optional)
            locale: 'en_US',
            style: {
                size: 'large',
                color: 'gold',
                shape: 'pill',
            },

            // Enable Pay Now checkout flow (optional)
            commit: true,

            // Set up a payment
            payment: function(data, actions) {
                return actions.payment.create({
                    transactions: [{
                        amount: {
                            total: '0.01',
                            currency: 'USD'
                        }
                    }]
                });
            },
            // Execute the payment
            onAuthorize: function(data, actions) {
                return actions.payment.execute().then(function() {
                    // Show a confirmation message to the buyer
                    window.alert('Thank you for your purchase!');
                });
            }
        }, '#paypal-button');

    </script>

    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
@endsection

