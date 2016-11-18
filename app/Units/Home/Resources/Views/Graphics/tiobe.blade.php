@extends('core::template.layout.app')

@section('title', 'Favorite Languages')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card-graphic">
                <div class="content">
                    <div id="tiobe" class="ct-chart"></div>
                    <div class="footer">
                        <hr>
                        <div class="stats">
                            <i class="ti-star"></i> Sources: TIOBE Index
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-md-12">
          <div class="card-graphic" id="about">
            <div class="header">
                <h2><i class="ti-direction-alt"></i> Saiba Mais</h2>
            </div>
              <div class="content">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </div>
          </div>
      </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(function () {
            Highcharts.chart('tiobe', {
                colors: ["#7cb5ec", "#f7a35c", "#90ee7e", "#7798bf", "#aaeeee", "#a5aad9", "#2b908f", "#55bf3b", "#df5353", "#7798bf", "#aaeeee"],
                chart: {
                    backgroundColor: null,
                    type: 'column'
                },
                title: {
                    text: 'Favorite Languages',
                    style: {
                        fontSize: '16px',
                        fontWeight: 'bold',
                        textTransform: 'uppercase'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:11px; color: {point.color}">{point.key}</span><br>',
                    pointFormatter: function () {
                        return Highcharts.numberFormat(this.y, 2, ',', '.') + '%';
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
                        rotation: -45,
                        style: {
                            fontSize: '12px'
                        }
                    },
                    categories: {!! $languages->map(function($lang) { return $lang->language; }) !!}
                },
                yAxis: {
                    minorTickInterval: 'auto',
                    title: {
                        style: {
                            textTransform: 'uppercase'
                        },
                        text: 'Raiting'
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
                                return Highcharts.numberFormat(this.y, 2, ',', '.') + '%';
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
                    data: {!! $languages->map(function($lang) { return $lang->rating * 100; }) !!}
                }]
            });
        });
    </script>
@endsection
