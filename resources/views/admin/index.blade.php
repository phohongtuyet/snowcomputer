@extends('layouts.admin')
@section('content')

<section class="section">
    <div class="row ">
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
        <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
            <div class="row ">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                <div class="card-content">
                    <h5 class="font-15">Đơn hàng mới </h5>
                    <h2 class="mb-3 font-18">{{$donhang->count()}}</h2>
                    <p class="mb-0"><span class="col-green">10%</span> Increase</p>
                </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                <div class="banner-img">
                    <img src="{{ asset('public/admin/img/banner/1.png')}}" alt="">
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
        <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
            <div class="row ">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                <div class="card-content">
                    <h5 class="font-15">Khách hàng</h5>
                    <h2 class="mb-3 font-18">{{$user->count()}}</h2>
                    <p class="mb-0"><span class="col-orange">09%</span> Decrease</p>
                </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                <div class="banner-img">
                    <img src="{{ asset('public/admin/img/banner/2.png')}}" alt="">
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
        <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
            <div class="row ">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                <div class="card-content">
                    <h5 class="font-15">New Project</h5>
                    <h2 class="mb-3 font-18">{{$donhang->count()}}</h2>
                    <p class="mb-0"><span class="col-green">18%</span>
                    Increase</p>
                </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                <div class="banner-img">
                    <img src="{{ asset('public/admin/img/banner/3.png')}}" alt="">
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="card">
        <div class="card-statistic-4">
            <div class="align-items-center justify-content-between">
            <div class="row ">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                <div class="card-content">
                    <h5 class="font-15">Doanh thu</h5>
                    <h2 class="mb-3 font-18">{{$doanhthu->count()}}</h2>
                    <p class="mb-0"><span class="col-green">42%</span> Increase</p>
                </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                <div class="banner-img">
                    <img src="{{ asset('public/admin/img/banner/4.png')}}" alt="">
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-lg-12">
            <div class="card ">
                <div class="card-header">
                    <h4>Biểu đồ doanh thu hôm nay</h4>
                    <div class="card-header-action">
                        <div class="dropdown">
                        </div>
                        <a href="{{route('admin.donhang')}}" class="btn btn-primary">View All</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <div id="chart" style="height: 300px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
   
@endsection
@section('javascript')
<script>

    var chart = new Chartisan({
        el: '#chart',
        url: "@chart('ban_hang_chart')",
        hooks: new ChartisanHooks()
            .colors(['#00C897', '#FF6384','#36A2EB'])
            .responsive()
            .beginAtZero()
            .title('Biểu đồ doanh thu hôm nay của cửa hàng')
            .legend({ position: 'bottom' })
    });    
</script>
@endsection