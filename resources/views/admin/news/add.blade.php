@extends('layouts.admin')

@section('main')
@section('title', 'Admin || Thêm mới news')

@section('content_header')
    <div class="row">        
        <h1>Thêm mới bài viết</h1>          
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

    <div class="col-md-6 callout-top callout-top-danger pt-0">
    <form method="post" action="{{route('admin.news.add')}}" enctype="multipart/form-data" accept-charset="UTF-8">
            {{ csrf_field()}}     
            <br>
            <div class="form-group">
            <label for="exampleInputEmail1">Danh mục bài viết:</label></br>
            <select name="danhmucbaiviet">
                @foreach($danhmuc as $dm)
                <option value="{{$dm->id}}">{{$dm->ten_loai}}</option>    
                @endforeach            
            </select> 
        </div>    
        <div class="form-group">
            <label for="exampleInputEmail1">Hình ảnh:</label>
            <input type="file" name="hinhanh" class="form-control" accept=".jpg, .jpeg, .png" required="true">    
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Tiêu đề:</label>
            <input type="text" name="doantrich" class="form-control"  required="true">    
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nội dung:</label>            
            <textarea name="noidung" class="form-control"  required="true" rows="4" cols="50"></textarea>  
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>
</div>


@stop

@stop
