@extends('layouts.basead')
@section('title', 'Admin')
@section('index', 'active')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row m-t-25">
                <div class="col-sm-6 col-lg-3">
                    <div class="overview-item overview-item--c1">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="zmdi zmdi-account-o"></i>
                                </div>
                                <div class="text">
                                    <h2>{{$userAmount}}</h2>
                                    <span>User Account</span>
                                </div>
                            </div>
                            <div class="overview-chart">
                                <canvas id="widgetChart1"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="overview-item overview-item--c2">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="zmdi zmdi-shopping-cart"></i>
                                </div>
                                <div class="text">
                                    <h2>{{$bookingAmount}}</h2>
                                    <span>Booking</span>
                                </div>
                            </div>
                            <div class="overview-chart">
                                <canvas id="widgetChart2"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="overview-item overview-item--c3">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="far fa-building"></i>
                                </div>
                                <div class="text">
                                    <h2>{{$roomAmount}}</h2>
                                    <span>Room</span>
                                </div>
                            </div>
                            <div class="overview-chart">
                                <canvas id="widgetChart3"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="overview-item overview-item--c4">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="far fa-newspaper"></i>
                                </div>
                                <div class="text">
                                    <h2>{{$blogAmount}}</h2>
                                    <span>Blogs</span>
                                </div>
                            </div>
                            <div class="overview-chart">
                                <canvas id="widgetChart4"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
               <h1 style="padding-bottom: 30px;">Recently Booking List</h1>
                <div class="col-lg-12 sidebar-wrap">
                    <div class="widget fillter-widget">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th>TT</th>
                                <th>Room Name</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th>Amount Date</th>
                                <th>Amount People</th>
                                <th>Unit Price</th>
                                <th>Price</th>
                                <th>Booked at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($listBooking == null)
                                <p>No room booked</p>
                            @else
                                @forelse($listBooking as $item)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$item->room_name}}</td>
                                        <td>{{$item->checkin}}</td>
                                        <td>{{$item->checkout}}</td>
                                        <td>{{$item->amount_date}}</td>
                                        <td>{{$item->amount}}</td>
                                        <td>{{$item->unit_price}}</td>
                                        <th>{{$item->price}}</th>
                                        <th>{{$item->created_at}}</th>
                                    </tr>
                                @empty
                                    <p>No Booking Today</p>
                                @endforelse
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
@endsection
