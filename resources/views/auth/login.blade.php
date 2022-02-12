@extends('layouts.admin')
@section('content')
<div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Đăng nhập trang quản trị</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                @csrf
                    <div class="form-group">
                        <label for="email">Tên đăng nhập hoặc địa chỉ Email</label>
                        <input type="text"
                        class="form-control{{ ($errors->has('email') || $errors->has('username')) ? ' is-invalid' : '' }}"
                        id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @if ($errors->has('email') || $errors->has('username'))
                            <span class="invalid-feedback" role="alert">
                                <strong>
                                    {{ empty($errors->first('email')) ? $errors->first('username') : $errors->first('email') }}
                                </strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="d-block"><label for="password" class="control-label">Mật khẩu</label></div>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label text-md-end" for="feedback-recaptcha">Xác thực đăng nhập</label>
                        <div class="g-recaptcha @error('g-recaptcha-response') is-invalid @enderror"
                            data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}" data-size="normal"data-theme="light"></div>
                        @error('g-recaptcha-response')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group">
                            <a href="{{ route('password.request') }}" class="text-small">Quên mật khẩu ?</a>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="remember-me">Ghi nhớ tài khoản</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">Đăng nhập</button>
                    </div>
                </form>   
              </div>
            </div>  
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
@section('javascript')
 <script src="https://www.google.com/recaptcha/api.js?hl=vi" async defer></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        $("div").removeClass("main-content");
    });
    </script>
@endsection