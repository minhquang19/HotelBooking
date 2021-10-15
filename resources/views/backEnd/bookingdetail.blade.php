@extends('layouts.basead')
@section('title', 'Booking Manager')
@section('titlePage', 'Booking Manager')
@section('manager', 'active')
@section('booking','active')
@section('block','display: block;')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive table-responsive-data2">
                            <div class="table-data__tool-right">
                                <a href="{{ route('admin.booking.index') }}" class="btn btn-success btn-radius">
                                   <i class="fa fa-arrow-left"></i> Back
                                </a>
                            </div>
                            <div class="card mt-1">
                                <div class="card-header bg-dark">
                                    <h2 class="text-center text-light">Booking detail</h2>
                                </div>
                                <div class="card-body">
                                    <div class="custom-tab">
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link active" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-home" role="tab" aria-controls="custom-nav-home"
                                                   aria-selected="true">Booking</a>
                                                <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-profile" role="tab" aria-controls="custom-nav-profile"
                                                   aria-selected="false">Booking Detail</a>
                                            </div>
                                        </nav>
                                        <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="custom-nav-home" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="textbooking row">
                                                            <strong class="col-4">User Email</strong>
                                                            <strong class="col-1" >:</strong>
                                                            <p class="col-7">{{$booking->users->email}}</p>
                                                        </div>
                                                        <div class="textbooking row">
                                                            <strong class="col-4">Name</strong>
                                                            <strong class="col-1" >:</strong>
                                                            <p class="col-7">{{$booking->users->name}}</p>
                                                        </div>
                                                        <div class="textbooking row">
                                                            <strong class="col-4">Phone Number</strong>
                                                            <strong class="col-1" >:</strong>
                                                            <p class="col-7">{{$booking->users->phonenumber}}</p>
                                                        </div><div class="textbooking row">
                                                            <strong class="col-4">Address</strong>
                                                            <strong class="col-1" >:</strong>
                                                            <p class="col-7">{{$booking->users->address}}</p>
                                                        </div>


                                                    </div>
                                                    <div class="col-6">
                                                        <div class="textbooking row">
                                                            <strong class="col-4">Total Price</strong>
                                                            <strong class="col-1" >:</strong>
                                                            <p class="col-7">{{number_format($booking->totalPrice_vi)}} VN</p>
                                                        </div>
                                                        <div class="textbooking row">
                                                            <strong class="col-4">Booking At</strong>
                                                            <strong class="col-1" >:</strong>
                                                            <p class="col-7">{{$booking->created_at}} </p>
                                                        </div>
                                                        <div class="textbooking row">
                                                            <strong class="col-4">Pay By</strong>
                                                            <strong class="col-1" >:</strong>
                                                            <p class="col-7">{{$booking->payment}} </p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="custom-nav-profile" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                                                <table class="table table-data2" style="margin-top: 10px;margin-bottom: 50px;text-align: center">
                                                    <thead style="background-color: #333;color: #fff !important" >
                                                    <tr>
                                                        <th>TT</th>
                                                        <th>Room Name</th>
                                                        <th>Check In</th>
                                                        <th>Check Out</th>
                                                        <th>Amount Date</th>
                                                        <th>Amount PeoPle</th>
                                                        <th>Unit Price</th>
                                                        <th>Price</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if($bookingdetail == null)
                                                        <p>No room booked</p>
                                                    @else
                                                        @foreach($bookingdetail as $item)
                                                            <tr>
                                                                <td>{{$loop->index+1}}</td>
                                                                <td>{{$item->room_name}}</td>
                                                                <td>{{$item->checkin}}</td>
                                                                <td>{{$item->checkout}}</td>
                                                                <td>{{$item->amount_date}}</td>
                                                                <td>{{$item->amount}}</td>
                                                                <td>{{number_format($item->unit_price_vi)}} VNĐ</td>
                                                                <td>{{number_format($item->price_vi)}} VNĐ</td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          </div>
@endsection
