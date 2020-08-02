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
            <div class="ct-chart-2 ct-perfect-fourth"></div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="card-box">
            <h4 class="header-title mt-0 mb-3">Pie chart for Users,Albums and Photos</h4>
            <div class="ct-chart ct-perfect-fourth"></div>
        </div>
    </div>
</div>

<script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>

<script>
    var data = {
        labels: ['public', 'private'],
        series: [{{\App\Models\Album::where('type','public')->count()}}, {{\App\Models\Album::where('type','private')->count()}}]
    };

    var options = {
        labelInterpolationFnc: function(value) {
            return value[0]
        }
    };

    var responsiveOptions = [
        ['screen and (min-width: 640px)', {
            chartPadding: 30,
            labelOffset: 100,
            labelDirection: 'explode',
            labelInterpolationFnc: function(value) {
                return value;
            }
        }],
        ['screen and (min-width: 1024px)', {
            labelOffset: 80,
            chartPadding: 20
        }]
    ];

    new Chartist.Pie('.ct-chart-2', data, options, responsiveOptions);

    var data = {
        labels: ['Users', 'Albums', 'Photos'],
        series: [{{\App\Models\User::count()}}, {{\App\Models\Album::count()}}, {{\App\Models\Photo::count()}}]
    };

    var options = {
        labelInterpolationFnc: function(value) {
            return value[0]
        }
    };

    var responsiveOptions = [
        ['screen and (min-width: 640px)', {
            chartPadding: 30,
            labelOffset: 100,
            labelDirection: 'explode',
            labelInterpolationFnc: function(value) {
                return value;
            }
        }],
        ['screen and (min-width: 1024px)', {
            labelOffset: 80,
            chartPadding: 20
        }]
    ];

    new Chartist.Pie('.ct-chart', data, options, responsiveOptions);
</script>


    @endsection
