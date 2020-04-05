@extends('layouts.admin')
@section('main')
@section('title', 'Admin || Quản lý users')

@section('content_header')
    <div class="row">
        <div class="col-md-2">
            <h1>Quản lý Users</h1>
        </div>
        <div class="col-md-2">
        <a href="{{route('admin.users.goadd')}}" class="btn btn-success" style="color:#fff;">Thêm mới</a>
        </div>
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
<div class="callout-top callout-top-danger table-responsive">
<table id="user" align="center" width="100%" class="text-center table table-hover table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên tài khoản</th>
      <th scope="col">Mật khẩu</th>
      <th scope="col">Avatar</th>
      <th scope="col">Số điện thoại</th>
      <th scope="col">Mô tả</th>      
      <th scope="col">Thao tác</th>
    </tr>
  </thead>
  <tbody>
  @foreach($users as $key=>$user)
    <tr>
      <th scope="row">{{$key}}</th>
      <td>{{$user->tai_khoan}}</td>
      <td>{{$user->mat_khau}}</td>
      <td>
        <!-- {{$user->anh_dai_dien}} -->
        <img src="{{ URL::to('/') }}/img/{{$user->anh_dai_dien}}" width="50" alt="Image"/>
      </td>
      <td>{{$user->so_dien_thoai}}</td>
      <td>{{$user->mo_ta}}</td>      
      <td>
        <a href="{{route('admin.users.goedit',$user->id)}}" style="color:#fff;"  class="btn btn-info">Cập nhật</a>
        <a href="{{route('admin.users.delete',$user->id)}}" class="btn btn-danger" style="color:#fff;">Xóa</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@stop
@stop
