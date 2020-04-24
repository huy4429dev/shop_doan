@extends('layouts.admin')

@section('main')
@section('title', 'Quản lý sản phẩm')

@section('content')
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                {{$err}}<br>
            @endforeach
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if (session('message'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Thông báo</h4>
            {{ session('message') }}
        </div>
    @endif
    <div class="callout-top callout-top-danger table-responsive">
        <table id="product" align="center" width="100%"
               class="text-center table table-hover table-striped table-bordered">
            <thead>
            <tr class="bg-danger">
                <th>STT</th>
                <th>Tên danh mục</th>
                <th>
                    <a href="{{route('admin.cat.create')}}" class="btn btn-sm btn-success">Thêm</a>
                </th>
            </tr>
            </thead>
            <tbody>
            @if(sizeof($data) > 0)
                @foreach($data as $key => $item)
                    <tr>
                        <td onclick="cat({{$item->id}})" class="route" style="width: 20px">{{++$key}}</td>
                        <td onclick="cat({{$item->id}})" class="route">{{$item->ten_danh_muc}}</td>
                        <td style="min-width: 150px;width: 150px">
                            <a href="{{route('admin.cat.edit', $item->id)}}">
                                <button class="btn btn-sm btn-warning">Sửa</button>
                            </a>
                            <a href="{{route('admin.cat.delete', $item->id)}}">
                                <button class="btn btn-sm btn-danger">Xóa</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <style>
            .route:hover {
                cursor: pointer;
            }
        </style>
        <script>
            function cat($id) {
                location.replace('/admin/product/' + $id + '/cat');
            }
        </script>
    </div>
@stop
@stop