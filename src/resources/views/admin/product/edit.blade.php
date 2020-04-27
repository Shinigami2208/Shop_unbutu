@extends('adminlte::page')

@section('title', 'Sửa Sản Phẩm')

@section('content_header')
    <h3>Sửa Sản Phẩm</h3>
@stop

@section('content')
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
                <select class="custom-select" value="{{$product->id}}" name="category_id">
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
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop