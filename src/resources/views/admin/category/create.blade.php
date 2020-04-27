@extends('adminlte::page')

@section('title', 'Tạo Danh Mục')

@section('content_header')
    <h3>Tạo Danh Mục</h3>
@stop

@section('content')
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
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop