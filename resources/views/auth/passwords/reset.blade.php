@extends('layouts.frontend')

@section('content')
<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 logo-holder" style="width: 440px;"> 
        </div>
        <div class="col-lg-7 col-md-6 col-sm-8 col-xs-12 top-search-holder">  
          <div class="col-md-8 col-sm-6 sign-in ">
          <div class="card card-primary">
            <div class="card-header">
              <h4>Đặt lại mặt khẩu</h4>
            </div>
            <div class="card-body">
              <p class="">Nhập mật khẩu mới của bạn</p>
              <form method="POST" action="{{ route('password.update') }}">
              @csrf
                  <input type="hidden" name="token" value="{{ $token }}">
                  <div class="form-group">
                      <label for="email">Địa chỉ Email</label>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}"  autocomplete="email" autofocus>

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror                  
                  </div>
                  <div class="form-group">
                      <label for="password">Mật khẩu mới</label>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                      <div id="pwindicator" class="pwindicator">
                          <div class="bar"></div>
                          <div class="label"></div>
                      </div>
                  </div>
                <div class="form-group">
                  <label for="password-confirm">Xác nhận mật khẩu</label>
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">

                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Đặt lại mật khẩu
                  </button>
                </div>
              </form>
            </div>
          </div>
          </div>
        </div>
      </div>
	</div>	
</div>
@endsection
@section('javascript')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        $("div").removeClass("main-content");
    });
    </script>
@endsection