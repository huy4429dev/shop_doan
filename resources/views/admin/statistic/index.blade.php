@extends('layouts.admin')

@section('main')
@section('title', 'Thống kê')
@section('content_header')
    <h1>Hôm nay</h1>
@stop
@section('content')
    <div class="row text-center">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$sum}}</h3>
                    <p>Đơn hàng</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        @isset($sort[0])
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$sort[0]->so_luong}}</h3>

                        <p>Đơn hàng: {{$sort[0]->ten_san_pham}}</p>
                    </div>
                </div>
            </div>
        @endisset
    <!-- ./col -->
        @isset($sort[1])
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$sort[1]->so_luong}}</h3>

                        <p>Đơn hàng: {{$sort[1]->ten_san_pham}}</p>
                    </div>
                </div>
            </div>
        @endisset
    <!-- ./col -->
        @isset($sort[2])
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$sort[2]->so_luong}}</h3>

                        <p>Đơn hàng: {{$sort[2]->ten_san_pham}}</p>
                    </div>
                </div>
            </div>
    @endisset
    <!-- ./col -->
    </div>
    <!-- BAR CHART -->
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">Thống kê đơn hàng theo tháng, năm hiện tại</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                            class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                            class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body table-responsive">
            <div class="chart">
                <canvas id="barChart"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <div class="callout-top callout-top-danger table-responsive">
        <h6>Bảng danh sách đơn hàng</h6>
        <table id="product" class="table table-hover table-striped table-bordered text-center">
            <thead>
            <tr class="bg-danger">
                <th>STT</th>
                <th>Người mua</th>
                <th>Số sản phẩm</th>
                <th>Tổng đơn hàng</th>
                <th>Thời gian</th>
            </tr>
            </thead>
            <tbody>
            @foreach($donhang as $key=>$val)
                <tr>
                    <td onclick="detailt({{$val->id}})">{{$key+1}}</td>
                    <td onclick="detailt({{$val->id}})">{{($val->user)->tai_khoan}}</td>
                    <td onclick="detailt({{$val->id}})">{{sizeof($val->chi_tiet)}}</td>
                    <td onclick="detailt({{$val->id}})">{{$val->tong_don_hang}} vnđ</td>
                    <td onclick="detailt({{$val->id}})">{{$val->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <style>
            td:hover {
                cursor: pointer;
            }
        </style>
        <script>
            function detailt(id) {
                $.get('statistic/' + id + '/chi-tiet', function (data) {
                    var i;
                    var str = "";
                    for (i = 0; i < data.length; i++) {
                        str += "<tr>\n" +
                            "<td>" + (i + 1) + "</td>\n" +
                            "<td>" + (data[i].san_pham).ten_san_pham + "</td>\n" +
                            "<td>" + data[i].so_luong_mua + "</td>\n" +
                            "<td>" + data[i].giam_gia + "%</td>\n" +
                            "<td>" + data[i].don_gia + " vnđ</td>\n" +
                            "<td>" + data[i].created_at + "</td>\n" +
                            "</tr>";
                    }
                    $('#data').html(str);
                    $('.modal').modal('show');
                });
            }
        </script>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Chi tiết đơn hàng:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                    <table class="table table-hover table-striped table-bordered text-center">
                        <thead>
                        <tr class="bg-danger">
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giảm giá</th>
                            <th>Đơn giá</th>
                            <th>Thời gian</th>
                        </tr>
                        </thead>
                        <tbody id="data">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@endsection