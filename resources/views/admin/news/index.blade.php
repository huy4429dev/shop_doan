@extends('adminlte::page')

@section('title', 'Admin || Quản lý users')

@section('content_header')
    <div class="row">
        <div class="col-md-2">
            <h1>Quản lý Bài viết</h1>
        </div>
        <div class="col-md-2">
        <a href="{{route('admin.news.goadd')}}" class="btn btn-success" style="color:#fff;">Thêm mới</a>
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
<table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Hình ảnh</th>
      <th scope="col">Đoạn trích</th>
      <th scope="col">Nội dung</th>
      <th scope="col">Số bình luận</th>
      <th scope="col">Số lượt thích</th>   
      <th scope="col">Danh mục</th>
      <th scope="col">Tác giả</th>       
      <th scope="col">Thao tác</th>
    </tr>
  </thead>
  <tbody>
  @foreach($news as $key=>$new)
    <tr>
      <th scope="row">{{$key}}</th>
      <td>
        <img src="{{ URL::to('/') }}/img/{{$new->hinh_anh}}" width="50" alt="Image"/>
      </td>
      <td>{{$new->doan_trich}}</td>      
      <td>{{$new->noi_dung}}</td>
      <td>{{$new->so_binh_luan}}</td> 
      <td>{{$new->so_luot_thich}}</td>   
      <td>{{$new->danh_muc_bai_viet_id}}</td>    
      <td>{{$new->user_id}}</td>      
      <td>
        <a href="{{route('admin.news.goedit',$new->id)}}" style="color:#fff;"  class="btn btn-info">Cập nhật</a>
        <a href="{{route('admin.news.delete',$new->id)}}" class="btn btn-danger" style="color:#fff;">Xóa</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script type="text/javascript" language="javascript" src="/ckeditor/ckeditor.js"></script>
@stop