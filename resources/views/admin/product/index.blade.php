@extends('layouts.admin')

@section('main')
@section('title', 'Quản lý sản phẩm')

@section('content_header')
    <span><a href="{{route('admin.cat.index')}}"> Quản lý danh mục</a> / Danh mục: {{$data->ten_danh_muc}}</span>
@stop

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
               class="table table-hover table-striped table-bordered text-center">
            <thead>
            <tr class="bg-danger">
                <th>
                    <a href="{{route('admin.product.create', $data->id)}}" class="btn btn-sm btn-success">Thêm</a>
                </th>
                <th style="min-width: 100px">Tên sản phẩm</th>
                <th style="min-width: 50px">Ảnh</th>
                <th style="min-width: 50px">Mô tả</th>
                <th style="min-width: 20px">Giá</th>
                <th style="min-width: 20px">Số lượng</th>
                <th style="min-width: 20px">Giảm giá</th>
                <th style="min-width: 140px">Đánh giá</th>
                <th style="min-width: 20px">Lượt mua</th>
            </tr>
            </thead>
            <tbody>
            @if(sizeof($data->product) > 0)
                @foreach($data->product as $key => $item)
                    <tr>
                        <td style="min-width: 100px">
                            <a href="{{route('admin.product.edit', $item->id)}}">
                                <button class="btn btn-sm btn-warning">Sửa</button>
                            </a>
                            <button onclick="if (confirm('Xóa sản phẩm?')) { location.replace('/admin/product/{{$item->id}}/delete') }"
                                    class="btn btn-sm btn-danger">Xóa
                            </button>
                        </td>
                        <td>{{$item->ten_san_pham}}</td>
                        <td>
                            <img class="w-100" src="/uploads/product/{{$item->hinh_anh}}" alt="ảnh">
                        </td>
                        <td class="mo_ta">
                            {!! $item->mo_ta !!}
                        </td>
                        <td>
                            {{$item->gia}} vnđ
                        </td>
                        <td>
                            {{$item->so_luong}}
                        </td>
                        <td>
                            {{$item->giam_gia}}%
                        </td>
                        <td>
                            @for($i = 0; $i < ($item->rate > 5 ? 5:$item->rate); $i++)
                                <i class="fa fa-star text-warning"></i>
                            @endfor
                            @for($i = 0; $i < (5 - $item->rate < 0 ? 0:5-$item->rate); $i++)
                                <i class="fa fa-star"></i>
                            @endfor
                        </td>
                        <td>
                            {{$item->luot_mua}}
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <style>
            .mo_ta p {
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
                width: 120px;
            }
        </style>
    </div>
@stop
@stop