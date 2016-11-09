@extends('core::template.layout.app')

@section('title', 'Learning Curve (' . $language->language['name'] . ')')

@section('content')
    <div class="row">
        <div class="col-lg-2 col-sm-12">
            <div class="card no-footer">
                <div class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group-sm">
                                <label class="control-label" for="language">Technology</label>
                                <select name="language" id="language" class="select form-control">
                                    @foreach($languages as $lang)
                                        <option value="{{ $lang->language['slug'] }}"{{ $lang->language['slug'] == $language->language['slug'] ? ' selected="selected"' : '' }}>{{ $lang->language['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12">
            <div class="card no-footer">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="icon-big icon-primary">
                                <i class="ti-github"></i>
                            </div>
                        </div>
                        <div class="col-xs-9">
                            <div class="numbers">
                                <p>analyzed repositories</p>
                                {{ $language->language['repositories']['total'] }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12">
            <div class="card no-footer">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-2">
                            <div class="icon-big icon-warning">
                                <i class="ti-stack-overflow"></i>
                            </div>
                        </div>
                        <div class="col-xs-10">
                            <div class="numbers">
                                <p>analyzed questions / score</p>
                                {{ $language->tag['counter'] }} / {{ $language->tag['score'] }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-sm-12">
            <div class="card no-footer">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="icon-big icon-danger">
                                <i class="ti-pulse"></i>
                            </div>
                        </div>
                        <div class="col-xs-9">
                            <div class="numbers">
                                <p>proportion</p>
                                {{ number_format($proportion, 2, ',', '.') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card-graphic">
                <div class="content">
                    <div id="lc-language" class="ct-chart"></div>

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
            var curr_url = '{{ url()->route('learning') }}/';

            $('#language').on('change', function() {
                var language = $(this).find(':selected').val();

                window.location.href = curr_url + language;
            });

            Highcharts.chart('lc-language', {
                colors: ["#df5353"],
                chart: {
                    backgroundColor: null,
                    type: 'spline'
                },
                title: {
                    text: 'Learning Curve - {{ $language->language['name'] }}',
                    style: {
                        fontSize: '16px',
                        fontWeight: 'bold',
                        textTransform: 'uppercase'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:11px; color: {point.color}">{series.name}</span><br>',
                    pointFormatter: function () {
                        return 'Melhoramento: <b>' + Highcharts.numberFormat(this.y, 2, ',', '.') + '%</b><br>'
                                + 'Aproveitamento: <b>' + Highcharts.numberFormat(this.value, 2, ',', '.') + '</b>';
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
                        text: 'Base Acumulada'
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
                        text: '% de Aprendizado'
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
                    name: 'Base Acumulada',
                    data: {!! json_encode(array_map(function($lang) { return ['y' => $lang['y'] * 100, 'value' => $lang['value']]; }, $language->points)) !!}
                }]
            });
        });
    </script>
@endsection
