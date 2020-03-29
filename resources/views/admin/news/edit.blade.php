@extends('adminlte::page')

@section('title', 'Admin || Cập nhật news')

@section('content_header')
    <div class="row">        
        <h1>Cập nhật bài viết</h1>        
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
    <form method="post" action="{{route('admin.news.edit',$news[0]->id)}}" enctype="multipart/form-data" accept-charset="UTF-8">
            {{ csrf_field()}}     
            <div class="form-group">
            <label for="exampleInputEmail1">Danh mục bài viết:</label>
            <select name="danhmucbaiviet">
                @foreach($danhmuc as $dm)
                @if($dm->id == $news[0]->danh_muc_bai_viet_id)
                <option value="{{$dm->id}}" selected>{{$dm->ten_loai}}</option> 
                @else
                <option value="{{$dm->id}}">{{$dm->ten_loai}}</option>  
                @endif                  
                @endforeach            
            </select> 
        </div>    
        <div class="form-group">
            <label for="exampleInputEmail1">Hình ảnh:</label>
            <input type="file" name="hinhanh" class="form-control" accept=".jpg, .jpeg, .png" value="{{$news[0]->hinh_anh}}">    
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Tiêu đề:</label>
            <input type="text" name="doantrich" value="{{$news[0]->doan_trich}}" class="form-control" required="true">    
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nội dung:</label>            
            <textarea name="noidung" rows="4"  class="form-control" required="true" cols="50">{{$news[0]->noi_dung}}</textarea>  
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
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