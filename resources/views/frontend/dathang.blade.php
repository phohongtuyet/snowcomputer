@extends('layouts.frontend')
@section('content')
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{route('frontend')}}">Home</a></li>
				<li class='active'>Đặt hàng</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->


<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8 col-sm-6 sign-in">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
                        <div class="panel panel-default checkout-step-01">
                            <!-- panel-heading -->
                            <div class="panel-heading">
                                <h4 class="unicase-checkout-title">
                                    <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
                                    <span>Thông tin đơn hàng</span> 
                                    </a>
                                </h4>
                            </div>
                            <!-- panel-heading -->
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <!-- panel-body  -->
                                <div class="panel-body">
                                    <div class="row">		
                                        <!-- already-registered-login -->
                                        <div class="col-md-12 col-sm-6 already-registered-login">
                                            <p class="text title-tag-line">Thông tin giao hàng:</p>
                                            <form class="register-form" role="form" id="checkoutform" action="{{ route('frontend.dathang') }}" method="post"  >
                                                @csrf
                                                <div id="giagiam">
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Họ và tên <span>*</span></label>
                                                    <input type="text" class="form-control unicase-form-control text-input @error('nguoidung_id') is-invalid @enderror" name="name" id="exampleInputEmail1" placeholder="">
                                                    @error('user_id')
                                                        <div class="invalid-feedback"><strong class="text-danger">{{ $message }}</strong></div>
                                                    @enderror
                                                </div> 
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Số điện thoại<span>*</span></label>
                                                    <input type="text" class="form-control unicase-form-control text-input @error('dienthoaigiaohang') is-invalid @enderror" name="dienthoaigiaohang" id="exampleInputEmail1" placeholder="">
                                                    @error('dienthoaigiaohang')
                                                        <div class="invalid-feedback"><strong class="text-danger">{{ $message }}</strong></div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Địa chỉ giao hàng<span>*</span></label>
                                                    <input type="text" class="form-control unicase-form-control text-input @error('diachigiaohang') is-invalid @enderror" name="diachigiaohang" id="exampleInputEmail1" placeholder="">
                                                    @error('diachigiaohang')
                                                        <div class="invalid-feedback"><strong class="text-danger">{{ $message }}</strong></div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputPassword1">Địa chỉ Email <span>*</span></label>
                                                    <input type="email" class="form-control unicase-form-control text-input @error('email') is-invalid @enderror" name="email" id="exampleInputEmail1" placeholder="">
                                                    @error('email')
                                                        <div class="invalid-feedback"><strong class="text-danger">{{ $message }}</strong></div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputPassword1">Ghi chú   <span></span></label>
                                                    <textarea class="form-control unicase-form-control text-input" id="exampleInputPassword1" placeholder=""></textarea>
                                                </div>
                                            </form>
                                        </div>	
                                        <!-- already-registered-login -->		
                                    </div>			
                                </div>
                                <!-- panel-body  -->

                            </div><!-- row -->
                        </div>
                        <!-- checkout-step-01  -->

					  	<div class="panel panel-default checkout-step-05">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseFive">
						        	<span>Phương thức vận chuyển</span>
						        </a>
						      </h4>
						    </div>
						    <div id="collapseFive" class="panel-collapse collapse">
						      <div class="panel-body">
						       Giao hàng tận nơi
						      </div>
						    </div>
					    </div>

					  	<div class="panel panel-default checkout-step-06">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseSix">
						        	<span>Phương thức thanh toán</span>
						        </a>
						      </h4>
						    </div>
					    	<div id="collapseSix" class="panel-collapse collapse">
					      		<div class="panel-body">
                                  Thanh toán khi giao hàng (COD)
                                    Là phương thức khách hàng nhận hàng mới trả tiền. Áp dụng với tất cả các đơn hàng trên toàn quốc			
                                </div>
					    	</div>
					  	</div>
					</div><!-- /.checkout-steps -->
                    
				</div>
				<div class="col-md-4 col-sm-6 sign-in ">
					<!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Đơn hàng của bạn</h4>
                                </div>
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Sản phẩm</th>
                                                <th>Thành tiền</th>
                                            </tr>
                                        </thead><!-- /thead -->
                                        <tbody>
                                            @foreach(Cart::content() as $value)
                                                <tr>
                                               
                                                    <td>{{$value->name}}  x <strong>{{$value->qty}}</strong>  </td>
                                                    <td>{{number_format( $value->price)}} </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td><strong >Tạm tính</strong>  </td>
                                                <td><strong id="tamtinh">{{number_format( $value->price * $value->qty)}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Giảm giá</strong>  </td>
                                                <td id="giamgia"></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Tổng tiền</strong>  </td>
                                                <td id="tongtien"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="{{ route('frontend.dathang') }}" onclick="event.preventDefault();document.getElementById('checkoutform').submit();" class="btn btn-primary checkout-btn"class="btn btn-primary checkout-btn">Hoàn tất đơn hàng</a>
                                                </td>
                                            </tr>
                                        </tbody><!-- /tbody --> 
                                    </table><!-- /table -->
                            </div>
                        </div>
                    </div> 
                <!-- checkout-progress-sidebar -->				
                </div>
                
			</div><!-- /.row -->
            
		</div><!-- /.checkout-box -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <div id="brands-carousel" class="logo-slider wow fadeInUp">

                <div class="logo-slider-inner">	
                    <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                    @foreach($hangsanxuat as $value)
                        <div class="item"> <a href="#" class="image"> 
                            <img data-echo="{{ env('APP_URL') . '/storage/app/hangsanxuat/images/' . $value->hinhanh }}" src="{{ env('APP_URL') . '/storage/app/hangsanxuat/images/' . $value->hinhanh }}" alt=""> </a> 
                        </div>
                    @endforeach
                    </div><!-- /.owl-carousel #logo-slider -->
                </div><!-- /.logo-slider-inner -->
            
        </div><!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->

@endsection
@section('javascript')
<script>
$(document).ready(function(){
    let tamtinh = $(this).find('#tamtinh').text();
    temp = tamtinh.replace(/,/g, '');
    if (sessionStorage.giamgia > 0)
    { 
        $('#giagiam').append('<input type="hidden" name="giagiam" value="'+ sessionStorage.giamgia +'">');
        $('#giamgia').empty();
        $('#giamgia').append('<strong>'+sessionStorage.giamgia+'%</strong>');
        $('#tongtien').append('<strong>'+ (parseFloat(temp) - ((parseFloat(sessionStorage.giamgia)/100) * parseFloat(temp) )).toLocaleString('it-IT', {style : 'currency', currency : 'VND'}) +'</strong>');    
    } 
    else 
    {
        $('#giamgia').empty();
        $('#tongtien').empty();
        $('#tongtien').append('<strong>'+ tamtinh +'</strong>');
    } 
});
</script>
@endsection
