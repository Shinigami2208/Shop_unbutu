@extends('adminlte::page')

@section('title', 'Quản Lý Danh Mục')

@section('content_header')
    <h1>Quản Lý Danh Mục</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <div class="card-tools">
                <!-- <a href="{{route('adminCategory.create')}}" class="btn btn-block btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Thêm Danh Mục</a> -->
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-create">
                    <i class="fa fa-plus" aria-hidden="true"></i> Thêm Danh Mục
                </button>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                    <tr>
                        <th style="width: 10%">STT</th>
                        <th style="width: 60%">Tên Danh Mục</th>
                        <th style="width: 10%"></th>
                        <th style="width: 10%"></th>
                        <!-- <th style="width: 10%"></th> -->
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $key => $category)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$category->name}}</td>
                            <!-- <td><a href="{{route('adminCategory.show', [$category->id] )}}" class="btn btn-block btn-default">Chi tiết</a></td> -->
                            <td>
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-edit">
                                    Sửa
                                </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-delete">
                                    Xóa
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="modal fade" id="modal-create" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm Danh Mục</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
                <!-- /.card-header -->
                <!-- form start -->
                    <form role="form" method="post" action="{{route('adminCategory.store')}}">
                        {{csrf_field()}}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Tên Danh Mục</label>
                                <input type="text" class="form-control" name="name" id="inputName" placeholder="Ten danh muc...">
                            </div>
                            <div class="form-group">
                                <label for="description">Miêu tả</label>
                                <textarea class="form-control" rows="3" name="description" id="description" placeholder="Mieu ta..."></textarea>
                            </div>
                            
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Tạo danh mục</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
            <!-- /.modal-content -->
        </div>
    <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="modal-edit" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Sửa Danh Mục</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="post"" action="{{route('adminCategory.update', [$category->id])}}">
                        {{method_field('PUT')}}
                        {{csrf_field()}}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Tên Danh Mục</label>
                                <input type="text" class="form-control" name="name" id="inputName" value="{{$category->name}}">
                            </div>
                            <div class="form-group">
                                <label for="description">Miêu tả</label>
                                <textarea class="form-control" rows="3" name="description" id="description">{{$category->description}}</textarea>
                            </div>
                            
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
            <!-- /.modal-content -->
        </div>
    <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="modal-delete" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Xóa danh mục!!!</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form method="POST" action="{{route('adminCategory.destroy', [$category->id])}}">
                {{ csrf_field() }}
                {!! method_field('DELETE') !!}
                <div class="modal-body">
                <p>Bạn có đồng ý muốn xóa danh mục này không?</p>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop