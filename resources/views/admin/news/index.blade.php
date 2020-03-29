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
      <th scope="col">Thao tác</th>
    </tr>
  </thead>
  <tbody>
  @foreach($news as $key=>$new)
    <tr>
      <th scope="row">{{$key}}</th>
      <td>
        <img src="{{ URL::to('/') }}/img/{{$new->hinhanh}}" width="50" alt="Image"/>
      </td>
      <td>{{$new->doantrich}}</td>      
      <td>{{$new->noidung}}</td>
      <td>{{$new->sobinhluan}}</td> 
      <td>{{$new->soluotthich}}</td>   
      <td>{{$new->danhmucbaivietid}}</td>       
      <td>
        <a href="{{route('admin.news.goedit',$new->id_baiviet)}}" style="color:#fff;"  class="btn btn-info">Cập nhật</a>
        <a href="{{route('admin.news.delete',$new->id_baiviet)}}" class="btn btn-danger" style="color:#fff;">Xóa</a>
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