@extends('layouts.basead')
@section('title', 'Tag Manager')
@section('titlePage', 'Tag Manager')
@section('manager', 'active')
@section('tag','active')
@section('block','display: block;')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->

                     <div class="table-data__tool">
                        <div class="table-data__tool-right">
                            <button class="btn btn-success btn-radius"  data-toggle="modal" data-target="#addModal">
                                <i class="zmdi zmdi-plus"></i>add item
                            </button>
                        </div>
                    </div>
                    {{-- list Item --}}
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead style="background-color: #333;color: #fff !important" >
                                <tr>
                                    <th>TT</th>
                                    <th>Name Tag</th>
                                    <th>Name Tag by Vietnamese</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach($data as $key => $item)
                                <tr class="tr-shadow">
                                    <input type="hidden" class="delete_val" value="{{ $item->id }}" name="">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->name_vi }}</td>
                                    <td>
                                        <div class="table-data-feature">
                                            <button class="item view_btn" data-toggle="tooltip" data-placement="top" title="View">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="item edit_btn" data-toggle="tooltip" data-placement="top" title="Edit">
                                                 <i class="zmdi zmdi-edit"></i>
                                            </button>
                                            <form class="myForm" action="{{ route('admin.tag.destroy',$item->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button onclick="return confirm('Are you sure?')"  class="item delete_btn" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="spacer"></tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    {{-- list Item --}}
                </div>
            </div>
        </div>
    </div>
    {{-- Modal View --}}
    <div class="modal fade bd-example-modal-lg" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Chi Tiết Tag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="viewform" method="post" action="">
                <div class="modal-body">
                    <input type="hidden">
                    <div class="form-group">
                        <label for="id">Tag ID </label>
                        <input name="id" id="Vid" type="text" class="form-control" placeholder="Category name" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Tag Name</label>
                        <input name="name" id="Vname" type="text" class="form-control" placeholder="Maximun of People" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Tag Name by Vietnamese</label>
                        <input name="name_vi" id="Vname_vi" type="text" class="form-control" placeholder="Maximun of People" required>
                    </div>
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </form>
                </div>
        </div>
    </div>

    {{-- Modal Add --}}
    <div class="modal fade bd-example-modal-lg" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Thêm thông tin Tag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addform" method="post" action="{{ route('admin.tag.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Tag Name</label>
                        <input name="name" type="text" class="form-control" placeholder="Tag Name" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Tag Name by Vietnamese</label>
                        <input name="name_vi" type="text" class="form-control" placeholder="Tag Name  by Vietnamese" required>
                    </div>
                    <button type="submit" class="btn btn-primary">SAVE</button>
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </form>
                </div>
        </div>
    </div>

    {{-- Modal Update --}}
    <div class="modal fade bd-example-modal-lg" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Sửa thông tin Tag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editform" method="post" action="">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden">
                    <div class="form-group">
                        <label for="id">Tag ID </label>
                        <input name="id" id="Eid" type="text" class="form-control" placeholder="Tag id" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">Tag Name</label>
                        <input name="name" id="Ename" type="text" class="form-control" placeholder="Maximun of People" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Tag Name</label>
                        <input name="name_vi" id="Ename_vi" type="text" class="form-control" placeholder="Maximun of People" required>
                    </div>
                    <button type="submit" class="btn btn-primary">SAVE</button>
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </form>
                </div>
        </div>
    </div>


</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function()
    {
        $('.edit_btn').on('click',function(){
            $('#editModal').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children('td').map(function(){
                return $(this).text();
            }).get();

            $('#Eid').val(data[0]);
            $('#Ename').val(data[1]);
            $('#Ename_vi').val(data[2]);
            $('#editform').attr('action', '/admin/tag/'+data[0]);
        });

        $('.view_btn').on('click',function(){
            $('#viewModal').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children('td').map(function(){
                return $(this).text();
            }).get();

            $('#Vid').val(data[0]);
            $('#Vname').val(data[1]);
            $('#Vname_vi').val(data[2]);
        });
    });
</script>
@endsection
