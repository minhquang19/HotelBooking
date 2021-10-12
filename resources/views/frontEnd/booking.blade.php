@extends('layouts.base')
@section('title', 'Booking')
@section('active_home', 'active-page')
@section('style')
    <link rel="stylesheet" href="{{ asset('backEnd/toastr/toastr.min.css') }}">
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
                        <li><a id="info_click" href="#sectioninfo" class="icon"><i class="fas fa-info-circle"></i><span style="padding-left: 10px"> {{__('info')}}</span></a></li>
                        <li><a id="booking_click" href="#sectionbooking" class="icon "><i class="fas fa-dollar-sign"></i><span style="padding-left: 10px"> {{__('booking')}}</span></a></li>
                        <li><a id="booked_click" href="#sectionbooked" class="icon"><i class="fas fa-calendar-check"></i><span style="padding-left: 10px">{{__('booked')}}</span></a></li>
                    </ul>
                </nav>
                <div class="content-wrap">
                    <section id="sectioninfo">
                        <div class="container-fluid pl-0 pr-0">
                            <div class="row ">
                                <div class="col-lg-3 col-md-6">
                                    <div class="circle">
                                        <img class="image" src="{{Auth::user()->avatar}}">
                                    </div>
                                    <div class="upload-btn-wrapper">
                                        <form action="booking/updateAvatar" enctype="multipart/form-data" method="POST">
                                            @csrf
                                            @method('POST')
                                            <input type="hidden" id="userId" name="id" value="{{Auth::user()->id}}">
                                            <div class="form-group file-upload" style="margin-top: 26px">
                                                <div class="file-select">
                                                    <div class="file-select-button" id="fileName" style="color: white">Choose File</div>
                                                    <div class="file-select-name" id="noFile">No file chosen...</div>
                                                    <input type="file" name="avatar" id="chooseFile">
                                                </div>
                                            </div>
                                            <input type="hidden" name="email" value="{{Auth::user()->email}}">
                                            <button class="btn button" type="submit">{{__('changeavt')}}</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-9  col-md-6 widget fillter-widget">
                                    <h1 class="widget-title" style="padding-bottom: 20px;margin: 0px;margin-top: 20px">{{__('info')}}</h1>
                                    <form action="/booking/updateInfo" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{Auth::user()->id}}">
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
                                                       value="male" {{ (Auth::user()->sex=="male")? "checked" : "" }}>
                                                <label for='male'>{{__('Male')}}</label>
                                                <input type='radio' id='female' name='sex'
                                                       value="female" {{ (Auth::user()->sex=="female")? "checked" : "" }}>
                                                <label for='female'>{{__('Female')}}</label>
                                            </div>
                                        </div>
                                        <button class="btn button">{{__('updateinfo')}}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section id="sectionbooking">
                        <div class="container-fluid pl-0 pr-0">
                            <div class="sidebar-wrap">
                                <div class="widget fillter-widget">
                                    <h1 class="widget-title" style=" margin: 0;padding: 0;margin-bottom: 20px;">{{__('booking')}}</h1>
                                    <table class="table" style="border-bottom: 1px solid black">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">{{__('roomname')}}</th>
                                                <th scope="col">{{__('image')}}</th>
                                                <th scope="col">Check In</th>
                                                <th scope="col">Check Out</th>
                                                <th scope="col">{{__('date')}}</th>
                                                <th scope="col">{{__('people')}}</th>
                                                <th scope="col">{{__('area')}}</th>
                                                <th scope="col">{{__('unitPrice')}}</th>
                                                <th scope="col">{{__('price')}}</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if($cart == null)
                                            <p>No room booked</p>
                                        @else
                                            @forelse($cart as $item)
                                                <tr>
                                                    <td hidden class="room_id">{{$item['room_id']}}</td>
                                                    <td style="margin: 0 auto">{{$loop->index+1}}</td>
                                                    <td align="center">{{$item['room_name']}}</td>
                                                    <td align="center">
                                                    <img class="img-thumbnail" style="max-width: 100px !important;" src="{{$item['image']}}"/></td>
                                                    <td>{{$item['checkin']}}</td>
                                                    <td>{{$item['checkout']}}</td>
                                                    <td>{{$item['date']}}</td>
                                                    <td>{{$item['amount']}}</td>
                                                    <td>{{$item['area']}}</td>
                                                    @if(App()->getLocale() =='en')
                                                    <td>{{$item['unit_price']}} $</td>
                                                    <td>{{$item['price']}} $</td>
                                                    @else
                                                        <td>{{number_format($item['unit_price_vi'])}} </td>
                                                        <td>{{number_format($item['price_vi'])}} </td>
                                                    @endif
                                                    <td>
                                                        <form id="deleteForm" action="{{ route('booking.destroy',$item['session_id']) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button onclick="return confirm('Are you sure?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                            <button class="view_detail" type="button" data-toggle="modal" data-target="#viewPrice">
                                                                <i class="fas fa-eye"></i>
                                                            </button>
                                                            <div class="modal fade" id="viewPrice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">{{__('detailPrice')}}</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <table class="table">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th scope="col">{{__('day')}}</th>
                                                                                    <th scope="col">{{__('unitPrice')}}</th>
                                                                                    <th scope="col">{{__('unitPrice')}}</th>
                                                                                    <th scope="col"></th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody class="content">
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="button" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                   <div class="row">
                                        <div class="col-lg-5  h-25">
                                            @if(App()->getLocale() == "en")
                                                <div class="input-wrap" style="text-align: left">
                                                    <div  style="color: #0f172b;font-size: 22px;">
                                                        <span class="totalPrice">Toltal Price : {{$totalPrice}} $</span>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="input-wrap" style="text-align: left">
                                                    <div class="row" style="color: #0f172b;font-size: 22px;">
                                                        <span class="totalPrice_vi">Tổng Tiền : {{number_format($totalPriceVi)}} VND</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-3 float-right  h-25">
                                            <div class="input-wrap">
                                                <form action="{{route('booking.payment')}}" method="post">
                                                    @csrf
                                                    <span>Phương thức thanh toán</span>
                                                    <input type="hidden" id="totalPrice" name="totalPrice" value="{{$totalPrice}}">
                                                    <input type="hidden" name="totalPrice_vi" value="{{$totalPriceVi}}">
                                                    <input type="hidden" name="email" value="{{Auth::user()->email}}">
                                                    <button type="submit" style="height: 50px;line-height: 50px;width: 100%;" class="book button">Thanh toán qua VnPay
                                                    </button>
                                                </form>
                                            </div>
                                            <div id="paypal-button"></div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                        </div>
                    </section>
                    <section id="sectionbooked">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sidebar-wrap">
                                    <div class="widget fillter-widget" style="height: 100%;">
                                        <h1 class="widget-title">{{__('booked')}}</h1>
                                        @if($bookedRoom == null)
                                            <p>You no book any room</p>
                                        @else
                                            @foreach($bookedRoom as $booked)
                                                <div class="cardWrap row ">
                                                    <div class="card cardLeft col-lg-9 ">
                                                        <h1>{{__('booked')}}</h1>
                                                        <table class="table">
                                                            <thead >
                                                            <tr style="font-size: 19px">
                                                                <th scope="col">Id</th>
                                                                <th>{{__('roomname')}}</th>
                                                                <th>Check In</th>
                                                                <th>Check Out</th>
                                                                <th>{{__('date')}}</th>
                                                                <th>{{__('people')}}</th>
                                                                <th>{{__('unitPrice')}}</th>
                                                                <th>{{__('price')}}</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($bookingDetail as $item)
                                                                <tr style="font-size: 19px">
                                                                    <td scope="col">{{$loop->index+1}}</td>
                                                                    <td>{{$item->room_name}}</td>
                                                                    <td>{{$item->checkin}}</td>
                                                                    <td>{{$item->checkout}}</td>
                                                                    <td>{{$item->amount_date}}</td>
                                                                    <td>{{$item->amount}}</td>
                                                                    @if(App()->getLocale() =='en')
                                                                    <th>{{$item->unit_price}}</th>
                                                                    <th>{{$item->price}}</th>
                                                                    @else
                                                                    <th>{{number_format($item->unit_price_vi)}}</th>
                                                                    <th>{{number_format($item->price_vi)}}</th>
                                                                    @endif
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <div class="card cardRight col-lg-3">
                                                        <div class="number">
                                                            <h1 style="">0{{$bookingDetail->count()}} Room</h1>
                                                        </div>
                                                        <span class="title_book">
                                                            {{__('totalPrice')}} :
                                                            @if(App()->getLocale() =='en'){{$booked->totalPrice}} $
                                                            @else {{number_format($booked->totalPrice_vi)}}VNĐ @endif
                                                        </span>
                                                        <span class="title_book">{{__('bookat')}}: {{explode(" ",$booked->created_at)[0] }}</span>
                                                        <span class="title_book">{{__('payment')}}  : {{$booked->payment}}</span>
                                                        <div class="barcode"></div>
                                                    </div>

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
{{----------------------------Tab Select---------------------------}}
    <script src="{{ asset('frontEnd/css/tab/js/cbpFWTabs.js') }}"></script>
    <script>
        (function() {
            [].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
                new CBPFWTabs( el );
            });
        })();
    </script>
    <script>
        var totalPrice = $('.totalPrice_des').text();
        if ( location.hash != 0 && location.hash == '#sectionbooking' ){
            $('#booking_click')[0].click();
        }
        if ( location.hash != 0 && location.hash == '#sectioninfo' ){
            $('#info_click')[0].click();
        }
        if ( location.hash != 0 && location.hash == '#sectionbooked' ){
            $('#booked_click')[0].click();
        }
        //Chose FIle
        $('#chooseFile').bind('change', function () {
            var filename = $("#chooseFile").val();
            if (/^\s*$/.test(filename)) {
                $(".file-upload").removeClass('active');
                $("#noFile").text("No file chosen...");
            }
            else {
                $(".file-upload").addClass('active');
                $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
            }
        });
    </script>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
{{----------------------------PayPal---------------------------}}
    <script>
        var userId = $('#userId').val();
        var totalPrice = $('#totalPrice').val();
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
                size: 'medium',
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
                            total: totalPrice,
                            currency: 'USD'
                        }
                    }]
                });
            },
            // Execute the payment
            onAuthorize: function(data, actions) {
               return  window.location ='/booking/payment/return';
            }
        }, '#paypal-button');
    </script>
{{----------------------------View Modal---------------------------}}
    <script>
    $(document).ready(function()
    {
        $('.view_detail').on('click',function(){
            $('#viewPrice').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children('td').map(function(){
                return $(this).text();
            }).get();
            var roomId = data[0];
            $.ajax({
                url: '{{route('booking.detail')}}',
                data: { id: roomId },
                dataType: 'jsonp',
                type: 'GET',
            })
                .done(function(response) {
                    $('#results').html(response);
                });

        });
    });
</script>
{{----------------------------File Selected---------------------------}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
@endsection

