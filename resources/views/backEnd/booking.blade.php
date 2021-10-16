@extends('layouts.basead')
@section('title', 'Booking Manager')
@section('titlePage', 'Booking Manager')
@section('manager', 'active')
@section('booking','active')
@section('style')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet' />
    <link rel="stylesheet" href="{{asset('backEnd/css/booking.css')}}">
@endsection
@section('block','display: block;')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="custom-tab">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-home" role="tab" aria-controls="custom-nav-home"
                                   aria-selected="true">Calendar Booking</a>
                                <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-profile" role="tab" aria-controls="custom-nav-profile"
                                   aria-selected="false">Table Booking</a>
                            </div>
                        </nav>
                        <div class="tab-content p-2" id="nav-tabContent" style="background: white">
                            <div class="tab-pane fade show active" id="custom-nav-home" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                                <div class="mt-3">
                                    <div class="card">
                                        <div class="card-body p-0">
                                            {!! $calendar->calendar() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-nav-profile" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead style="background-color: #333;color: #fff !important;text-align: center" >
                                        <tr>
                                            <th>TT</th>
                                            <th>Booking Id</th>
                                            <th>User Name</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>phonenumber</th>
                                            <th>Total Price</th>
                                            <th>Booking At</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($listBooked == null)
                                            <p>No room booked</p>
                                        @else
                                            @foreach($listBooked as $item)
                                                <tr>
                                                    <td>{{$loop->index+1}}</td>
                                                    <td>{{$item->id}}</td>
                                                    <td>{{$item->users->name}}</td>
                                                    <td>{{$item->users->email}}</td>
                                                    <td>{{$item->users->address}}</td>
                                                    <td>{{$item->users->phonenumber}}</td>
                                                    <td>{{$item->totalPrice}}</td>
                                                    <td>{{$item->created_at}}</td>
                                                    <td>
                                                        <div class="table-data-feature">
                                                            <a href="{{route('admin.booking.show',$item->id)}}" class="item view_btn" data-toggle="tooltip" data-placement="top" title="View">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- List item --}}

                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>


    <!-- calendar modal -->
    <div id="modal-view-event" class="modal modal-top fade calendar-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h4 class="modal-title"><span class="event-icon"></span><span class="event-title"></span></h4>
                    <div class="event-body"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-view-event-add" class="modal modal-top fade calendar-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="add-event">
                    <div class="modal-body">
                        <h4>Add Event Detail</h4>
                        <div class="form-group">
                            <label>Event name</label>
                            <input type="text" class="form-control" name="ename">
                        </div>
                        <div class="form-group">
                            <label>Event Date</label>
                            <input type='text' class="datetimepicker form-control" name="edate">
                        </div>
                        <div class="form-group">
                            <label>Event Description</label>
                            <textarea class="form-control" name="edesc"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Event Color</label>
                            <select class="form-control" name="ecolor">
                                <option value="fc-bg-default">fc-bg-default</option>
                                <option value="fc-bg-blue">fc-bg-blue</option>
                                <option value="fc-bg-lightgreen">fc-bg-lightgreen</option>
                                <option value="fc-bg-pinkred">fc-bg-pinkred</option>
                                <option value="fc-bg-deepskyblue">fc-bg-deepskyblue</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Event Icon</label>
                            <select class="form-control" name="eicon">
                                <option value="circle">circle</option>
                                <option value="cog">cog</option>
                                <option value="group">group</option>
                                <option value="suitcase">suitcase</option>
                                <option value="calendar">calendar</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" >Save</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>

    {!! $calendar->script() !!}

    @endsection
