@extends('layouts.frontend')
@section('content')
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{route('frontend')}}">Home</a></li>
				<li class='active'>Giỏ hàng</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-bd">
	<div class="container">
		<div class="x-page inner-bottom-sm">
			<div class="row">
				<div class="col-md-12 x-text text-center">
					<img src="{{ asset('public/frontend/images/success.png')}}"width="300" alt="">
					<p>Bạn đã đặt hàng thành công.Đơn hàng điện tử đã được gửi đến Email của bạn</p>	
					<a href="{{route('frontend')}}"><i class="fa fa-home"></i> Trở lại trang chủ </a>
				</div>
			</div>
		</div><
	</div>
</div>

@endsection