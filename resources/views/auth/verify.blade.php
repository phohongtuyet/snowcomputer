@extends('layouts.frontend')

@section('content')
<div class="body-content outer-top-bd">
	<div class="container">
		<div class="x-page inner-bottom-sm">
			<div class="row">
				<div class="col-md-12 x-text text-center">
                    <h2 class="card-header">{{ __('Xác minh địa chỉ email của bạn') }}</h2>
                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Một liên kết xác minh mới đã được gửi đến địa chỉ email của bạn. ') }}
                            </div>
                        @endif
                        {{ __('Trước khi tiếp tục, vui lòng kiểm tra email của bạn để biết liên kết xác minh.') }}
                        {{ __('Nếu bạn không nhận được email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Bấm vào đây để yêu cầu khác') }}</button>.
                        </form>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
