@extends('layouts.admin');
@section('content')
<div class="main-content-inner">

    <div class="main-content-wrap">
        <div class="tf-section-2 mb-30">
            <div class="flex gap20 flex-wrap-mobile">
                <div class="w-half">

                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-shopping-bag"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Tổng đơn hàng</div>
                                    <h4>{{$dashboardDatas[0]->Total}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Tổng số tiền</div>
                                    <h4>{{number_format($dashboardDatas[0]->TotalAmount, 0, '.', ',')}} VNĐ</h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-shopping-bag"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Số đơn hàng đang chờ xử lý</div>
                                    <h4>{{$dashboardDatas[0]->TotalOrdered}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wg-chart-default">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Tổng số tiền đơn hàng đang chờ xử lý</div>
                                    <h4>{{number_format($dashboardDatas[0]->TotalOrderedAmount, 0, '.', ',')}} VNĐ</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="w-half">

                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-shopping-bag"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Số đơn hàng đã giao</div>
                                    <h4>{{$dashboardDatas[0]->TotalDelivered}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Tổng số tiền đơn hàng đã giao</div>
                                    <h4>{{number_format($dashboardDatas[0]->TotalDeliveredAmount, 0, '.', ',')}} VNĐ</h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wg-chart-default mb-20">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-shopping-bag"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Số đơn hàng đã hủy</div>
                                    <h4>{{$dashboardDatas[0]->TotalCanceled}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wg-chart-default">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap14">
                                <div class="image ic-bg">
                                    <i class="icon-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="body-text mb-2">Tổng tiền đơn hàng bị hủy</div>
                                    <h4>{{number_format($dashboardDatas[0]->TotalCanceledAmount, 0, '.', ',')}} VNĐ</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="wg-box">
                <div class="flex items-center justify-between">
                    <h5>Doanh thu hàng tháng</h5>
                </div>
                <div class="flex flex-wrap gap40">
                    <div>
                        <div class="mb-2">
                            <div class="block-legend">
                                <div class="dot t1"></div>
                                <div class="text-tiny">Tổng tiền</div>
                            </div>
                        </div>
                        <div class="flex items-center gap10">
                            <h5>{{number_format($TotalAmount, 0, '.', ',')}} VNĐ</h5>
                        </div>
                    </div>
                    <div>
                        <div class="mb-2">
                            <div class="block-legend">
                                <div class="dot t2"></div>
                                <div class="text-tiny">Đang chờ</div>
                            </div>
                        </div>
                        <div class="flex items-center gap10">
                            <h5>{{number_format($TotalOrderedAmount, 0, '.', ',')}} VNĐ</h5>
                        </div>
                    </div>
                    <div>
                        <div class="mb-2">
                            <div class="block-legend">
                                <div class="dot t2"></div>
                                <div class="text-tiny">Đã giao</div>
                            </div>
                        </div>
                        <div class="flex items-center gap10">
                            <h5>{{number_format($TotalDeliveredAmount, 0, '.', ',')}} VNĐ</h5>
                        </div>
                    </div>
                    <div>
                        <div class="mb-2">
                            <div class="block-legend">
                                <div class="dot t2"></div>
                                <div class="text-tiny">Đã hủy</div>
                            </div>
                        </div>
                        <div class="flex items-center gap10">
                            <h5>{{number_format($TotalCanceledAmount, 0, '.', ',')}} VNĐ</h5>
                        </div>
                    </div>
                </div>
                <div id="line-chart-8"></div>
            </div>

        </div>
        <div class="tf-section mb-50">
            <div class="wg-box">
                <div class="flex items-center justify-between">
                    <h5>Đơn hàng gần đây</h5>
                    <div class="dropdown default">
                        <a class="btn btn-secondary dropdown-toggle" href="{{route('admin.orders')}}">
                            <span class="view-all">Xem tất cả</span>
                        </a>
                    </div>
                </div>
                <div class="wg-table table-all-user">
                    <div class="table-responsive" style="max-height: 500px; overflow-y: auto; ">
                        <table class="table table-striped table-bordered" style="margin-bottom: 30px;">
                            <thead>
                                <tr>
                                    <th style="width:70px">Mã đơn hàng</th>
                                    <th class="text-center">Tên</th>
                                    <th class="text-center">Số điện thoại</th>
                                    <th class="text-center">Tổng phụ</th>
                                    <th class="text-center">Thuế</th>
                                    <th class="text-center">Tổng cộng</th>

                                    <th class="text-center">Trạng thái</th>
                                    <th class="text-center">Ngày đặt hàng</th>
                                    <th class="text-center">Tổng số mặt hàng</th>
                                    <th class="text-center">Ngày giao hàng</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td class="text-center">{{$order->id}}</td>
                                    <td class="text-center">{{$order->name}}</td>
                                    <td class="text-center">{{$order->phone}}</td>
                                    <td class="text-center">{{number_format($order->subtotal, 0, '.', ',')}} VNĐ</td>
                                    <td class="text-center">{{number_format($order->tax, 0, '.', ',')}} VNĐ</td>
                                    <td class="text-center">{{number_format($order->total, 0, '.', ',')}} VNĐ</td>
                                    <td class="text-center">
                                        @if ($order->status == 'delivered')
                                            <span class="badge bg-success">Đã giao</span>
                                        @elseif($order->status == 'canceled')
                                            <span class="badge bg-danger">Đã hủy</span>
                                        @else
                                            <span class="badge bg-warning">Đã đặt hàng</span>
                                        @endif

                                    </td>
                                    <td class="text-center">{{$order->created_at}}</td>
                                    <td class="text-center">{{$order->orderItems->count()}}</td>
                                    <td class="text-center">{{$order->delivered_date}}</td>
                                    <td class="text-center">
                                        <a href="{{route('admin.order.details', ['order_id' => $order->id])}}">
                                            <div class="list-icon-function view-icon">
                                                <div class="item eye">
                                                    <i class="icon-eye"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="div" style=" height: 20px;"></div>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    (function ($) {

        var tfLineChart = (function () {

            var chartBar = function () {

                var options = {
                    series: [{
                        name: 'Total',
                        data: [{{$AmountM}}]
                    }, {
                        name: 'Pending',
                        data: [{{$OrderedAmountM}}]
                    },
                    {
                        name: 'Delivered',
                        data: [{{$DeliveredAmountM}}]
                    }, {
                        name: 'Canceled',
                        data: [{{$CanceledAmountM}}]
                    }],
                    chart: {
                        type: 'bar',
                        height: 325,
                        toolbar: {
                            show: false,
                        },
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '10px',
                            endingShape: 'rounded'
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    legend: {
                        show: false,
                    },
                    colors: ['#2377FC', '#FFA500', '#078407', '#FF0000'],
                    stroke: {
                        show: false,
                    },
                    xaxis: {
                        labels: {
                            style: {
                                colors: '#212529',
                            },
                        },
                        categories: ['Th1', 'Th2', 'Th3', 'Th4', 'Th5', 'Th6', 'Th7', 'Th8', 'Th9', 'Th10', 'Th11', 'Th12'],
                    },
                    yaxis: {
                        show: false,
                    },
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return "$ " + val + ""
                            }
                        }
                    }
                };

                chart = new ApexCharts(
                    document.querySelector("#line-chart-8"),
                    options
                );
                if ($("#line-chart-8").length > 0) {
                    chart.render();
                }
            };

            /* Function ============ */
            return {
                init: function () { },

                load: function () {
                    chartBar();
                },
                resize: function () { },
            };
        })();

        jQuery(document).ready(function () { });

        jQuery(window).on("load", function () {
            tfLineChart.load();
        });

        jQuery(window).on("resize", function () { });
    })(jQuery);
</script>
@endpush