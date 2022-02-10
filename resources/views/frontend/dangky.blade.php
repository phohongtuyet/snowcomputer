@extends('layouts.frontend')
@section('content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li style="width: 80px;"><a href="{{route('frontend')}}">Trang chủ</a></li>
				<li class='active'>Đăng ký</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder" style="width: 500px;"> 
                </div>
            
                <div class="col-lg-7 col-md-6 col-sm-8 col-xs-12 top-search-holder"> 
                    <!-- create a new account -->
                    <div class="col-md-6 col-sm-6 create-new-account">
                        <h4 class="checkout-subtitle">Tạo tài khoản mới</h4>
                        <p class="text title-tag-line">Tạo tài khoản mới của bạn.</p>
                        <form class="register-form outer-top-xs" role="form" action="{{ route('register') }}" method="post">
                        @csrf

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">Địa chỉ Email  <span>*</span></label>
                                <input type="email" class="form-control unicase-form-control text-input  @error('email') is-invalid @enderror"name="email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Họ và tên <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" id="exampleInputEmail1" >
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Số điện thoại  <span>*</span></label>
                                <input type="text" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                            
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Mật khẩu <span>*</span></label>
                                <input type="password" class="form-control unicase-form-control text-input @error('password') is-invalid @enderror"
                                            name="password" value="{{ old('password') }}" id="exampleInputEmail1" >
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Xác nhận mật khẩu  <span>*</span></label>
                                <input id="password-confirm" type="password"name="password_confirmation" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Đăng ký </button>
                        </form>
            
                </div>	
            </div> 
        </div><!-- /.row -->
	</div><!-- /.sigin-in-->
</div><!-- /.body-content -->

@endsection