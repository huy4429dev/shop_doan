@extends('adminlte::page')

@section('title', 'Admin || Thêm mới users')

@section('content_header')
    <div class="row">        
        <h1>Thêm mới Users</h1>        
    </div>    

@stop

@section('content')
@if(session()->has('message'))
<div class="row">
    <div class="col-md-4">
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    </div>    
</div>
@endif

<div class="row">    
    <div class="col-md-4">
    <form method="post" action="{{route('admin.users.add')}}" enctype="multipart/form-data" accept-charset="UTF-8">
            {{ csrf_field()}}  
        <div class="form-group">
            <label for="exampleInputEmail1">Tên tài khoản:</label>
            <input type="text" name="username" class="form-control" required="true">    
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Mật khẩu:</label>
            <input type="password" name="password" class="form-control" required="true">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Avatar:</label>
            <input type="file" name="avatar" class="form-control" required="true">    
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Phone:</label>
            <input type="text" name="Phone" class="form-control" required="true">    
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Mô tả:</label>
            <input type="text" name="mota" class="form-control" required="true">    
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>
</div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script type="text/javascript" language="javascript" src="/ckeditor/ckeditor.js"></script>
@stop