@extends('layouts.frontend')
@section('content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{route('frontend')}}">Home</a></li>
				<li class='active'>Đăng nhập</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page ">
			<div class="row ">
				<!-- Sign-in -->			
                <div class="col-md-6 col-sm-6 sign-in ">
                    <h4 class="">Đăng nhập</h4>
                    <p class="">Xin chào, Chào mừng đến với tài khoản của bạn.</p>
                    <div class="social-sign-in outer-top-xs">
                        <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Đăng nhập bằng Facebook</a>
                        <a href="{{ route('google.login') }}" class="twitter-sign-in"><i class="fa fa-google"></i> Đăng nhập bằng Google</a>
                    </div>
                    <form class="register-form outer-top-xs" role="form" action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Tên đăng nhập hoặc Email  <span>*</span></label>
                            <input type="text" class="form-control unicase-form-control text-input {{ ($errors->has('email') || $errors->has('username')) ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" id="exampleInputEmail1" >
                            @if ($errors->has('email') || $errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ empty($errors->first('email')) ? $errors->first('username') : $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputPassword1">Mật khẩu <span>*</span></label>
                            <input type="password" class="form-control unicase-form-control text-input @error('password') is-invalid @enderror" name="password" id="exampleInputPassword1" >
                            @error('password')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="radio outer-xs">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Remember me!
                            </label>
                            <a href="#" class="forgot-password pull-right">Quên mật khẩu?</a>
                        </div>
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Đăng nhập</button>
                    </form>					
            </div>
        </div><!-- /.row -->
	</div><!-- /.sigin-in-->	
</div><!-- /.body-content -->

@endsection