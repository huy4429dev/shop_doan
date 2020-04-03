
@extends('layouts.admin')
@section('main')
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
<div class="callout-top callout-top-danger table-responsive">
<table id="news" align="center" width="100%" class="text-center table table-hover table-striped table-bordered">
  <thead>
    <tr>
      <th>STT</th>
      <th>Hình ảnh</th>
      <th>Đoạn trích</th>
      <th>Nội dung</th>
      <th>Số bình luận</th>
      <th>Số lượt thích</th>   
      <th>Danh mục</th>    
      <th>Thao tác</th>
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
</div>
@stop
@stop

