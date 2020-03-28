@extends('layouts.admin')

@section('main')
@section('title', 'Quản lý sản phẩm')
@section('content_header')
    <span><a href="{{route('admin.product.index',$data->id)}}"> Danh mục: {{$data->ten_danh_muc}} </a> / Thêm sản phẩm mới</span>
@stop
@section('content')
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
    <div class="callout-top callout-top-danger pt-0">
        <form action="{{route('admin.product.store')}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="form-group mt-2">
                <label for="cat">Tên sản phẩm:</label>
                <input type="text" name="ten_san_pham" class="form-control" aria-describedby="cat" required>
            </div>
            <div class="form-group">
                <label for="cat">Ảnh:</label>
                <input type="file" name="hinh_anh" accept="image/x-png,image/gif,image/jpeg,image/jpg"
                       aria-describedby="cat">
            </div>
            <div class="form-group">
                <label for="cat">Mô tả:</label>
                <textarea name="mo_ta" type="text" class="form-control ckeditor" rows="1"
                          style="visibility: hidden; display: none;"></textarea>
            </div>
            <div class="row">
                <div class="form-group col-12 col-md-4">
                    <label for="cat">Giá:</label>
                    <input type="number" name="gia_ban" value="0" class="form-control" aria-describedby="cat" required>
                </div>
                <div class="form-group col-md-4 col-12">
                    <label for="cat">Số lượng:</label>
                    <input type="number" name="so_luong" value="0" class="form-control" aria-describedby="cat" required>
                </div>
                <div class="form-group col-md-4 col-12">
                    <label for="cat">Giảm giá:</label>
                    <input type="number" name="giam_gia" value="0" class="form-control" aria-describedby="cat" required>
                </div>
                <div class="form-group col-md-4 col-12 d-none">
                    <label for="cat">Danh mục:</label>
                    <input type="text" name="loai_san_pham_id" value="{{$data->id}}" class="form-control"
                           aria-describedby="cat">
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-sm btn-success">Thêm</button>
            </div>
        </form>
    </div>
@stop
@stop