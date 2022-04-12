@extends('layouts.frontend')
@section('content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{route('frontend')}}">Home</a></li>
				<li class='active'>Tài khoản của tôi</li>
			</ul>
		</div>
	</div>
</div>

<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product'>
        	<div class='col-xs-12 col-sm-12 col-md-9 rht-col'>
				<div class="product-tabs inner-bottom-xs">
					<div class="row">
						<div class="col-sm-12 col-md-3 col-lg-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                <li class="active"><a data-toggle="tab" href="#home">Trang chủ </a></li>
								<li><a data-toggle="tab" href="#description">Đơn hàng</a></li>
								<li><a data-toggle="tab" href="#review">Thông tin cá nhân</a></li>
                                <li>
                                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Đăng xuất</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                                        @csrf
                                    </form>
                                </li>

							</ul><!-- /.nav-tabs #product-tabs -->
						</div>
						<div class="col-sm-12 col-md-12 col-lg-9">
    						<div class="tab-content">
                                <div id="home" class="tab-pane in active">
									<div class="product-tab">
										<p class="text">Trang chủ khách hàng </p>
									</div>	
								</div><!-- /.tab-pane -->
								<div id="description" class="tab-pane">
									<div class="product-tab">
										<p class="text">Lịch sử đơn hàng của bạn</p>
										<table class="table table-borderless">
											<thead>
												<tr>
													<th scope="col">Điện thoại giao hàng</th>
													<th scope="col">Địa chỉ giao hàng</th>
													<th scope="col">Ngày đặt</th>
													<th scope="col">Tình Trạng</th>
													<th scope="col">Chi tiết</th>
													<th scope="col"></th>

												</tr>
											</thead>
											<tbody>
												@foreach($donhang as $value)
												<tr>
													<th>{{ $value->dienthoaigiaohang }}</th>
													<th>{{ $value->diachigiaohang }}</th>
													<th>{{ date_format($value->created_at, 'd/m/Y H:i:s') }}</th>
													<th>{{ $value->TinhTrang->tinhtrang }}</th>
													<th>
														<a href="{{ route('khachhang.donhang.chitiet',['id' => $value->id])}}" class="btn-sua"><i class="icon fa fa-info-circle"></i></a>
													</th>
													<th>
														@if($value->tinhtrang_id === 1 or $value->tinhtrang_id === 2 )
															<a href="{{ route('khachhang.donhang.huy',['id' => $value->id])}}" class="genric-btn danger radius" >Hủy</a>
														@elseif($value->tinhtrang_id === 3)
															<a href=""class="genric-btn btn btn-danger disabled radius" >Đã hủy</a>
														@else
															<a href="{{ route('khachhang.donhang.huy',['id' => $value->id])}}" class="genric-btn btn btn-info disabled radius">Thành công</a>
														@endif

													</th>
												</tr>
												@endforeach
											</tbody>
                            
                        				</table>
									</div>	
								</div><!-- /.tab-pane -->
								<div id="review" class="tab-pane">
									<div class="product-tab">																																																	
										<div class="product-add-review">
											<h4 class="title">Thông tin tài khoản </h4>																					
                                                <div class="review-form">
                                                    <div class="form-container">
                                                        <form class="cnt-form" action="{{ route('khachhang.hoso') }}" method="post"> 
														@csrf                                                  
                                                            <div class="row">                                                               
																<div class="form-group">
																	<label for="exampleInputName">Họ và tên<span class="astk">*</span></label>
																	<input type="text" class="form-control txt @error('name') is-invalid @enderror" id="name" name="name" value="{{Auth::user()->name}}" placeholder="">
																	@error('name')
																		<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
																	@enderror
																</div><!-- /.form-group -->
																<div class="form-group">
																	<label for="exampleInputSummary">Địa chỉ Email <span class="astk">*</span></label>
																	<input type="text" class="form-control txt @error('email') is-invalid @enderror" id="email" name="email" value="{{Auth::user()->email}}"placeholder="">
																	@error('email')
																		<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
																	@enderror
																</div><!-- /.form-group -->
																
																<div class="mb-3 form-check">
																	<input class="form-check-input" type="checkbox" id="change_password_checkbox" name="change_password_checkbox" />
																	<label class="form-check-label" for="change_password_checkbox">Đổi mật khẩu</label>
																</div>

																<div id="change_password_group">
																	<div class="form-group">
																		<label class="form-label" for="password">Mật khẩu mới</label>
																		<input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" />
																		@error('password')
																			<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
																		@enderror
																	</div>
																	<div class="form-group">
																		<label class="form-label" for="password_confirmation">Xác nhận mật khẩu mới</label>
																		<input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" />
																		@error('password_confirmation')
																			<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
																		@enderror
																	</div>
																</div>
                                                            </div><!-- /.row -->                                                          
                                                            <div class="action text-right">
                                                                <button class="btn btn-primary btn-upper">Cập nhật thông tin  </button>
                                                            </div><!-- /.action -->

                                                        </form><!-- /.cnt-form -->
                                                    </div><!-- /.form-container -->
                                                </div><!-- /.review-form -->
										</div><!-- /.product-add-review -->																				
							        </div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->
							</div><!-- /.tab-content -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.product-tabs -->
			</div><!-- /.col -->
			<div class="clearfix"></div>
		</div><!-- /.row -->
	</div>
</div>
<div class="modal fade" id="modal-sua" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Đơn hàng chi tiết</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div id="sua" class="modal-body">
						
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
			</div>
    	</div>
  	</div>
</div>
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
@endsection
@section('javascript')
<script>
	$(document).ready(function() {
        $("#change_password_group").hide();
        $("#change_password_checkbox").change(function() {
            if($(this).is(":checked"))
            {
                $("#change_password_group").show();
                $("#change_password_group :input").attr("required", "required");
            }
            else
            {
                $("#change_password_group").hide();
                $("#change_password_group :input").removeAttr("required");
            }
        });
    });

	$(document).on('click', '.btn-sua', function(e) {
		e.preventDefault();
		let url = $(this).attr('href');
		$.get(url, function(res) {
			$('#sua').html(res);
			$('#modal-sua').modal('show');
		})
	});
</script>
@endsection