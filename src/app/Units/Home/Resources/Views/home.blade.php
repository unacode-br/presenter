@extends('core::template.layout.app')

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
                                    <i class="ti-github"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    GitHub
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="ti-announcement"></i> <a href="https://github.com/explore">View Showcases</a>
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
                                    <i class="ti-stack-overflow"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>
                                      Stackoverflow
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="ti-bar-chart-alt"></i><a href="http://stackoverflow.com/documentation">View Popular Languages </a>
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
                                    Top Stared
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                                <i class="ti-stats-up"></i> <a href="{{ url('/graphics/stars') }}">Top Stared for github</a>
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
                                    Top Forked
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr />
                            <div class="stats">
                              <i class="ti-stats-up"></i> <a href="{{ url('/graphics/forks') }}">Top Forked for github</a>
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
                        <h4 class="title">Curva de Aprendizagem</h4>
                    </div>
                    <div class="content">
                        <div id="chartHours" class="ct-chart"></div>
                        <div class="footer">
                            <hr>
                            <div class="stats">
                                <i class="ti-reload"></i>View Details
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
