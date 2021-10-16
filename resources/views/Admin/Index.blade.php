@extends('layouts.basead')
@section('title', 'Admin')
@section('index', 'active')
@section('style')
    <style>
        .highcharts-figure, .highcharts-data-table table {
            min-width: 1000px;
            max-width: 1000px;
            margin: 1em auto;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #EBEBEB;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }
        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }
        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }
        .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
            padding: 0.5em;
        }
        .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }
        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }
    </style>
@endsection
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row mb-0">
                <div class="col-sm-6 col-lg-3">
                    <div class="overview-item overview-item--c1">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="zmdi zmdi-account-o"></i>
                                </div>
                                <div class="text">
                                    <h2>{{$userAmount}}</h2>
                                    <span>User Account</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="overview-item overview-item--c2">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="zmdi zmdi-shopping-cart"></i>
                                </div>
                                <div class="text">
                                    <h2>{{$bookingAmount}}</h2>
                                    <span>Booking</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="overview-item overview-item--c3">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="far fa-building"></i>
                                </div>
                                <div class="text">
                                    <h2>{{$roomAmount}}</h2>
                                    <span>Room</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="overview-item overview-item--c4">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="far fa-newspaper"></i>
                                </div>
                                <div class="text">
                                    <h2>{{$blogAmount}}</h2>
                                    <span>Blogs</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="overview-item overview-item--c4">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="far fa-newspaper"></i>
                                </div>
                                <div class="text" style="min-height: 68px;">
                                    <h2 style="font-size: 20px !important;">{{number_format($Revenue)}} VNĐ</h2>
                                    <span>Revenue/Day</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                <figure class="highcharts-figure">
                    <div id="container" style="width: 100%;height: 500px" data-list-day="{{$listDayOfMonth}}" data-money="{{$arrRevenue}}"></div>
                    <p class="highcharts-description">
                    </p>
                </figure>
                </div>
            </div>
            <div class="row">
               <h1 class="col-lg-12" style="padding-bottom: 30px;text-align: center">Recently Booking List</h1>
                <div class="col-lg-12 sidebar-wrap">
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead class="">
                            <tr>
                                <th>TT</th>
                                <th>Room Name</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th>Date Amount</th>
                                <th>Peoples Amount</th>
                                <th>Unit Price</th>
                                <th>Price</th>
                                <th>Booked at</th>
                            </tr>
                            </thead>
                            <tbody style="text-align: center">
                            @if($listBooking == null)
                                <p>No room booked</p>
                            @else
                                @forelse($listBooking as $item)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$item->room_name}}</td>
                                        <td>{{$item->checkin}}</td>
                                        <td>{{$item->checkout}}</td>
                                        <td>{{$item->amount_date}}</td>
                                        <td>{{$item->amount}}</td>
                                        <td>{{number_format($item->unit_price_vi)}} VNĐ</td>
                                        <td>{{number_format($item->price_vi)}} VNĐ</td>
                                        <td>{{$item->created_at}}</td>
                                    </tr>
                                @empty
                                    <p>No Booking Today</p>
                                @endforelse
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
@endsection
@section('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        var listday = $('#container').attr("data-list-day");
            listday = JSON.parse(listday);
        var listMoney = $('#container').attr("data-money");
            listMoney = JSON.parse(listMoney);
        Highcharts.chart('container', {
            chart: {
                type: 'spline'
            },
            title: {
                text: 'Biểu đồ doanh thu trong tháng'
            },
            subtitle: {
                text: 'MoonLight Hotel'
            },
            xAxis: {
                categories: listday
            },
            yAxis: {
                title: {
                    text: 'Doanh thu VNĐ'
                },
                labels: {
                    formatter: function () {
                        return this.value + 'vnđ';
                    }
                }
            },
            tooltip: {
                crosshairs: true,
                shared: true
            },
            plotOptions: {
                spline: {
                    marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                }
            },
            series: [{
                name: 'Doanh thu trong tháng',
                marker: {
                    symbol: 'cirkle'
                },
                data: listMoney

            }]
        });
    </script>
@endsection
