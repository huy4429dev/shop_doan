@extends('layouts.admin')

@section('main')
@section('title', 'Quản lý sản phẩm')
@section('content_header')
<span><a href="{{route('admin.cat.index')}}">Quản lý danh mục</a> / Cập nhật danh mục</span>
@stop
@section('content')
<div class="callout-top callout-top-danger pt-0">
    <div class="border-bottom">
        <h4>Cập nhật danh mục sản phẩm</h4>
    </div>
    @if(count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $err)
        {{$err}}<br>
        @endforeach
    </div>
    @endif

    @if (session('message'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Thông báo</h4>
        {{ session('message') }}
    </div>
    @endif
    <form action="{{route('admin.cat.edit',$data->id)}}" method="POST">
        @csrf
        <div class="form-group mt-2">
            <label for="cat">Tên danh mục:</label>
            <input type="text" name="ten_danh_muc" value="{{$data->ten_danh_muc}}" class="form-control"
                aria-describedby="cat">
        </div>
        <button type="submit" class="btn btn-sm btn-success">Cập nhật</button>
    </form>
</div>
@stop
@stop