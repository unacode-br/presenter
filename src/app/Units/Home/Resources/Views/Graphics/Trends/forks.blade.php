@extends('core::template.layout.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <h3 class="text-center">Github Trends by Forks</h3>
            <div class="row">
                <div id="forks"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(function () {
            Highcharts.chart('forks', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Most forked repositories - Top 10'
                },
                xAxis: {
                    categories: {!! $repositories->map(function($repo) { return $repo->repository . ' - ' . $repo->language; }) !!}
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Total de forks'
                    }
                },
                plotOptions: {
                    column: {
                        stacking: 'normal',
                        dataLabels: {
                            enabled: true,
                            color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
                        }
                    }
                },
                series: [{
                    name: 'Forks',
                    data: {!! $repositories->map(function($repo) { return $repo->forks; }) !!}
                }]
            });
        });
    </script>
@endsection
