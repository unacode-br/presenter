@extends('core::template.layout.app')

@section('title', 'Learning Curve (' . $learning['language']->language->name . ')')

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
                                    @foreach($learning['languages'] as $lang)
                                        <option value="{{ urlencode($lang->language->slug) }}"{{ $lang->language->slug == $learning['language']->language->slug ? ' selected="selected"' : '' }}>{{ $lang->language->name }}</option>
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
                                {{ $learning['language']->language->repositories->total }}
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
                                {{ $learning['language']->tag->counter }} / {{ $learning['language']->tag->score }}
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
                                {{ number_format($learning['proportion'], 2, ',', '.') }}
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
                    text: 'Learning Curve - {{ $learning['language']->language->name }}',
                    style: {
                        fontSize: '16px',
                        fontWeight: 'bold',
                        textTransform: 'uppercase'
                    }
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
                    categories: {!! json_encode(array_map(function($lang) { return $lang->x; }, $learning['language']->points)) !!}
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
                    data: {!! json_encode(array_map(function($lang) { return ['y' => $lang->y * 100, 'value' => $lang->value]; }, $learning['language']->points)) !!}
                }]
            });
        });
    </script>
@endsection
