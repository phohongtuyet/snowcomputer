@extends('layouts.frontend')
@section('content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{route('frontend')}}">Home</a></li>
                <li style="width: 102px;"><a href="{{route('frontend.baiviet')}}" >Tin công nghệ</a></li>
                @if(!empty($baiviet))
				    <li class='active'>{{ $baiviet->tieude}}</li>
                @else
                    <li class='active'>Tìm kiếm</li>
                @endif
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="row">
			<div class="blog-page">
                @if(!empty($baiviet))
                    <div class="col-xs-12 col-sm-9 col-md-9 rht-col">
                        <div class="blog-post wow fadeInUp">
                            <h1>{{ $baiviet->tieude }}</h1>
                            <span class="author">{{ $baiviet->User->name }}</span>
                            <span class="eye"><i class="fa fa-eye"></i> {{$baiviet->luotxem}}</span>
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
                                    <img src="{{asset('public/frontend/images/avatar.png')}}" alt="Responsive image" class="img-circle img-responsive">
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
                                    <h3 class="title-review-comments">{{$dembinhluan->count()}} bình luận</h3>
                                </div>
                                @foreach($binhluan as $value)
                                    <div id="blog-comments" class="col-md-10 col-sm-10 blog-comments outer-bottom-xs">
                                        <div class="blog-comments inner-bottom-xs">
                                            <h4>{{ $value->User->name }}</h4>
                                            <span class="review-action pull-right">
                                                {{date_format($value->created_at, 'd/m/Y H:i:s')  }} 
                                            </span>
                                            <p>{{ $value->noidung }}</p>
                                        </div>

                                    </div>
                                @endforeach
                                <div class="post-load-more col-md-12">
                                    <a class="btn btn-upper btn-primary load-more" >Xem thêm </a>
                                    <input type="hidden" id="row" value="0">
                                    <input type="hidden" id="all" value="{{$binhluan->count()}}">
                                </div>
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
                                        @if(!Auth::check())
                                        <div class="col-md-12 outer-bottom-small m-t-20">
                                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Bình luận</button>
                                        </div>
                                        @else
                                            <div class="col-md-12 outer-bottom-small m-t-20">
                                                <a class="btn-upper btn btn-primary checkout-page-button" href="{{ route('khachhang.dangnhap')}}">Đăng nhập để bình luận  </a>                                            
                                            </div> 
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-xs-12 col-sm-9 col-md-9 rht-col">	
						<div class="blog-post outer-top-bd  wow fadeInUp">
							<h1>Không tìm thấy bài viết <strong>{{$session_title}}. !!!</strong> </h1>
						</div>
						</div><!-- /.filters-container -->				
					</div>
                @endif
				<div class="col-xs-12 col-sm-3 col-md-3 sidebar">             
					<div class="sidebar-module-container">
						<div class="search-area outer-bottom-small">
                        <form autocomplete="off" id="search" method="get" action ="{{route('frontend.timkiembaiviet')}}">
							<div class="control-group">
								<input type="text" class="search"   name="search"  placeholder="--Tìm kiếm--">
								<a href="{{route('frontend.timkiembaiviet')}}" class="search-button" onclick="event.preventDefault();document.getElementById('search').submit();"></a>
							</div>
						</form>
                    </div>		



	<!-- ============================================== CATEGORY : END ============================================== -->						
                    <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
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
									<h4><a href="{{ route('frontend.baiviet_chitiet',['tieude_slug' => $value->tieude_slug ]) }}">{{ $value->tieude}}</a></h4>
                                    <span class="eye"><i class="fa fa-eye"></i> {{$value->luotxem}}</span>
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
									<h4><a href="{{ route('frontend.baiviet_chitiet',['tieude_slug' => $value->tieude_slug ]) }}">{{ $value->tieude}}</a></h4>
                                    <span class="eye"><i class="fa fa-eye"></i> {{$value->luotxem}}</span>
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
<style>
    .typeahead { border: 1px solid #999; background: #FFF; overflow: auto; width: 250px; }
    .typeahead{ padding: 2px 5px; white-space: nowrap; overflow: hidden; }
	.tieude_ {
		word-break: break-all;
	}
</style>
@endsection
@section('javascript')
<script type="text/javascript">                      
    var path = "{{ route('frontend.selectSearchbaiviet') }}";
    $('input.search').typeahead({
		source:  function (query, process) {
			return $.get(path, { query: query }, function (data) {
				return process(data);
			});
		},
		highlighter: function (item, data) {
            var parts = item.split('#'),
                html = '<span class="tieude_">'+data.name+'</span>';
			return html;
      	}
    });
    $(document).ready(function(){
        $('.load-more').click(function(){
            var row = Number($('#row').val());
            var allcount = Number($('#all').val());
            var rowperpage = 3;
            row = row + rowperpage;
            if(row <= allcount){
                $("#row").val(row);
                $.ajax({
                    url: '{{ route("frontend.binhluan_load") }}',
                    type: 'get',
                    data: {row:row},
                    beforeSend:function(){
                        $(".load-more").text("Đang tải...");
                    },
                    success: function(response){
                        setTimeout(function() {
                            $("#blog-comments:last").after(response).show().fadeIn("slow");
                            var rowno = row + rowperpage;
                            if(rowno > allcount){
                                $('.load-more').text("Ẩn");
                            }else{
                                $(".load-more").text("Xem thêm");
                            }
                        }, 2000);
                    }
                });
            }else{
                $('.load-more').text("Đang tải...");
                setTimeout(function() {
                    $('#blog-comments:nth-child(3)').nextAll('#blog-comments').remove();
                    $("#row").val(0);
                    $('.load-more').text("Xem thêm");                    
                }, 2000);
            }
        });
    });
</script>
@endsection 