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
                                <p class="mb-0"><a href="{{route('admin.donhang')}}">Xem</a>  </p>
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
                            <p class="mb-0"></p>
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
                            <h5 class="font-15">Sản phẩm</h5>
                            <h2 class="mb-3 font-18">{{$sp->count()}}</h2>
                            <p class="mb-0"></p>
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
                                @php $tong = 0; $tongkm = 0; @endphp
                                @foreach($doanhthu as $value)       
                                    @php 
                                        $tong += $value->tongsoluongban * $value->dongia;
                                        if(!empty($value->khuyenmai))
                                            $tongkm += $value->tongsoluongban * ($value->dongia - ( $value->khuyenmai/100 * $value->dongia )) ;    
                                        else
                                            $tongkm += $value->tongsoluongban * $value->dongia;
                                    @endphp
                                @endforeach
                                <h2 class="mb-3 font-18">{{number_format($tong)}}</h2>
                                <p class="mb-0"></p>
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
    <div class="row">
        <div class="col-12 col-sm-12 col-lg-12">
            <div class="card ">
                <div class="card-header">
                    <h4>Sản phẩm hết hàng</h4>
                </div>
                <div class="card-body table-responsive">
                    <table id="table_id" class="table table-striped">
                        <thead>
                            <tr>
                                <th width="10%" class="text-center">#</th>
                                <th width="90%" class="text-center">Tên sản phẩm</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sanpham as $value)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $value->tensanpham }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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