@extends('layouts.frontend')
@section('content')
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li style="width: 80px;"><a href="{{route('frontend')}}">Trang chủ</a></li>
				<li class='active'>Tin công nghệ</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="row">
			<div class="blog-page">
				@if($baiviet->count() > 0)
					<div class="col-xs-12 col-sm-9 col-md-9 rht-col">
						@foreach($baiviet as $value)
							@php
								$img = App\Http\Controllers\HomeController::LayHinhDauTien($value->noidung); 
							@endphp
							<div class="blog-post outer-top-bd  wow fadeInUp">
								<a href="{{ route('frontend.baiviet_chitiet',['tieude_slug' => $value->tieude_slug ]) }}"><img class="img-responsive" src="{{$img}}" alt=""></a>
								<h1><a href="{{ route('frontend.baiviet_chitiet',['tieude_slug' => $value->tieude_slug ]) }}">{{ $value->tieude}}</a></h1>
								<span class="author">{{ $value->User->name}}</span>
								<span class="eye"><i class="fa fa-eye"></i> {{$value->luotxem}} Lượt xem </span>
								<span class="date-time">{{ $value->created_at}}</span>
								<p>{{ $value->tomtat}}</p>
								<a href="{{ route('frontend.baiviet_chitiet',['tieude_slug' => $value->tieude_slug ]) }}" class="btn btn-upper btn-primary read-more">đọc thêm </a>
							</div>
						@endforeach
						<div class="clearfix blog-pagination filters-container  wow fadeInUp" style="padding:0px; background:none; box-shadow:none; margin-top:15px; border:none">					
							<div class="text-right">
								<div class="pagination-container">
									<ul class="list-inline list-unstyled">								
										{{ $baiviet->links() }}	
									</ul><!-- /.list-inline -->
								</div><!-- /.pagination-container -->    
							</div><!-- /.text-right -->

						</div><!-- /.filters-container -->				
					</div>
				@else
					<div class="col-xs-12 col-sm-9 col-md-9 rht-col">	
						<div class="blog-post outer-top-bd  wow fadeInUp">
							<h1>Hiện tại chưa có bài viết thuộc chủ đề <strong>{{$session_title}}. Chúng tôi xin lỗi về sự bất tiện này!!!</strong> </h1>
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
					<!-- ==============================================CATEGORY============================================== -->
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
								<h4><a href="{{ route('frontend.baiviet_chitiet',['tieude_slug' => $value->tieude_slug ]) }}"">{{ $value->tieude}}</a></h4>
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
								<a class="item" title="" href="{{route('frontend.baiviet_chude',['chude' => $value->tenchude_slug])}}">{{ $value->tenchude }}</a>
							@endforeach
						</div><!-- /.tag-list -->
					</div><!-- /.sidebar-widget-body -->
				</div><!-- /.sidebar-widget -->
					<!-- ============================================== PRODUCT TAGS : END ============================================== -->					
			</div>
		</div>
	</div>
</div>
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
				html = '<div class="row">';
                  html += '<div class="col-4 pl-0">';
                  html += '<span style="width=200px;word-break: break-all;">'+data.name+'</span>';
                  html += '</div>';
                  html += '</div>';
			return html;
      	}
    });

</script>
@endsection 