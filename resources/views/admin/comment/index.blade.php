@extends('adminlte::page')

@section('title', 'Admin || Quản lý users')

@section('content_header')
    <div class="row">
        <div class="col-md-12">
            <h1>Quản lý Bình luận</h1>
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
      <th scope="col">Tác giả</th>
      <th scope="col">Bài viết</th>
      <th scope="col">Nội dung</th>     
      <th scope="col">Trạng thái</th>         
      <th scope="col">Thao tác</th>
    </tr>
  </thead>
  <tbody>
  @foreach($cmts as $key=>$cmt)
    <tr>
      <th scope="row">{{$key}}</th>      
      <td>{{$cmt->tai_khoan}}</td> 
      <td>{{$cmt->doan_trich}}</td>   
      <td>{{$cmt->noidung}}</td>
    
      <td>
        <form method="post" action="{{route('admin.comment.status')}}" enctype="multipart/form-data" accept-charset="UTF-8">
            {{ csrf_field()}}  
            <input type="hidden" name="idid" class="form-control"  value="{{$cmt->idd}}">  
            <input type="hidden" name="trangthaithai" class="form-control"  value="{{$cmt->trang_thai}}">  
            @if($cmt->trang_thai == 0)
            <button type="submit" class="btn btn-primary" style="color:#fff;">Hiển thị</button>            
            @else            
            <button type="submit" class="btn btn-danger" style="color:#fff;">Ẩn</button>
            @endif
        </form>            
      </td>
      <td>        
        <a href="{{route('admin.news.comment.delete',$cmt->idd)}}" class="btn btn-danger" style="color:#fff;">Xóa</a>
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