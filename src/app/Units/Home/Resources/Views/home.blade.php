@extends('core::template.layout.app')

@section('title', 'Dashboard')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-primary text-center">
                                        <i class="ti-stats-down"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>learning</p>
                                        curve
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr/>
                                <div class="stats">
                                    <i class="ti-bar-chart-alt"></i>
                                    <a href="{{ url('/graphics/learning') }}">View graphic</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-danger text-center">
                                        <i class="ti-stats-up"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>trending</p>
                                        techs
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr/>
                                <div class="stats">
                                    <i class="ti-bar-chart-alt"></i>
                                    <a href="{{ url('/graphics/trends-lang') }}">View graphic</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-warning text-center">
                                        <i class="ti-star"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>most</p>
                                        stared
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr/>
                                <div class="stats">
                                    <i class="ti-stats-up"></i>
                                    <a href="{{ url('/graphics/stars') }}">Top stared</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-info text-center">
                                        <i class="fa fa-code-fork"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>most</p>
                                        forked
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr/>
                                <div class="stats">
                                    <i class="ti-stats-up"></i>
                                    <a href="{{ url('/graphics/forks') }}">Top forked</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Random Language: <strong>{{ $language->language['name'] }}</strong> / Learning Curve</h4>
                        </div>
                        <div class="content">
                            <div id="chart-random" class="ct-chart"></div>
                            <div class="footer">
                                <hr>
                                <div class="stats">
                                    <a href="{{ url('learning', $language->language['slug']) }}">
                                        <i class="ti-reload"></i> View details
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(function () {
            Highcharts.chart('chart-random', {
                colors: ["#df5353"],
                chart: {
                    backgroundColor: null,
                    type: 'spline'
                },
                title: {
                    style: { 'display': 'none' }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:11px; color: {point.color}">{series.name}</span><br>',
                    pointFormatter: function () {
                        return 'Improvement: <b>' + Highcharts.numberFormat(this.y, 2, ',', '.') + '%</b><br>'
                                + 'Exploitation: <b>' + Highcharts.numberFormat(this.value, 2, ',', '.') + '</b>';
                    },
                    borderWidth: 0,
                    backgroundColor: 'rgba(255, 255, 255, 0.8)',
                    shadow: false
                },
                legend: {
                    itemStyle: {
                        fontWeight: 'bold',
                        fontSize: '13px'
                    },
                    enabled: false
                },
                xAxis: {
                    gridLineWidth: 1,
                    title: {
                        style: {
                            textTransform: 'uppercase'
                        },
                        text: 'Accumulated base'
                    },
                    labels: {
                        style: {
                            fontSize: '12px'
                        }
                    },
                    categories: {!! json_encode(array_map(function($lang) { return $lang['x']; }, $language->points)) !!}
                },
                yAxis: {
                    minorTickInterval: 'auto',
                    title: {
                        style: {
                            textTransform: 'uppercase'
                        },
                        text: '% of Learning'
                    },
                    labels: {
                        style: {
                            fontSize: '12px'
                        }
                    }
                },
                plotOptions: {
                    candlestick: {
                        lineColor: '#404048'
                    },
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            formatter: function () {
                                return Highcharts.numberFormat(this.point.value, 2, ',', '.');
                            }
                        }
                    }
                },
                credits: {
                    enabled: false
                },

                series: [{
                    name: 'Accumulated base',
                    data: {!! json_encode(array_map(function($lang) { return ['y' => $lang['y'] * 100, 'value' => $lang['value']]; }, $language->points)) !!}
                }]
            });
        });
    </script>
@endsection
