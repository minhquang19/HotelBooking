@extends('layouts.base')
@section('title','MoonLight - '.__('room'))
@section('active_room', 'active-page')
@section('content')
    <main>
        <section class="breadcrumb-area d-flex align-items-center position-relative bg-img-center"
                 style="background-image: url('/frontEnd/img/bg//breadcrumb-01.jpg');">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h1>{{__('room')}}</h1>
                    <ul class="list-inline">
                        <li><a href="/">{{__('home')}}</a></li>
                        <li><i class="fas fa-angle-double-right"></i></li>
                        <li>{{__('room')}}</li>
                    </ul>
                </div>
            </div>
            <h1 class="big-text">Room</h1>
        </section>
        <section class="rooms-warp list-view section-bg section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        @if($room_data == null)
                            <p>No Room</p>
                        @else
                            @foreach($room_data as $item)
                                <div class="single-room list-style avson-go-top">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col-lg-6">
                                            <div class="room-thumb"><img src="upload/cover/{{$item->coverImages}}" alt="Room"/></div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="room-desc">
                                                <div class="room-cat">
                                                @if(App()->getLocale()=='en')
                                                    <p>{{$item->category->name}}</p>
                                                </div>
                                                <h4><a href="{{ route('room.show',$item->id) }}">{{$item->name}}</a></h4>
                                                @else
                                                    <p>{{$item->category->name_vi}}</p>
                                                 </div>
                                                 <h4><a href="{{ route('room.show',$item->id) }}">{{$item->name_vi}}</a></h4>
                                                 @endif
                                                        <ul class="room-info list-inline">
                                                            <li><i class="fas fa-bed"></i>{{$item->bad}} Bads</li>
                                                            <li><i class="fas fa-bath"></i>{{$item->bath}} Baths</li>
                                                            <li><i class="fas fa-ruler-combined"></i>{{$item->area}} m
                                                            </li>
                                                        </ul>
                                                        <div class="room-price"><p>{{$item->roomPrice->Weekly}}</p></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                    </div>
                    <div class="col-lg-4">
                        <div class="sidebar-wrap">
                            <div class="widget fillter-widget">
                                <h4 class="widget-title">{{__('book')}}</h4>
                                <form action="" method="GET">
                                    <div class="input-wrap"><input type="text" placeholder="{{__('arrive')}}"
                                                                   name="checkin" id="arrive-date"/><i
                                            class="far fa-calendar-alt"></i></div>
                                    <div class="input-wrap"><input type="text" placeholder="{{__('depart')}}"
                                                                   name="checkout" id="depart-date"/><i
                                            class="far fa-calendar-alt"></i></div>
                                    <div class="input-wrap">
                                        <select name="category" id="rooms" class="nice-select">
                                            <option disabled="" value="DEFAULT" selected="">{{__('category')}}</option>
                                            @forelse($category_data as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @empty
                                                <option value="">No Category Here</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="input-wrap">
                                        <div class="price-range-wrap">
                                            <div class="slider-range">
                                                <div id="slider-range"
                                                     class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                    <span class="ui-slider-handle ui-state-default ui-corner-all"
                                                          tabindex="0" style="left: 3.57143%;"></span>
                                                    <span class="ui-slider-handle ui-state-default ui-corner-all"
                                                          tabindex="0" style="left: 94.6429%;"></span>
                                                </div>
                                            </div>
                                            <div class="price-ammount">
                                                <input type="text" id="amount" placeholder="Add Your Price"/>
                                                <input type="hidden" id="min" name="min" value="0">
                                                <input type="hidden" id="max" name="max" value="200">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-wrap">
                                        <div class="checkboxes">
                                            @forelse($tag as $item)
                                                @php
                                                    $checked =[];
                                                    if(isset($_GET['filtertag']))
                                                    {
                                                        $checked = $_GET['filtertag'];
                                                    }
                                                @endphp
                                                <p><input type="checkbox" name="filtertag[]" id="guest-room"
                                                          value="{{$item->id}}"
                                                          @if(in_array($item->id,$checked)) checked @endif />
                                                    @if(@app()->getLocale() =='en')
                                                        <label for="filtertag">{{$item->name}}</label>
                                                    @else
                                                        <label for="filtertag">{{$item->name_vi}}</label>
                                                    @endif
                                                </p>
                                            @empty
                                                <p>No Tag Here</p>
                                            @endforelse
                                            @endif
                                        </div>
                                    </div>
                                    <div class="input-wrap">
                                        <button type="submit" class="btn filled-btn btn-block">{{__('filter')}}<i
                                                class="fas fa-long-arrow-alt-right"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{$room_data->links('vendor.pagination.bootstrap-4')}}
                </div>
        </section>
    </main>
@endsection
