@extends('layouts.frontend')
@section('content')
<div class="body-content outer-top-vs" id="top-banner-and-menu">
  <div class="container">
    <div class="row"> 
      <!-- ============================================== SIDEBAR ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 
        
        <!-- ================================== TOP NAVIGATION ================================== -->
        <div class="side-menu animate-dropdown outer-bottom-xs">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Danh mục sản phẩm</div>
          <nav class="yamm megamenu-horizontal">
            <ul class="nav">
              @foreach($danhmuc as $value)
              <li class="dropdown yamm mega-menu"> <a href="{{ route('frontend.sanpham',['danhmuc_slug' =>$value->tendanhmuc_slug]) }}" data-hover="dropdown" class="dropdown-toggle">{{$value->tendanhmuc}}</a>
                <ul class="dropdown-menu mega-menu">
                  <li class="yamm-content">
                    <div class="row">
                    @foreach($value->NhomSanPham as $nhom)
                      <div class="col-sm-12 col-md-3">
                        <h2 class="title">
                          <a href="{{route('frontend.sanpham.nhom',['danhmuc_slug' =>$value->tendanhmuc_slug,'nhomsanpham' => $nhom->tennhomsanpham_slug])}}">{{ $nhom->tennhomsanpham }} </a>       
                        </h2>
                        @foreach($nhom->LoaiSanPham as $loai)
                          <ul class="links list-unstyled">
                            <li><a href="{{route('frontend.sanpham.loai',['danhmuc_slug' =>$value->tendanhmuc_slug,'nhomsanpham' => $nhom->tennhomsanpham_slug,'loaisanpham' => $loai->tenloai_slug ])}}">{{$loai->tenloai}}</a></li>
                          </ul>
                        @endforeach
                      </div>
                    @endforeach
                      
                    </div>
                    <!-- /.row --> 
                  </li>
                  <!-- /.yamm-content -->
                </ul>
                <!-- /.dropdown-menu --> 
              </li>
              @endforeach
              <!-- /.menu-item -->
            </ul>
            <!-- /.nav --> 
          </nav>
          <!-- /.megamenu-horizontal --> 
        </div>
        <!-- /.side-menu --> 
        <!-- ================================== TOP NAVIGATION : END ================================== --> 
        
        <!-- ============================================== HOT DEALS ============================================== -->
        <div class="sidebar-widget hot-deals outer-bottom-xs">
          <h3 class="section-title">Ưu đãi lớn </h3>
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
                    <div class="sale-offer-tag"><span>{{$value->phantramgia}}%<br>
                      off</span></div>
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
                    <h3 class="name"><a href="{{ route('frontend.sanpham.chitiet',['tensanpham_slug' => $value->tensanpham_slug]) }}">{{ $value->tensanpham}}</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="product-price"> <span class="price"> {{ number_format($value->dongia - ($value->dongia * ($value->phantramgia/100))) }} VNĐ  </span> <span class="price-before-discount">@if(!empty($value->phantramgia)) {{ number_format($value->dongia)}} @endif</span> </div>
                    <!-- /.product-price --> 
                    
                  </div>
                  <!-- /.product-info -->
                  
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <div class="add-cart-button btn-group">
                        <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                        <button class="btn btn-primary cart-btn" type="button">Thêm vào giỏ hàng  </button>
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
      <!-- /.sidemenu-holder --> 
      <!-- ============================================== SIDEBAR : END ============================================== --> 
      
      <!-- ============================================== CONTENT ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder"> 
        <!-- ========================================== SECTION – HERO ========================================= -->    
        <div id="hero">
          <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
            @foreach($slides as $value)
              <div class="item" style="background-image: url({{ env('APP_URL') . '/storage/app/slides/images/' . $value->hinhanh }});"></div>
            @endforeach  
          </div>
          <!-- /.owl-carousel --> 
        </div>
        <!-- ========================================= SECTION – HERO : END ========================================= --> 
        <!-- ============================================== SCROLL TABS ============================================== -->
        @php 
          $collection = collect($sanpham);
          $items= $collection->groupBy('tendanhmuc');
          $items->toArray();
        @endphp
        @foreach($items as $sp => $product_list) 
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs">
          <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left">{{ $sp }}</h3> 
            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
              <li class="active"><a href="{{ route('frontend.sanpham',['danhmuc_slug' =>Str::slug($sp,'-')]) }}" >Tất cả</a></li>
            </ul>
            <!-- /.nav-tabs --> 
          </div>
          <div class="tab-content outer-top-xs">
            <div class="tab-pane in active" id="all">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                  @if(array_key_exists($sp, $items->toArray()))
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
                              $img2 = config('app.url') . '/'. $dir . $files[3];        
                            @endphp
                            <a href="{{ route('frontend.sanpham.chitiet',['tensanpham_slug' => $value->tensanpham_slug]) }}">
                              
                                <img src="{{ $img }}" alt=""> 
                                <img src="{{ $img2 }}" alt="" class="hover-image">
                            </a> 
                        </div>
                            <!-- /.image -->
                            @if($value->trangthaisanpham == 1)
                              <div class="tag new"><span>New</span></div>
                            @elseif($value->trangthaisanpham == 2)
                              <div class="tag sale"><span>Sale</span></div>
                            @elseif($value->trangthaisanpham == 3)
                              <div class="tag hot"><span>Hot</span></div>
                            @endif
                          </div>
                          <!-- /.product-image -->                      
                          <div class="product-info text-left">
                            <h3 class="name"><a href="{{ route('frontend.sanpham.chitiet',['tensanpham_slug' => $value->tensanpham_slug]) }}">{{ $value->tensanpham }}</a></h3>
                           
                              @if(array_key_exists($value->id, $stars->toArray()))
                                <div class="rating rateit-small">
                                  @if($value->sao <= 10)
                                      <i class="icon fa fa-star-half-o"></i>
                                      <i class="icon fa fal fa-star-o"></i>
                                      <i class="icon fa fal fa-star-o"></i>
                                      <i class="icon fa fal fa-star-o"></i>
                                      <i class="icon fa fal fa-star-o"></i>
                                  @elseif($value->sao > 10 && $value->sao<= 20)
                                      <i class="icon fa fa fa-star"></i>
                                      <i class="icon fa fal fa-star-o"></i>
                                      <i class="icon fa fal fa-star-o"></i>
                                      <i class="icon fa fal fa-star-o"></i>
                                      <i class="icon fa fal fa-star-o"></i>
                                  @elseif($value->sao > 20 && $value->sao <= 30)
                                      <i class="icon fa fa fa-star"></i>
                                      <i class="icon fa fa-star-half-o"></i>
                                      <i class="icon fa fal fa-star-o"></i>
                                      <i class="icon fa fal fa-star-o"></i>
                                      <i class="icon fa fal fa-star-o"></i>
                                  @elseif($value->sao > 30 && $value->sao <= 40)
                                      <i class="icon fa fa fa-star"></i>
                                      <i class="icon fa fa fa-star"></i>
                                      <i class="icon fa fal fa-star-o"></i>
                                      <i class="icon fa fal fa-star-o"></i>
                                      <i class="icon fa fal fa-star-o"></i>
                                  @elseif($value->sao > 40 && $value->sao <= 50)
                                      <i class="icon fa fa fa-star"></i>
                                      <i class="icon fa fa fa-star"></i>
                                      <i class="icon fa fa-star-half-o"></i>
                                      <i class="icon fa fal fa-star-o"></i>
                                      <i class="icon fa fal fa-star-o"></i>
                                  @elseif($value->sao > 50 && $value->sao <= 60)
                                      <i class="icon fa fa fa-star"></i>
                                      <i class="icon fa fa fa-star"></i>
                                      <i class="icon fa fa fa-star"></i>
                                      <i class="icon fa fal fa-star-o"></i>
                                      <i class="icon fa fal fa-star-o"></i>
                                  @elseif($value->sao > 60 && $value->sao <= 70)
                                      <i class="icon fa fa fa-star">f</i>
                                      <i class="icon fa fa fa-star"></i>
                                      <i class="icon fa fa fa-star"></i>
                                      <i class="icon fa fa-star-half-o"></i>
                                      <i class="icon fa fal fa-star"></i>
                                  @elseif($value->sao > 70 && $value->sao <= 80)
                                      <i class="icon fa fa fa-star">g</i>
                                      <i class="icon fa fa fa-star"></i>
                                      <i class="icon fa fa fa-star"></i>
                                      <i class="icon fa fa fa-star"></i>
                                      <i class="icon fa fal fa-star-o"></i>
                                  @elseif($value->sao > 80 && $value->sao <= 90)
                                      <i class="icon fa fa fa-star">h</i>
                                      <i class="icon fa fa fa-star"></i>
                                      <i class="icon fa fa fa-star"></i>
                                      <i class="icon fa fa fa-star"></i>
                                      <i class="icon fa fa-star-half-o"></i>
                                  @elseif($value->sao > 100)
                                      <i class="icon fa fa fa-star">da</i>
                                      <i class="icon fa fa fa-star"></i>
                                      <i class="icon fa fa fa-star"></i>
                                      <i class="icon fa fa fa-star"></i>
                                      <i class="icon fa fa fa-star"></i>
                                  @endif
                                </div>
                              @else
                                  <i class="icon fa fal fa-star-o"></i>
                                  <i class="icon fa fal fa-star-o"></i>
                                  <i class="icon fa fal fa-star-o"></i>
                                  <i class="icon fa fal fa-star-o"></i>
                                  <i class="icon fa fal fa-star-o"></i>
                              @endif      
                            <div class="description"></div>
                            <div class="product-price"> 
                              <span class="price">{{ number_format($value->dongia - ($value->dongia * ($value->phantramgia/100))) }} VNĐ </span> 
                              <span class="price-before-discount">@if(!empty($value->phantramgia)) {{ number_format($value->dongia)}} @endif</span> 
                            </div>
                            <!-- /.product-price -->      
                          </div>
                          <!-- /.product-info -->
                          <div class="cart clearfix animate-effect">
                            <div class="action">
                              <ul class="list-unstyled">
                                <li class="add-cart-button btn-group">
                                  <button class="btn btn-primary cart-btn" type="button">Thêm vào giỏ hàng  </button>
                                  <a class="btn btn-primary icon" href="{{ route('frontend.giohang.them', ['tensanpham_slug' => $value->tensanpham_slug]) }}"title="Giỏ hàng"><i class="fa fa-shopping-cart"></i></a>
                                </li>
                                @if(Auth::check())
                                <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="{{ route('khachhang.sanphamyeuthich.them', ['tensanpham_slug' => $value->tensanpham_slug]) }}" title="Yêu thích"> <i class="icon fa fa-heart"></i> </a> </li>
                                @endif
                                <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="So sánh"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                              </ul>
                            </div>
                            <!-- /.action --> 
                          </div>
                          <!-- /.cart --> 
                        </div>
                        <!-- /.product -->                       
                      </div>
                      <!-- /.products --> 
                    </div>
                  @endforeach  
                  @endif    
                </div>
                <!-- /.home-owl-carousel --> 
              </div>
              <!-- /.product-slider --> 
            </div>
            <!-- /.tab-pane -->  
          </div>
          <!-- /.tab-content --> 
        </div>
        @endforeach
        <!-- /.scroll-tabs --> 
        <!-- ============================================== SCROLL TABS : END ============================================== --> 
      </div>
      <!-- /.homebanner-holder --> 
      <!-- ============================================== CONTENT : END ============================================== --> 
    </div>
    <!-- /.row --> 
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
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    <div id="brands-carousel" class="logo-slider">
      <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
          @foreach($hangsanxuat as $value)
            <div class="item m-t-15"> <a href="{{route('frontend.hangsanxuat',['hangsanxuat' => $value->tenhangsanxuat_slug])}}" class="image"> 
              <img data-echo="{{ env('APP_URL') . '/storage/app/hangsanxuat/images/' . $value->hinhanh }}" src="{{ env('APP_URL') . '/storage/app/hangsanxuat/images/' . $value->hinhanh }}" alt=""> </a> 
            </div>
          @endforeach
        </div>
      </div>
    </div>
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> 
  </div>
  <!-- /.container --> 
</div>
@endsection