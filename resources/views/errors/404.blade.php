@extends('layouts.frontend')
@section('title', '404')
@section('content')
<div class="body-content outer-top-bd">
	<div class="container">
		<div class="x-page inner-bottom-sm">
			<div class="row">
				<div class="col-md-12 x-text text-center">
					<h1>404</h1>
          <h2>Không tìm thấy trang</h2>
					<p>Chúng tôi rất tiếc. Trang của bạn yêu cầu không có sẵn hoặc bị lỗi. </p>
					
					<a href="{{route('frontend')}}"><i class="fa fa-home"></i> về trang chủ</a>
				</div>
			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
	</div><!-- /.container -->
</div><!-- /.body-content -->
@endsection