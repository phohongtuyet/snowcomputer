@extends('layouts.frontend')
@section('content')
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li><a href="#">{{ $danhmuc->tendanhmuc}}</a></li>
				<li class='active'>{{ $sp->tensanpham}}</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product'>
			<div class='col-xs-12 col-sm-12 col-md-3 sidebar'>
				<div class="sidebar-module-container">
    	            <!-- ============================================== HOT DEALS ============================================== -->
                    <div class="sidebar-widget hot-deals outer-bottom-xs">
                        <h3 class="section-title">Hot deals</h3>
                        <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
                            @foreach($sanphamsale as $value)
                            <div class="item">
                                <div class="products">
                                    <div class="hot-deal-wrapper">
                                        <div class="image"> 
                                            <a href="{{ route('frontend.sanpham.chitiet',['tensanpham_slug' => $value->tensanpham_slug]) }}">
                                            @php 
                                                $img='';
                                                $dir = 'storage/app/' . $value->thumuc . '/images/';
                                                $files = scandir($dir); 
                                                $img = config('app.url') . '/'. $dir . $files[2];
                                                $img2 = config('app.url') . '/'. $dir . $files[2];        
                                            @endphp
                                                <img src="{{ $img }}" alt=""> 
                                                <img src="{{ $img2 }}" alt="" class="hover-image">
                                            </a>
                                        </div>
                                        <div class="sale-offer-tag"><span>{{$value->phantramgia}}%<br>off</span></div>
                                            <div class="timing-wrapper">
                                                <div class="box-wrapper">
                                                    <div class="date box"> <span class="key">120</span> <span class="value">DAYS</span> </div>
                                                </div>
                                                <div class="box-wrapper">
                                                    <div class="hour box"> <span class="key">20</span> <span class="value">HRS</span> </div>
                                                </div>
                                                <div class="box-wrapper">
                                                    <div class="minutes box"> <span class="key">36</span> <span class="value">MINS</span> </div>
                                                </div>
                                                <div class="box-wrapper">
                                                <div class="seconds box"> <span class="key">60</span> <span class="value">SEC</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.hot-deal-wrapper -->
                                
                                <div class="product-info text-left m-t-20">
                                    <h3 class="name"><a href="{{ route('frontend.sanpham.chitiet',['tensanpham_slug' => $value->tensanpham_slug]) }}">{{$value->tensanpham}}</a></h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="product-price"> <span class="price"> {{ number_format($value->dongia - ($value->dongia * ($value->phantramgia/100))) }} VNĐ  </span> <span class="price-before-discount">@if(!empty($value->phantramgia)) {{ number_format($value->dongia)}} @endif</span> </div>
                                    <!-- /.product-price --> 
                                
                                </div>
                                <!-- /.product-info -->
                                
                                <div class="cart clearfix animate-effect">
                                    <div class="action">
                                        <div class="add-cart-button btn-group">
                                        <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                        </div>
                                    </div>
                                    <!-- /.action --> 
                                </div>
                                <!-- /.cart --> 
                            </div>
                        </div>
                            @endforeach
                        </div>
                        <!-- /.sidebar-widget --> 
                    </div>
                    <!-- ============================================== HOT DEALS: END ============================================== -->					

                    <!-- ============================================== NEWSLETTER ============================================== -->
                    <div class="sidebar-widget newsletter outer-bottom-small">
                        <h3 class="section-title">Nhận khuyễn mãi</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <p>Đăng ký nhận thông tin của chúng tôi!</p>
                            <form action="{{ route('frontend.khuyenmai') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"id="exampleInputEmail1" placeholder="Nhập Email của bạn">
                                @error('email')
                                <div class="invalid-feedback "><strong class="text-danger">{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <button class="btn btn-primary">Đăng ký</button>
                            </form>
                        </div>
                        <!-- /.sidebar-widget-body --> 
                    </div>
                    <!-- /.sidebar-widget --> 
                    <!-- ============================================== NEWSLETTER: END ============================================== -->
				</div>
			</div><!-- /.sidebar -->
			<div class='col-xs-12 col-sm-12 col-md-9 rht-col'>
                <div class="detail-block">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 gallery-holder">
                            <div class="product-item-holder size-big single-product-gallery small-gallery">
                                <div id="owl-single-product">
                                    @foreach($all_files as $value)    
                                        <div class="single-product-gallery-item" id="{{ $value['basename'] }}">
                                            <a data-lightbox="image-1" data-title="Gallery" href="#{{ $value['basename'] }}">
                                                <img class="img-responsive" alt="" src="{{ url($dir . $value['basename']) }}" data-echo="{{ url($dir . $value['basename']) }}" />
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->
                                    @endforeach                   
                                </div><!-- /.single-product-slider -->
                                <div class="single-product-gallery-thumbs gallery-thumbs">
                                    <div id="owl-single-product-thumbnails">                                      
                                        @foreach($all_files as $value)
                                            <div class="item">
                                                <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="2" href="#{{ $value['basename'] }}">
                                                    <img class="img-responsive" alt="" src="{{ url($dir . $value['basename']) }}" data-echo="{{ url($dir . $value['basename']) }}"/>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div><!-- /#owl-single-product-thumbnails -->
                                </div><!-- /.gallery-thumbs -->

                            </div><!-- /.single-product-gallery -->
                        </div><!-- /.gallery-holder -->        			
                        <div class='col-sm-12 col-md-8 col-lg-8 product-info-block'>
                            <div class="product-info">
                                <h1 class="name">{{ $sp->tensanpham}}</h1>
                                
                                <div class="rating-reviews m-t-20">
                                    <div class="row">
                                    <div class="col-lg-12">
                                        <div class="pull-left">
                                            <div class="rating rateit-small"></div>
                                        </div>
                                        <div class="pull-left">
                                            <div class="reviews">
                                                <a href="#" class="lnk">({{ $danhgia->count()}} đánh giá)</a>
                                            </div>
                                        </div>
                                        </div>
                                    </div><!-- /.row -->		
                                </div><!-- /.rating-reviews -->

                                <div class="stock-container info-container m-t-10">
                                    <div class="row">
                                    <div class="col-lg-12">
                                        <div class="pull-left">
                                            <div class="stock-box">
                                                <span class="label">Số lượng</span>
                                            </div>	
                                        </div>
                                        <div class="pull-left">
                                            <div class="stock-box">
                                                <span class="value">{{ $sp->soluong }}</span>
                                            </div>	
                                        </div>
                                        </div>
                                    </div><!-- /.row -->	
                                </div><!-- /.stock-container -->

                                <div class="description-container m-t-20">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div><!-- /.description-container -->

                                <div class="price-container info-container m-t-30">
                                    <div class="row">                                      
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="price-box">
                                                <span class="price">{{ number_format($sp->dongia - ($sp->dongia * ($sp->phantramgia/100))) }} VNĐ</span>
                                                <span class="price-strike">@if(!empty($sp->phantramgia)) {{ number_format($sp->dongia)}} @endif</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="favorite-button m-t-5">
                                                <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
                                                    <i class="fa fa-heart"></i>
                                                </a>
                                                <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
                                                <i class="fa fa-signal"></i>
                                                </a>
                                                <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
                                                    <i class="fa fa-envelope"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.price-container -->
                                <div class="quantity-container info-container">
                                    <div class="row">                                   
                                        <div class="qty">
                                            <span class="label">Số lượng :</span>
                                        </div>                                   
                                        <div class="qty-count">
                                            <div class="cart-quantity">
                                                <div class="quant-input">
                                                    <div class="arrows">
                                                    <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                                                    <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                                                    </div>
                                                    <input type="text" value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="add-btn">
                                            <a href="#" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> Thêm vào giỏ hàng  </a>
                                        </div>				
                                    </div><!-- /.row -->
                                </div><!-- /.quantity-container -->							
                            </div><!-- /.product-info -->
                        </div><!-- /.col-sm-7 -->
                    </div><!-- /.row -->
                </div>
				<div class="product-tabs inner-bottom-xs">
					<div class="row">
						<div class="col-sm-12 col-md-3 col-lg-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
								<li class="active"><a data-toggle="tab" href="#description">Mô tả sản phẩm</a></li>
								<li><a data-toggle="tab" href="#review">Đánh giá sản phẩm</a></li>
							</ul><!-- /.nav-tabs #product-tabs -->
						</div>
						<div class="col-sm-12 col-md-9 col-lg-9">
    						<div class="tab-content">
								<div id="description" class="tab-pane in active">
									<div class="product-tab">
										<p class="text">{!! $sp->motasanpham !!}</p>
									</div>	
								</div><!-- /.tab-pane -->
								<div id="review" class="tab-pane">
									<div class="product-tab">																				
										<div class="product-reviews">
											<h4 class="title">Đánh giá {{$sp->tensanpham}} </h4>
											<div class="reviews">
                                                @foreach($danhgia as $value)
                                                    <div class="review">
                                                        <div class="review-title"><strong class="summary">{{ $value->User()->name}}</strong><span class="date"><i class="fa fa-calendar"></i><span>{{date_format($value->created_at, 'd/m/Y H:i:s')  }} </span></span></div>
                                                        <div class="text">"{{ $value->noidung}}"</div>
                                                    </div>
                                               @endforeach
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
                @php 
                    $collection = collect($sanpham);
                    $items= $collection->groupBy('tendanhmuc');
                    $items->toArray();                    
                @endphp
                <section class="section featured-product">
                    <div class="row">
                        <div class="col-lg-3">
                            <h3 class="section-title">Upsell Products</h3>
                            <div class="ad-imgs">
                                <img class="img-responsive" src="assets/images/banners/home-banner1.jpg" alt="">
                                <img class="img-responsive" src="assets/images/banners/home-banner2.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="owl-carousel homepage-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">    
                            @foreach($items as $sp => $product_list)
                            @if($danhmuc->tendanhmuc === $sp) 
                                @foreach($product_list as $value) 
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">		
                                                <div class="product-image">
                                                    <div class="image">
                                                        @php 
                                                            $img='';
                                                            $dir = 'storage/app/' . $value->thumuc . '/images/';
                                                            $files = scandir($dir); 
                                                            $img = config('app.url') . '/'. $dir . $files[2];
                                                        @endphp
                                                        <a href="{{ route('frontend.sanpham.chitiet',['tensanpham_slug' => $value->tensanpham_slug]) }}"><img  src="{{ $img }}" alt=""></a>
                                                    </div><!-- /.image -->			

                                                    <div class="tag sale"><span>sale</span></div>            		   
                                                </div><!-- /.product-image -->
                                                        
                                                <div class="product-info text-left">
                                                    <h3 class="name"><a href="{{ route('frontend.sanpham.chitiet',['tensanpham_slug' => $value->tensanpham_slug]) }}">{{$value->tensanpham}}</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="description"></div>

                                                    <div class="product-price">	
                                                        <span class="price">{{$value->dongia}}	</span>
                                                        <span class="price-before-discount">$ 800</span>                          
                                                    </div><!-- /.product-price -->
                                                    
                                                </div><!-- /.product-info -->
                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="list-unstyled">
                                                            <li class="add-cart-button btn-group">
                                                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                                                    <i class="fa fa-shopping-cart"></i>													
                                                                </button>
                                                                <button class="btn btn-primary cart-btn" type="button">Thêm vào giỏ hàng</button>                                                                   
                                                            </li>
                                                            <li class="lnk wishlist">
                                                                <a class="add-to-cart" href="detail.html" title="Wishlist">
                                                                    <i class="icon fa fa-heart"></i>
                                                                </a>
                                                            </li>

                                                            <li class="lnk">
                                                                <a class="add-to-cart" href="detail.html" title="Compare">
                                                                    <i class="fa fa-signal"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div><!-- /.action -->
                                                </div><!-- /.cart -->
                                            </div><!-- /.product -->
                            
                                        </div><!-- /.products -->
                                    </div><!-- /.item -->
                                @endforeach
                                @endif                                
                                @endforeach                               

                            </div><!-- /.home-owl-carousel -->
                        </div>
                    </div>
                </section><!-- /.section -->
<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
			
			</div><!-- /.col -->
			<div class="clearfix"></div>
		</div><!-- /.row -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <div id="brands-carousel" class="logo-slider">
                <div class="logo-slider-inner">	
                    <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                    @foreach($hangsanxuat as $value)
                        <div class="item m-t-15"> <a href="#" class="image"> 
                        <img data-echo="{{ env('APP_URL') . '/storage/app/hangsanxuat/images/' . $value->hinhanh }}" src="{{ env('APP_URL') . '/storage/app/hangsanxuat/images/' . $value->hinhanh }}" alt=""> </a> 
                        </div>
                    @endforeach
                    </div><!-- /.owl-carousel #logo-slider -->
                </div><!-- /.logo-slider-inner -->
        </div><!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->

@endsection