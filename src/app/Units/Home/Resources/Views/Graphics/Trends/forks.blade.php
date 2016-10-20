@extends('core::template.layout.app')

@section('content')
    <div class="row">
        <h3 class="text-center">Github Trends by Forks</h3>
        <hr>
    </div>
    <div class="row">
      <div id="forks"></div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(function() {
            Highcharts.chart('forks', {});
        });
    </script>
@endsection
