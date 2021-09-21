@extends('layouts.basead')
@section('title', 'Booking Manager')
@section('manager', 'active')
@section('booking','active')
@section('block','display: block;')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- DATA TABLE -->
                        <h3 class="title-5"
                            style="
                    font-family: 'Baloo Tamma', cursive;
                    text-align: center;
                    width: 100%;
                    font-size: 70px;
                    letter-spacing: 5px;">Booking Details Manager</h3>
                        {{-- List item --}}
                        <div class="table-responsive table-responsive-data2 pt-10">
                            <div class="table-data__tool-right">
                                <a href="{{ route('admin.booking.index') }}" class="btn btn-success btn-radius">
                                    <i class="zmdi zmdi-plus"></i>List Booking
                                </a>
                            </div>

                            <table class="table table-data2" style="margin-top: 50px;margin-bottom: 50px">
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
                                            <td>{{$item->unit_price}}</td>
                                            <td>{{$item->price}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            <h3>Total Price  :{{$booking[0]->totalPrice}}</h3>
                        <h3>Booking at  :{{$booking[0]->created_at}}</h3>
                        </div>
                        <!-- END DATA TABLE -->
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Chi Tiết Loại Phòng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="viewform" method="post" action="">
                        <div class="modal-body">
                            <input type="hidden" id="Vid">
                            <div class="form-group">
                                <label for="categoryname">Category Name</label>
                                <input name="name" id="Vname" type="text" class="form-control" placeholder="Category name" required>
                            </div>
                            <div class="form-group">
                                <label for="max_people">Max People</label>
                                <input name="max_people" id="Vmax" type="text" class="form-control" placeholder="Maximun of People" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="Vdes" class="form-control"  rows="3"></textarea>
                            </div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
