@extends('layouts.frontend')
@section('content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{route('frontend')}}">Home</a></li>
				<li class='active'>Danh sách sản phẩm yêu thích</li>
			</ul>
		</div>
	</div>
</div>

<div class="body-content">
	<div class="container">
		<div class="my-wishlist-page">
			<div class="row">
				<div class="col-md-12 my-wishlist">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="4" class="heading-title">Danh sách sản phẩm yêu thích </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sanphamyeuthich as $value)
                                    <tr>
                                    @php 
                                        $img='';
                                        $dir = 'storage/app/' . $value->SanPham->thumuc . '/images/';
                                        $files = scandir($dir); 
                                        if(empty($files[2]))
                                            $img =  env('APP_URL')."/public/frontend/images/noimage.png";
                                        else
                                            $img = config('app.url') . '/'. $dir . $files[2];
                                    @endphp
                                        <td class="col-md-2 col-sm-6 col-xs-6"><img src="{{$img}}" alt="imga"></td>
                                        <td class="col-md-7 col-sm-6 col-xs-6">
                                            <div class="product-name"><a href="{{ route('frontend.sanpham.chitiet',['tensanpham_slug' => Str::slug($value->SanPham->tensanpham)]) }}">{{$value->SanPham->tensanpham}}</a></div>
                                            <div class="rating">
                                                <i class="fa fa-star rate"></i>
                                                <i class="fa fa-star rate"></i>
                                                <i class="fa fa-star rate"></i>
                                                <i class="fa fa-star rate"></i>
                                                <i class="fa fa-star non-rate"></i>
                                                <span class="review">( 06 Reviews )</span>
                                            </div>
                                            <div class="price">
                                            {{ number_format($value->SanPham->dongia - ($value->SanPham->dongia * ($value->SanPham->phantramgia/100))) }}
                                                <span>@if(!empty($value->SanPham->phantramgia)) {{ number_format($value->SanPham->dongia)}} @endif</span>
                                            </div>
                                        </td>
                                        <td class="col-md-2 ">
                                            <a href="{{ route('frontend.giohang.them', ['tensanpham_slug' => Str::slug($value->SanPham->tensanpham)]) }}" class="btn-upper btn btn-primary">Thêm vào giỏ hàng</a>
                                        </td>
                                        <td class="col-md-1 close-btn">
                                        <a href="#xoa" data-toggle="modal" data-target="#exampleModal" onclick="getXoa({{ $value->id }}); return false;"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                @endforeach                  
                            </tbody>
                        </table>
                    </div>
                </div>		
	        </div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <div id="brands-carousel" class="logo-slider wow fadeInUp">
            <div class="logo-slider-inner">	
                <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                    @foreach($hangsanxuat as $value)
                        <div class="item m-t-15"> <a href="{{route('frontend.hangsanxuat',['hangsanxuat' => $value->tenhangsanxuat_slug])}}" class="image"> 
                            <img data-echo="{{ env('APP_URL') . '/storage/app/hangsanxuat/images/' . $value->hinhanh }}" src="{{ env('APP_URL') . '/storage/app/hangsanxuat/images/' . $value->hinhanh }}" alt=""> </a> 
                        </div>
                    @endforeach
                </div><!-- /.owl-carousel #logo-slider -->
            </div><!-- /.logo-slider-inner -->
        </div><!-- /.logo-slider -->
    </div><!-- /.container -->
</div><!-- /.body-content -->
@if(session('status'))   
    <div class="toast">
        <div class="toast-content">
            <i class="fa fa-solid fa-check check"></i>

            <div class="message">
                <span class="text text-1">Success</span>
                <span class="text text-2">{!! session('status') !!}</span>
            </div>
        </div>
        <i class="fa-solid fa-xmark close"></i>
        <div class="progress"></div>
    </div>
@endif

<form action="{{ route('khachhang.sanphamyeuthich.xoa') }}" method="post">
    @csrf
    <input type="hidden" id="ID_delete" name="ID_delete" value="" />
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xóa sản phẩm yêu thích</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>            
            </div>
            <div class="modal-body">
                <p class="font-weight-bold text-danger"><i class="fa fa-question-circle"></i> Xác nhận xóa? Hành động này không thể phục hồi.</p>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Hủy bỏ</button>
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash-alt"></i> Thực hiện</button>
            </div>
            </div>
        </div>
    </div>
</form> 
@endsection

@section('javascript')
<script>	
    function getXoa(id) {
        $('#ID_delete').val(id);
    }
</script>
@endsection