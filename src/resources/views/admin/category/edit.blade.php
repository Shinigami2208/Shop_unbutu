@extends('adminlte::page')

@section('title', 'Sửa Danh Mục')

@section('content_header')
    <h3>Sửa Danh Mục</h3>
@stop

@section('content')
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
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop