@extends('layouts.frontend')
@section('content')
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li style="width: 80px;"><a href="{{route('frontend')}}">Trang chủ</a></li>
				<li class='active'>Liên hệ</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
        <div class="contact-page">
            <div class="row">
                <div class="col-md-12 contact-map outer-bottom-vs">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3924.6272952611885!2d105.43015021471477!3d10.371655792596949!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310a731e7546fd7b%3A0x953539cd7673d9e5!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBBbiBHaWFuZyAtIMSQSFFHIFRQSENN!5e0!3m2!1svi!2s!4v1642649021447!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="col-md-8 contact-form">
                    <div class="col-md-12 contact-title">
                        <h4>Hỗ trợ </h4>
                    </div>
                    
                    <div class="col-md-12">
                        <form class="register-form" role="form" action="{{ route('frontend.hotro') }}" method="post">
                        @csrf
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputTitle">Địa chỉ Email<span>*</span></label>
                                    <input type="text" class="form-control unicase-form-control text-input" name="email"id="exampleInputTitle" placeholder="Email">
                                    @error('email')
                                        <div class="invalid-feedback "><strong class="text-danger">{{ $message }}</strong></div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="info-title" for="exampleInputComments">Nội dung <span>*</span></label>
                                <textarea class="form-control unicase-form-control @error('noidung') is-invalid @enderror" name="noidung" id="exampleInputComments" placeholder="Nội dung cần hỗ trợ"></textarea>
                                @error('noidung')
                                    <div class="invalid-feedback "><strong class="text-danger">{{ $message }}</strong></div>
                                @enderror
                            </div>

                            <div class="col-md-12 outer-bottom-small m-t-20">
                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Hỗ trợ</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
                <div class="col-md-4 contact-info">
                    <div class="contact-title">
                        <h4>Thông tin</h4>
                    </div>
                    <div class="clearfix address">
                        <span class="contact-i"><i class="fa fa-map-marker"></i></span>
                        <span class="contact-span">Trường Đại học An Giang - ĐHQG TPHCM 18 Ung Văn Khiêm, Phường Đông Xuyên, Thành phố Long Xuyên, An Giang</span>
                    </div>
                    <div class="clearfix phone-no">
                        <span class="contact-i"><i class="fa fa-mobile"></i></span>
                        <span class="contact-span">0987 965 435<br></span>
                    </div>
                    <div class="clearfix email">
                        <span class="contact-i"><i class="fa fa-envelope"></i></span>
                        <span class="contact-span"><a href="#">snowcomputershop@gmail.com</a></span>
                    </div>
                </div>			
            </div><!-- /.contact-page -->
        </div><!-- /.row -->
    </div><!-- /.row -->
</div><!-- /.row -->

@endsection