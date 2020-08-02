@extends('Admin.layouts.index')
@section('body')

    @section('title')
        <h4 class="page-title">Dashboard</h4>
    @endsection
<div class="row">
    <!--المستخدمين-->
    <div class="col-xl-4 col-md-6">
        <a href="{{route('users.index')}}">
            <div class="card-box">

                <h4 class="header-title mt-0 mb-3">Users</h4>

                <div class="widget-box-2">
                    <div class="widget-detail-2 text-right">
                        <span class="badge badge-info badge-pill float-left mt-3">users <i class="mdi mdi-trending-up"></i></span>
                        <h2 class="font-weight-normal mb-1"> {{\App\Models\User::count()}} </h2>
                        <p class="text-muted mb-3">All Users</p>
                    </div>
                    <div class="progress progress-bar-alt-pink progress-sm">
                        <div class="progress-bar bg-info" role="progressbar"
                             aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                             style="width: 100%;">
                            <span class="sr-only">77% Complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div><!-- end col -->

    <!--المؤسسات-->
    <div class="col-xl-4 col-md-6">
        <a href="{{url('/dashboard/albums')}}">
            <div class="card-box">
            <h4 class="header-title mt-0 mb-3">Albums</h4>
            <div class="widget-box-2">
                <div class="widget-detail-2 text-right">
                    <span class="badge badge-success badge-pill float-left mt-3">albums <i class="mdi mdi-trending-up"></i></span>
                    <h2 class="font-weight-normal mb-1"> {{\App\Models\Album::count()}} </h2>
                    <p class="text-muted mb-3">Revenue today</p>
                </div>
                <div class="progress progress-bar-alt-success progress-sm">
                    <div class="progress-bar bg-success" role="progressbar"
                         aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                         style="width: 100%;">
                        <span class="sr-only">77% Complete</span>
                    </div>
                </div>
            </div>
        </div>
        </a>
    </div><!-- end col -->

    <!--الحالات-->
    <div class="col-xl-4 col-md-6">
        <a href="{{url('/')}}">
            <div class="card-box">

            <h4 class="header-title mt-0 mb-3">Photos</h4>

            <div class="widget-box-2">
                <div class="widget-detail-2 text-right">
                    <span class="badge badge-pink badge-pill float-left mt-3">photos <i class="mdi mdi-trending-up"></i> </span>
                    <h2 class="font-weight-normal mb-1"> {{\App\Models\Photo::count()}} </h2>
                    <p class="text-muted mb-3">Revenue today</p>
                </div>
                <div class="progress progress-bar-alt-pink progress-sm">
                    <div class="progress-bar bg-pink" role="progressbar"
                         aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                         style="width: 100%;">
                        <span class="sr-only">77% Complete</span>
                    </div>
                </div>
            </div>
        </div>
        </a>
    </div><!-- end col -->

    <div class="col-xl-6">
        <div class="card-box">
            <h4 class="header-title mt-0 mb-3">Pie chart for private and public albums</h4>
            <canvas id="myChart2" width="400" height="400"></canvas>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="card-box">
            <h4 class="header-title mt-0 mb-3">Pie chart for private and public albums</h4>
            <canvas id="myChart" width="400" height="400"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

<script>

    var ctx = document.getElementById('myChart2').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['public', 'private'],
            datasets: [{
                label: 'types of Albums',
                data: [{{\App\Models\Album::where('type','public')->count()}}, {{\App\Models\Album::where('type','private')->count()}}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var ctx2 = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: ['Users', 'Albums', 'Photos'],
            datasets: [{
                label: 'percent',
                data: [{{\App\Models\User::count()}}, {{\App\Models\Album::count()}}, {{\App\Models\Photo::count()}}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                ],
                borderWidth: 1
            }]
        },
    });
</script>


    @endsection
