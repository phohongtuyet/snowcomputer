@extends('layouts.frontend')
@section('content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{route('frontend')}}">Home</a></li>
				<li class='active'>Tài khoản của tôi</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

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
                                <div id="description" class="tab-pane in active">
									<div class="product-tab">
										<p class="text">trang chu</p>
									</div>	
								</div><!-- /.tab-pane -->
								<div id="description" class="tab-pane in active">
									<div class="product-tab">
										<p class="text"></p>
									</div>	
								</div><!-- /.tab-pane -->
								<div id="review" class="tab-pane">
									<div class="product-tab">																				
										<div class="product-reviews">
											<h4 class="title">Đánh giá  </h4>
											<div class="reviews">
                                                    <div class="review">
                                                        <div class="review-title"><strong class="summary"></strong><span class="date"><i class="fa fa-calendar"></i><span></span></span></div>
                                                        <div class="text">""</div>
                                                    </div>
											</div><!-- /.reviews -->
										</div><!-- /.product-reviews -->																				
										<div class="product-add-review">
											<h4 class="title">Đánh giá của bạn</h4>																					
                                                <div class="review-form">
                                                    <div class="form-container">
                                                        <form class="cnt-form">
                                                            
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputName">Your Name <span class="astk">*</span></label>
                                                                        <input type="text" class="form-control txt" id="exampleInputName" placeholder="">
                                                                    </div><!-- /.form-group -->
                                                                    <div class="form-group">
                                                                        <label for="exampleInputSummary">Summary <span class="astk">*</span></label>
                                                                        <input type="text" class="form-control txt" id="exampleInputSummary" placeholder="">
                                                                    </div><!-- /.form-group -->
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputReview">Review <span class="astk">*</span></label>
                                                                        <textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder=""></textarea>
                                                                    </div><!-- /.form-group -->
                                                                </div>
                                                            </div><!-- /.row -->
                                                            
                                                            <div class="action text-right">
                                                                <button class="btn btn-primary btn-upper">Gửi đánh giá</button>
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

				<!-- ============================================== UPSELL PRODUCTS ============================================== -->
               
               
<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
			
			</div><!-- /.col -->
			<div class="clearfix"></div>
		</div><!-- /.row -->
</div></div>

@endsection