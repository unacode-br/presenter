@extends('core::template.layout.app')

@section('title', 'Trending Languages')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card-graphic">
                <div class="content">
                    <div id="lc-lang" class="ct-chart"></div>
                    <div class="footer">
                        <hr>
                        <div class="stats">
                            <i class="ti-star"></i> Sources: GitHub and StackOverflow
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
            Highcharts.chart('lc-lang', {
                colors: ["#7cb5ec", "#f7a35c", "#90ee7e", "#7798bf", "#aaeeee", "#a5aad9", "#2b908f", "#55bf3b", "#df5353", "#7798bf", "#aaeeee"],
                chart: {
                    backgroundColor: null,
                    type: 'bar'
                },
                title: {
                    text: 'Trend Curve by Language - Top 15',
                    style: {
                        fontSize: '16px',
                        fontWeight: 'bold',
                        textTransform: 'uppercase'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:11px; color: {point.color}">{point.key}</span><br>',
                    pointFormatter: function () {
                        return Highcharts.numberFormat(this.y, 0, '', '.');
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
                        text: 'Languages'
                    },
                    labels: {
                        style: {
                            fontSize: '12px'
                        }
                    },
                    categories: {!! $languages->map(function($lang) { return $lang->language->name; }) !!}
                },
                yAxis: {
                    minorTickInterval: 'auto',
                    title: {
                        style: {
                            textTransform: 'uppercase'
                        },
                        text: 'Points per language<br><small style="text-transform: lowercase">(More points is better)</small>'
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
                                return Highcharts.numberFormat(this.y, 0, '', '.');
                            }
                        }
                    }
                },
                credits: {
                    enabled: false
                },

                series: [{
                    name: 'Forks',
                    colorByPoint: true,
                    data: {!! $languages->map(function($lang) { return $lang->point; }) !!}
                }]
            });
        });
    </script>
@endsection
