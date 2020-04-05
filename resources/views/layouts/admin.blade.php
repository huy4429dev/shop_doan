@extends('adminlte::page')

@yield('main')

@section('css')
    <link rel="stylesheet" href="/css/admin.css">
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('#product').DataTable(
                {
                    "oLanguage": {
                        "sProcessing": "Đang xử lý...",
                        "sLengthMenu": "Xem _MENU_ mục",
                        "sZeroRecords": "không có dữ liệu",
                        "sInfo": "_TOTAL_ mục",
                        "sInfoEmpty": "0 mục",
                        "sInfoFiltered": "",
                        "sInfoPostFix": "",
                        "sSearch": "Tìm:",
                        "sUrl": "",
                        "oPaginate": {
                            "sPrevious": "<",
                            "sNext": ">",
                        }
                    }
                }
            );
            $('#product tbody').on('click', 'td.details-control', function () {
                alert("ok")
            });
        });
    </script>
    <!-- page script -->
    <script>
        $(document).ready(function () {
            $.get("/admin/statistic/char", function (data) {
                /* ChartJS
              * -------
              * Here we will create a few charts using ChartJS
              */
                var areaChartData = {
                    labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7',
                        'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                    datasets: [
                        {
                            label: 'Đơn hàng',
                            backgroundColor: 'rgba(220,53,69,1)',
                            borderColor: 'rgba(220,53,69,1)',
                            pointRadius: false,
                            pointColor: '#3b8bba',
                            pointStrokeColor: 'rgba(60,141,188,1)',
                            pointHighlightFill: '#fff',
                            pointHighlightStroke: 'rgba(60,141,188,1)',
                            data: data
                        }
                    ]
                };

                //-------------
                //- BAR CHART -
                //-------------
                var barChartCanvas = $('#barChart').get(0).getContext('2d');
                var barChartData = jQuery.extend(true, {}, areaChartData);
                barChartData.datasets[0] = areaChartData.datasets[0];

                var barChartOptions = {
                    responsive: true,
                    maintainAspectRatio: false,
                    datasetFill: false
                };

                var barChart = new Chart(barChartCanvas, {
                    type: 'bar',
                    data: barChartData,
                    options: barChartOptions
                })
            })
        });
    </script>
    <script type="text/javascript" language="javascript" src="/ckeditor/ckeditor.js"></script>
@stop