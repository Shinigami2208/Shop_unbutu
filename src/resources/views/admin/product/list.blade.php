@extends('adminlte::page')

@section('title', 'Danh sách sản phẩm')

@section('content_header')
    <h1>Danh sách sản phẩm</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <div class="card-tools">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-create">
                    <i class="fa fa-plus" aria-hidden="true"></i> Thêm sản phẩm
                </button>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                    <tr>
                        <th style="width: 10%">STT</th>
                        <th style="width: 60%">Tên Sản Phẩm</th>
                        <th style="width: 10%"></th>
                        <th style="width: 10%"></th>
                        <!-- <th style="width: 10%"></th> -->
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $key => $product)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$product->name}}</td>
                            <!-- <td><a href="{{route('adminProduct.show', [$product->id] )}}" class="btn btn-block btn-default">Chi tiết</a></td> -->
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
                    <form role="form" method="post" action="{{route('adminProduct.store')}}">
                        {{csrf_field()}}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Tên Sản Phẩm</label>
                                <input type="text" class="form-control" name="name" id="inputName" placeholder="Ten san pham...">
                            </div>
                            <div class="form-group">
                                <label>Danh Mục</label>
                                <select class="custom-select" name="category_id">
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputPrice">Giá Sản Phẩm</label>
                                <input type="text" class="form-control" name="price" id="inputPrice" placeholder="Ten san pham...">
                            </div>
                            <div class="form-group">
                                <label for="description">Miêu Tả</label>
                                <textarea class="form-control" rows="3" name="description" id="description" placeholder="Mieu ta..."></textarea>
                            </div>
                            
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Tạo sản phẩm</button>
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
                    <form role="form" method="post"" action="{{route('adminProduct.update', [$product->id])}}">
                        {{method_field('PUT')}}
                        {{csrf_field()}}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Tên Sản Phẩm</label>
                                <input type="text" class="form-control" name="name" id="inputName" value="{{$product->name}}">
                            </div>
                            <div class="form-group">
                                <label>Danh Mục</label>
                                <select class="custom-select" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputPrice">Giá Sản Phẩm</label>
                                <input type="text" class="form-control" name="price" id="inputPrice" value="{{$product->price}}">
                            </div>
                            <div class="form-group">
                                <label for="description">Miêu Tả</label>
                                <textarea class="form-control" rows="3" name="description" id="description">{{$product->description}}</textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
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
              <h4 class="modal-title">Xóa sản phẩm {{$product->name}}!!!</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <form method="POST" action="{{route('adminProduct.destroy', [$product->id])}}">
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