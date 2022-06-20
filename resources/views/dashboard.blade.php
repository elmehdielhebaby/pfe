@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<!-- <div class="container-fluid mt--7"> -->
<!-- <div class="row"> -->
<div class="header bg-gradient-primary pb-5 pt-5  mt--8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row  mt--6">
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h4 class="card-title text-uppercase text-muted mb-2">Clients</h4>
                                    <span class="h2 font-weight-bold mb-0">{{$nbr_client}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-2 mb-0 text-muted text-sm">
                                <!-- <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                                <span class="text-nowrap">Since yesterday</span> -->
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h4 class="card-title text-uppercase text-muted mb-2">Rendez Vous <br></h4>
                                    <span class="h2 font-weight-bold mb-0">{{$nbr_rendez_vous}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-2 mb-0 text-muted text-sm">
                                <!-- <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p> -->
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Clients sans Rendes vous</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$nbr_client_sont_rdv}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                        <i class="fas fa-chart-pie"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Rendez vous confirmé</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$nbr_rendez_vous_ok}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <i class="fas fa-percent"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt--3">
    <div class="row">
        <div class="col-xl-8 mb-5 mb-xl-0">
            <div class="card bg-gradient-default shadow">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <!-- <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6> -->
                            <h2 class="text-white mb-0">Clients</h2>
                        </div>
                        <!-- <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="" data-suffix="">
                                        <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                                            <span class="d-none d-md-block">Mois</span>
                                            <span class="d-md-none">M</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}' data-prefix="" data-suffix="">
                                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                                            <span class="d-none d-md-block">Semaine</span>
                                            <span class="d-md-none">W</span>
                                        </a>
                                    </li>
                                </ul>
                            </div> -->
                    </div>
                </div>
                <div class="card-body">
                    <!-- Chart -->
                    <div class="chart">
                        <!-- Chart wrapper -->
                        <canvas id="chart-sales" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <!-- <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Categories</h6>
                                <h2 class="mb-0">Etablissements</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="chart-orders" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div> -->
            <div class="card">
                <div class="card-header">
                    <!-- Title -->
                    <h5 class="h3 mb-0">Âge des clients</h5>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <div class="chart">
                        <!-- Chart wrapper -->
                        <canvas id="chart-doughnut" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('layouts.footers.auth')
<!-- </div> -->
@endsection
<script>
    var jan = "{{$jan}}";
    var fev = "{{$fev}}";
    var mar = "{{$mar}}";
    var avr = "{{$avr}}";
    var mai = "{{$mai}}";
    var jun = "{{$jun}}";
    var jul = "{{$jul}}";
    var aou = "{{$aou}}";
    var sep = "{{$sep}}";
    var oct = "{{$oct}}";
    var nov = "{{$nov}}";
    var dec = "{{$dec}}";

    var a = "{{$a}}";
    var b = "{{$b}}";
    var c = "{{$c}}";
    var d = "{{$d}}";
    var e = "{{$e}}";
</script>


@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
<!-- <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script> -->
@endpush