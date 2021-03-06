@extends('layouts.basead')
@section('title', 'Room Detail')
@section('manager', 'active')
@section('titlePage', 'Room Detail')
@section('room','active')
@section('style')
    <style>
        input[type="checkbox"]{
            display:none;
        }

        input[type="checkbox"]:hover + label:before{
            opacity: .5;
        }

        .checkbox{
            display:inline-block;
            position:relative;
            padding-left:40px;
            line-height: 40px;
            font-size: 20px;
            cursor: pointer;
            color: #111;
            font-weight: 600;
        }

        .checkbox:before{
            z-index:15;
            content: '';
            position:absolute;
            left:0;
            top: 6px;
            transition:all 0.3s ease;
            cursor:pointer;
            width:20px;
            border-width: 4px;
            border-style: solid;
            border-color: #444;
            height:20px;
        }
        input[type="checkbox"]:checked + label{
            color:#000;
        }

        input[type="checkbox"]:checked +  label:before{
            border-color: transparent;
            border-left-color: #2ecc71;
            border-bottom-color: #2ecc71;
            transform:rotate(-50deg);
            width:22px;
            height:12px;
            top: 3px;
        }
        h1.tagroom{
            text-align: center;
            margin-bottom: 25px;
            background: #2CC185;
            color: white;
            font-size: 30px;
            height: 50px;
            line-height: 50px;
        }
    </style>
@endsection
@section('block','display: block;')
@section('tabcontrol')
<link rel="stylesheet" type="text/css" href="{{ asset('Admin/tab/css/normalize.css') }}" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="{{ asset('Admin/tab/css/demo.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('Admin/tab/css/tabs.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('Admin/tab/css/tabstyles.css') }}" />
@endsection
@section('content')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <div class="table-data__tool" style="margin-bottom: 50px;">
                        <div class="table-data__tool-left">
                        </div>
                        <div class="table-data__tool-right" style=" position: absolute;top: 0px;">
                            <a href="{{ route('admin.room.index') }}" class="btn btn-success btn-radius">
                                <i class="zmdi zmdi-plus"></i>List Room
                            </a>
                        </div>
                    </div>
                    {{-- TAB CONTROL --}}
                <section>
                <div class="tabs tabs-style-underline">
                    <nav>
                        <ul>
                            <li><a href="#section-underline-1" class="icon"><i class="fas fa-info-circle"></i><span> INFORMATION</span></a></li>
                            <li><a href="#section-underline-2" class="icon "><i class="fas fa-dollar-sign"></i><span> PRICE</span></a></li>
                            <li><a href="#section-underline-4" class="icon"><i class="fas fa-image"></i><span> IMAGES</span></a></li>
                            <li><a href="#section-underline-5" class="icon"><span><i class="fas fa-tag"></i> TAGS</span></a></li>
                        </ul>
                    </nav>
                    <div class="content-wrap">
                        <section id="section-underline-1 information">
                            <div class="container-fluid pl-0 pr-0">
                                <div class="row ">
                                <div class="col-lg-8">
                                    <div class="table-responsive table-responsive-data2">
                                        <table class="table table-data2">
{{--                                            @foreach($temp as $key => $item)--}}
{{--                                                <input type="hidden" name="checkin[]"  value="{{$item->checkin}}">--}}
{{--                                                <input type="hidden" name="checkout[]"  value="{{$item->checkout}}">--}}
{{--                                            @endforeach--}}
                                            <thead>
                                                <tr style="background: #2CC185;">
                                                    <th>Room Detail</th>
                                                    <th></th>

                                                </tr>
                                            </thead>
                                            <tbody class="info_detail">
                                                <tr>
                                                    <td>ID :</td>
                                                    <td>{{$room->id}}</td>
                                                </tr>
                                                 <tr>
                                                    <td>Name :</td>
                                                    <td>{{$room->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td>CateGory :</td>
                                                    <td>{{$room->category->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Visibility :</td>
                                                    <td>{{( $room->visibility == 1)?"Display":"Hidden" }}</td>
                                                </tr>
                                                 <tr>
                                                    <td>Status :</td>
                                                    <td>@switch($room->status)
                                                        @case(0)
                                                            {{"Emty"}}
                                                            @break
                                                        @case(1)
                                                            {{"Full"}}
                                                            @break
                                                        @case(2)
                                                             {{"Ordered"}}
                                                            @break
                                                        @default
                                                    @endswitch
                                                    </td>
                                                </tr>
                                                 <tr>
                                                    <td>Description :</td>
                                                    <td class="full-des">{{ $room->description}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <img  src="{{ $room->coverImages }}" style="" class="">
                                </div>
                                </div>
                            </div>
                        </section>
                        <section id="section-underline-2 Price">
                            <div class="container-fluid pl-0 pr-0">
                                <div class="row ">
                                <div class="col-lg-10">
                                    <div class="table-responsive table-responsive-data2">
                                        <table class="table table-data2"  id="mytable">
                                            <thead>
                                                <tr style="background: #2CC185;">
                                                    <th>Room ID</th>
                                                    <th>Weekends</th>
                                                    <th>Weekly</th>
                                                    <th>Weekends VN</th>
                                                    <th>Weekly VN</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody class="info_detail">
                                                @forelse($roomPrice as $item)
                                                <tr>
                                                    <input type="hidden" value="{{$item->room_id}}">
                                                   <td>{{$item->room->name}}</td>
                                                   <td>{{$item->Weekends}} $</td>
                                                   <td>{{$item->Weekly}} $</td>
                                                   <td>{{$item->Weekends_vi}} VN??</td>
                                                   <td>{{$item->Weekly_vi}} VN??</td>
                                                    <td>
                                                       <button class="item edit_btn" data-toggle="tooltip" data-placement="top" title="Edit">
                                                         <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                @empty
                                                    <p>No Price Here</p>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-success btn-sm btn-radius" id="add_btn"  data-toggle="modal" data-target="#addModal">
                                        <i class="zmdi zmdi-plus"></i>add room
                                    </button>
                                </div>
                                </div>
                            </div>
                        </section>
                        <section id="section-underline-4 Images">
                            <form id="file-upload-form" class="uploader" action="{{route('admin.image.store')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <input type="hidden" value="{{$room->id}}" name="room_id">
                                <input type="file" id="file-input" name="name[]" multiple/>
                                <div id="thumb-output"></div>
                                <br>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                            <div class="container-fluid pl-0 pr-0">
                                <br>
                                <h3>LIST IMAGES VIEW</h3>
                                <br>
                                <div class="row pt-10">
                                    @foreach($roomImages as $item)
                                    <div class="col s12 m6 l4 " >
                                        <div class="image-area" style="position: relative">
                                        <img src="{{$item->name}}" alt="">
                                        <form id="deleteForm" action="{{ route('admin.image.destroy',$item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Are you sure?')" class="remove-image"  title="Delete" style="display: inline;">&#215;
                                            </button>
                                        </form>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                        <section id="section-underline-5 Tag">
                            <div class="container-fluid pl-0 pr-0">
                                <div class="row ">
                                <div class="col-lg-10">
                                    <div class="container" style="text-align: left;margin-left: 50px;width: 70%;background: white;padding: 50px;">
                                        <h1 class="tagroom">Tags in Room</h1>
                                        <div class="form-container">
                                            <form action="{{route('admin.tag_room.store')}}" method="POST" enctype="multipart/form-data">
                                             @csrf
                                             @method('post')
                                             <input type="hidden" name="room_id" value="{{$room->id}}">
                                            @forelse($tag as $item)
                                            <div class="checkbox-container">
                                                <input type="checkbox" id="{{$item->id}}" name="tag_id[]" value="{{$item->id}}"
                                                @foreach($tagRoom as $tagroom)
                                                    @if($item->id == $tagroom->tag_id) checked @endif
                                                @endforeach
                                                />
                                                <label class="checkbox" for="{{$item->id}}">{{$item->name}}</label>
                                            </div>
                                            @empty
                                                <div class="checkbox-container">
                                                    <label class="checkbox" for="apple">No tag belong this room</label>
                                                </div>
                                            @endforelse
                                            <button style="float: right;position: absolute;top: 40px; right: -90px;height: 60px" class="btn btn-success btn-sm btn-radius"><i class="fas fa-angle-double-up"></i> Update tag in the room</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                        </section>
                        </div><!-- /content -->
                        </div><!-- /tabs -->
                </section>
                </div>
            </div>
        </div>
    </div>

    </div>

{{-- Add Modal --}}
<div class="modal fade bd-example-modal-lg" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Th??m Ph??ng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addform" method="POST" action="{{ route('admin.price.store') }}">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="categoryname">Room Name</label>
                    <input type="hidden" name="room_id" value="{{$room->id}}">
                    <input  type="text" class="form-control" placeholder="Category name" value="{{$room->name}}" readonly>
                </div>
                <div class="form-group">
                    <label for="Weekends">Weekends</label>
                    <input class="form-control" step="any" type="number" name="Weekends" id="Weekends" >
                </div>
                <div class="form-group ">
                    <label for="Weekly">Weekly</label>
                    <input class="form-control"  step="any"type="number" name="Weekly" id="Weekly" >
                </div>
                <div class="form-group">
                    <label for="Moonly">Weekends by VN</label>
                    <input class="form-control" step="any" type="number" name="Weekends_vi" id="Weekends_v" >
                </div>
                <div class="form-group">
                    <label for="Nightly">Weekly by VN</label>
                   <input class="form-control" step="any" type="number" name="Weekly_vi" id="Weekly_vi" >
                </div>
                <button type="submit" class="btn btn-primary">SAVE</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
            </div>
    </div>
</div>

{{-- Edit Modal --}}
<div class="modal fade bd-example-modal-lg" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Th??m Ph??ng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editform" method="post" action="">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="form-group">
                    <label for="categoryname">Room Name</label>
                    <input type="hidden" name="room_id" value="{{$room->id}}">
                    <input  type="text" class="form-control" placeholder="Category name" value="{{$room->name}}" readonly>
                </div>
                <div class="form-group">
                    <label for="Weekends">Weekends</label>
                    <input class="form-control" id="eWeekends"  type="number" name="Weekends" >
                </div>
                <div class="form-group ">
                    <label for="Weekly">Weekly</label>
                    <input class="form-control" id="eWeekly" step="any"type="number" name="Weekly" >
                </div>
                <div class="form-group">
                    <label for="Mothly">Weekends by VN</label>
                    <input class="form-control" id="eWeekends_vi" step="any" type="number" name="Weekends_vi" >
                </div>
                <div class="form-group">
                    <label for="Nightly">Weekly by VN</label>
                   <input class="form-control" id="eWeekly_vi" step="any" type="number" name="Weekly_vi" >
                </div>
                <button type="submit" class="btn btn-primary">SAVE</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
            </div>
    </div>
</div>
@endsection

@section('scripts')
    {{-- Success --}}
    {{-- Tab Control --}}
    <script src="{{ asset('Admin/tab/js/cbpFWTabs.js') }}"></script>
    <script>
        (function() {
            [].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
                new CBPFWTabs( el );
            });
        })();
    </script>
    {{-- Amount Input --}}
    <script type="text/javascript">
     (function() {
        window.inputNumber = function(el) {
        var min = el.attr('min') || false;
        var max = el.attr('max') || false;
        var els = {};
        els.dec = el.prev();
        els.inc = el.next();
        el.each(function() {
          init($(this));
        });
        function init(el) {

          els.dec.on('click', decrement);
          els.inc.on('click', increment);

          function decrement() {
            var value = el[0].value;
            value--;
            if(!min || value >= min) {
              el[0].value = value;
            }
          }

          function increment() {
            var value = el[0].value;
            value++;
            if(!max || value <= max) {
              el[0].value = value++;
            }
          }
        }
        }
        })();
        inputNumber($('.input-number'));
    </script>
    {{-------------------------- Update Modal -------------------------}}
    <script>
        $('.edit_btn').on('click',function(){
            $('#editModal').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children('td').map(function(){
                return $(this).text();
            }).get();
            var data_id = $tr.children('input').map(function(){
                return $(this).val();
            }).get();
            console.log(data);
            $('#eWeekends').val(data[1].split(" ")[0]);
            $('#eWeekly').val(data[2].split(" ")[0]);
            $('#eWeekends_vi').val(data[3].split(" ")[0]);
            $('#eWeekly_vi').val(data[4].split(" ")[0]);
            $('#editform').attr('action', '/admin/price/'+data_id[0]);

        });
    </script>
     <script>
        $(document).ready(function()
        {
            $('.my-select-tag').change(function(){
                var temp = $(this).val();
                var name = $('.my-select-tag option:selected').text();
                 $('#tag_id').val(temp);
                 $('#tag_name').val(name);
            });
            $('.amount').change(function(){
                var temp = $(this).val();
                $('#amount').val(temp);
            });
            var rowCount = $('#mytable tr').length;
            if( rowCount > 1 ){
                $('#add_btn').attr('disabled','disabled');
            }
        });
    </script>
    {{-- Disnable Butoon Add --}}


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
 @endsection
