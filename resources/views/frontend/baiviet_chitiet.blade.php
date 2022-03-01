@extends('layouts.frontend')
@section('content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{route('frontend')}}">Home</a></li>
                <li style="width: 102px;"><a href="{{route('frontend.baiviet')}}" >Tin công nghệ</a></li>
				<li class='active'>{{ $baiviet->tieude}}</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="row">
			<div class="blog-page">
				<div class="col-xs-12 col-sm-9 col-md-9 rht-col">
					<div class="blog-post wow fadeInUp">
                        <img class="img-responsive" src="assets/images/blog-post/blog_big_01.jpg" alt="">
                        <h1>{{ $baiviet->tieude }}</h1>
                        <span class="author">{{ $baiviet->User->name }}</span>
                        <span class="review">{{$binhluan->count()}} bình luận</span>
                        <span class="date-time">{{ $baiviet->created_at }}</span>
                        <p>{!! $baiviet->noidung !!}</p>
                        <div class="social-media">
                            <span>Chia sẻ:</span>
                            <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
                            <a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-rss"></i></a>
                            <a href="#" class="hidden-xs"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                    <div class="blog-post-author-details wow fadeInUp">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="{{asset('public/frontend/images/testimonials/member3.png')}}" alt="Responsive image" class="img-circle img-responsive">
                            </div>
                            <div class="col-md-10">
                                <h4>{{ $baiviet->User->name }}</h4>
                                <div class="btn-group author-social-network pull-right">
                                    <span>Theo dõi trên  </span>
                                    <button type="button" class="dropdown-toggle" data-toggle="dropdown">
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#"><i class="icon fa fa-facebook"></i>Facebook</a></li>
                                        <li><a href="#"><i class="icon fa fa fa-twitter"></i>Witter</a></li>
                                    </ul>
                                </div>
                                <span class="author-job">Tác giả</span>
                            </div>
                        </div>
                    </div>
                    <div class="blog-review wow fadeInUp">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="title-review-comments">{{$binhluan->count()}} bình luận</h3>
                            </div>
                            @foreach($binhluan as $value)
                                <div class="col-md-2 col-sm-2">
                                    <img src="assets/images/testimonials/member1.png" alt="Responsive image" class="img-rounded img-responsive">
                                </div>
                                <div class="col-md-10 col-sm-10 blog-comments outer-bottom-xs">
                                    <div class="blog-comments inner-bottom-xs">
                                        <h4>{{ $value->User->name }}</h4>
                                        <span class="review-action pull-right">
                                            {{date_format($value->created_at, 'd/m/Y H:i:s')  }} 
                                        </span>
                                        <p>{{ $value->noidung }}</p>
                                    </div>

                                </div>
                            @endforeach
                            <div class="post-load-more col-md-12"><a class="btn btn-upper btn-primary" href="#">Load more</a></div>
                        </div>
                    </div>	

                    <div class="blog-write-comment outer-bottom-xs outer-top-xs">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Để lại bình luận</h4>
                            </div>
                            <div class="col-md-12">
                                <form class="register-form" role="form" action="{{route('frontend.binhluan',['tieude_slug' => $baiviet->tieude_slug])}}" method="get">
                                    <div class="form-group">
                                        <label class="info-title" for="noidung">Nội dung <span>*</span></label>
                                        <textarea class="form-control unicase-form-control @error('noidung') is-invalid @enderror" id="noidung" name="noidung"></textarea>
                                        @error('noidung')
                                            <div class="invalid-feedback "><strong class="text-danger">{{ $message }}</strong></div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 outer-bottom-small m-t-20">
                                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Bình luận</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
				</div>
				<div class="col-xs-12 col-sm-3 col-md-3 sidebar">             
					<div class="sidebar-module-container">
						<div class="search-area outer-bottom-small">
                        <form>
                            <div class="control-group">
                            <input class="search-field" id="keyword" type="text" placeholder="Search" aria-label="Search">
                                <a href="#" class="search-button"></a>   
                            </div>
                        </form>
                    </div>		



	<!-- ============================================== CATEGORY : END ============================================== -->						<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                        <h3 class="section-title">Tab Widget</h3>
						<ul class="nav nav-tabs">
							<li class="active"><a href="#popular" data-toggle="tab">Xem nhiều</a></li>
							<li><a href="#recent" data-toggle="tab">Mới nhất </a></li>
						</ul>
						<div class="tab-content" style="padding-left:0">
							<div class="tab-pane active m-t-20" id="popular">
								@foreach($xemnhieu as $value)
								@php
									$img = App\Http\Controllers\HomeController::LayHinhDauTien($value->noidung); 
								@endphp
								<div class="blog-post inner-bottom-30 " >
									<img class="img-responsive" src="{{ $img }}" alt="">
									<h4><a href="blog-details.html">{{ $value->tieude}}</a></h4>
										<span class="review"> </span>
									<span class="date-time">{{ date_format($value->created_at, 'd-m-y h:i:s') }}</span>
									<p>{{ $value->tomtat}}</p>
								</div>
								@endforeach							
							</div>

							<div class="tab-pane m-t-20" id="recent">
								@foreach($moi as $value)
										@php
									$img = App\Http\Controllers\HomeController::LayHinhDauTien($value->noidung); 
								@endphp
								<div class="blog-post inner-bottom-30" >
									<img class="img-responsive" src="{{ $img }}" alt="">
									<h4><a href="blog-details.html">{{ $value->tieude}}</a></h4>
									<span class="review">6 Comments</span>
									<span class="date-time">{{ date_format($value->created_at, 'd-m-y h:i:s') }}</span>
									<p>{{ $value->tomtat}}</p>
									
								</div>
								@endforeach
							</div>
						</div>
					</div>
						<!-- ============================================== PRODUCT TAGS ============================================== -->
                        <div class="sidebar-widget product-tag wow fadeInUp">
						<h3 class="section-title">Chủ đề</h3>
						<div class="sidebar-widget-body outer-top-xs">
							<div class="tag-list">	
								@foreach($chude as $value)				
									<a class="item" title="Phone" href="{{route('frontend.baiviet_chude',['chude' => $value->tenchude_slug])}}">{{ $value->tenchude }}</a>
								@endforeach
							</div><!-- /.tag-list -->
						</div><!-- /.sidebar-widget-body -->
					</div><!-- /.sidebar-widget -->
<!-- ============================================== PRODUCT TAGS : END ============================================== -->					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- ============================================================= FOOTER ============================================================= -->
@endsection