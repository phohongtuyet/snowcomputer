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
                          $no_image = env('APP_URL')."/public/frontend/images/noimage.png";
                          $extensions = array('jpg', 'jpeg', 'png', 'gif', 'bmp');
                          $dir = 'storage/app/' . $value->thumuc;
                          if(file_exists($dir))
                          {
                              $files = scandir($dir);
                              if(isset($files[3]))
                              {
                                  $extension2 = strtolower(pathinfo($files[3], PATHINFO_EXTENSION));
                                  if(in_array($extension2, $extensions))
                                  {
                                      $first_file = config('app.url') . '/'. $dir .'/'. $files[3];
                                  }
                                  else
                                  {
                                      $first_file = $no_image;
                                  }
                              }
                              else
                              {
                                  $first_file = $no_image;
                              }
                              if(isset($files[4]))
                              {
                                  $extension2 = strtolower(pathinfo($files[4], PATHINFO_EXTENSION));
                                  if(in_array($extension2, $extensions))
                                  {
                                      $two_file = config('app.url') . '/'. $dir .'/'. $files[4];
                                  }
                                  else
                                  {
                                      $two_file = $no_image;
                                  }
                              }
                              else
                              {
                                  $two_file = $no_image;
                              }
                          }
                          else
                          {
                              $two_file = $no_image;
                          }                 
                        @endphp
                        <img src="{{ $first_file }}" alt=""> 
                        <img src="{{ $two_file }}" alt="" class="hover-image">
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
                        <a class="btn btn-primary cart-btn" href="{{ route('frontend.giohang.them', ['tensanpham_slug' => $value->tensanpham_slug]) }}"title="Giỏ hàng"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</a>

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
              <div class="item" style="background-image: url({{ env('APP_URL') . '/storage/app/slides/' . $value->hinhanh }});"></div>
            @endforeach  
          </div>
          <!-- /.owl-carousel --> 
        </div>
        <!-- ========================================= SECTION – HERO : END ========================================= --> 
        <!-- ============================================== SCROLL TABS ============================================== -->
        @php 
          $arr = array();
        @endphp

        @foreach($items as $sp => $product_list)
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs">
          <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left">{{ $sp }}</h3> 
            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
              <li class="active"><a href="{{ route('frontend.sanpham',['danhmuc_slug' =>Str::slug($sp,'-')]) }}" >Tất cả</a></li>
              @foreach($product_list as $value)
                @if(in_array($value->tennhomsanpham, $arr) == false)<!-- check sự tồn tại biến trong mảng, nếu false không tồn tại thì tạo tag ngược lại không tạo --> 
                  @php array_push($arr,$value->tennhomsanpham); @endphp<!-- thêm phần từ vào mảng --> 
                  <li>
                    <a data-transition-type="backSlide" href="#{{Str::slug($value->tennhomsanpham,'-')}}" data-toggle="tab">{{$value->tennhomsanpham}}  </a>
                  </li>
                @endif
              @endforeach
            </ul>
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
                              $no_image = env('APP_URL')."/public/frontend/images/noimage.png";
                              $extensions = array('jpg', 'jpeg', 'png', 'gif', 'bmp');
                              $dir = 'storage/app/' . $value->thumuc;
                              if(file_exists($dir))
                              {
                                  $files = scandir($dir);
                                  if(isset($files[3]))
                                  {
                                      $extension2 = strtolower(pathinfo($files[3], PATHINFO_EXTENSION));
                                      if(in_array($extension2, $extensions))
                                      {
                                          $first_file = config('app.url') . '/'. $dir .'/'. $files[3];
                                      }
                                      else
                                      {
                                          $first_file = $no_image;
                                      }
                                  }
                                  else
                                  {
                                      $first_file = $no_image;
                                  }
                                  if(isset($files[4]))
                                  {
                                      $extension2 = strtolower(pathinfo($files[4], PATHINFO_EXTENSION));
                                      if(in_array($extension2, $extensions))
                                      {
                                          $two_file = config('app.url') . '/'. $dir .'/'. $files[4];
                                      }
                                      else
                                      {
                                          $two_file = $no_image;
                                      }
                                  }
                                  else
                                  {
                                      $two_file = $no_image;
                                  }
                              }
                              else
                              {
                                  $two_file = $no_image;
                              }                 
                            @endphp
                            <a href="{{ route('frontend.sanpham.chitiet',['tensanpham_slug' => $value->tensanpham_slug]) }}">
                              
                                <img src="{{ $first_file }}" alt=""> 
                                <img src="{{ $two_file }}" alt="" class="hover-image">
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
                            <div class="rating rateit-small">
                            @if(array_key_exists($value->tensanpham, $stars->toArray())) 
                                @foreach($stars as $aaa => $list_sao)
                                  @foreach($list_sao as $aa )           
                                      @if($aa['sao'] <= 10)
                                          <i class="icon fa fa-star-half-o"></i>
                                          <i class="icon fa fal fa-star-o"></i>
                                          <i class="icon fa fal fa-star-o"></i>
                                          <i class="icon fa fal fa-star-o"></i>
                                          <i class="icon fa fal fa-star-o"></i>
                                      @elseif($aa['sao'] > 10 && $aa['sao']<= 20)
                                          <i class="icon fa fa fa-star"></i>
                                          <i class="icon fa fal fa-star-o"></i>
                                          <i class="icon fa fal fa-star-o"></i>
                                          <i class="icon fa fal fa-star-o"></i>
                                          <i class="icon fa fal fa-star-o"></i>
                                      @elseif($aa['sao'] > 20 && $aa['sao'] <= 30)
                                          <i class="icon fa fa fa-star"></i>
                                          <i class="icon fa fa-star-half-o"></i>
                                          <i class="icon fa fal fa-star-o"></i>
                                          <i class="icon fa fal fa-star-o"></i>
                                          <i class="icon fa fal fa-star-o"></i>
                                      @elseif($aa['sao'] > 30 && $aa['sao'] <= 40)
                                          <i class="icon fa fa fa-star"></i>
                                          <i class="icon fa fa fa-star"></i>
                                          <i class="icon fa fal fa-star-o"></i>
                                          <i class="icon fa fal fa-star-o"></i>
                                          <i class="icon fa fal fa-star-o"></i>
                                      @elseif($aa['sao'] > 40 && $aa['sao'] <= 50)
                                          <i class="icon fa fa fa-star"></i>
                                          <i class="icon fa fa fa-star"></i>
                                          <i class="icon fa fa-star-half-o"></i>
                                          <i class="icon fa fal fa-star-o"></i>
                                          <i class="icon fa fal fa-star-o"></i>
                                      @elseif($aa['sao'] > 50 && $aa['sao'] <= 60)
                                          <i class="icon fa fa fa-star"></i>
                                          <i class="icon fa fa fa-star"></i>
                                          <i class="icon fa fa fa-star"></i>
                                          <i class="icon fa fal fa-star-o"></i>
                                          <i class="icon fa fal fa-star-o"></i>
                                      @elseif($aa['sao'] > 60 && $aa['sao'] <= 70)
                                          <i class="icon fa fa fa-star">f</i>
                                          <i class="icon fa fa fa-star"></i>
                                          <i class="icon fa fa fa-star"></i>
                                          <i class="icon fa fa-star-half-o"></i>
                                          <i class="icon fa fal fa-star"></i>
                                      @elseif($aa['sao'] > 70 && $aa['sao'] <= 80)
                                          <i class="icon fa fa fa-star">g</i>
                                          <i class="icon fa fa fa-star"></i>
                                          <i class="icon fa fa fa-star"></i>
                                          <i class="icon fa fa fa-star"></i>
                                          <i class="icon fa fal fa-star-o"></i>
                                      @elseif($aa['sao'] > 80 && $aa['sao'] <= 90)
                                          <i class="icon fa fa fa-star">h</i>
                                          <i class="icon fa fa fa-star"></i>
                                          <i class="icon fa fa fa-star"></i>
                                          <i class="icon fa fa fa-star"></i>
                                          <i class="icon fa fa-star-half-o"></i>
                                      @elseif($aa > 100)
                                          <i class="icon fa fa fa-star">da</i>
                                          <i class="icon fa fa fa-star"></i>
                                          <i class="icon fa fa fa-star"></i>
                                          <i class="icon fa fa fa-star"></i>
                                          <i class="icon fa fa fa-star"></i>
                                      @endif 
                                  @endforeach      
                                @endforeach    
                              @else
                                  <i class="icon fa fal fa-star-o"></i>
                                  <i class="icon fa fal fa-star-o"></i>
                                  <i class="icon fa fal fa-star-o"></i>
                                  <i class="icon fa fal fa-star-o"></i>
                                  <i class="icon fa fal fa-star-o"></i>
                              @endif                                    
                            </div>                         

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
                                <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="" title="So sánh"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
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

            <!-- nhom san pham theo tag --> 
            @foreach($arr as $value)
            <div class="tab-pane" id="{{Str::slug($value,'-')}}">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                  @foreach($item as $nsp => $pd_list) 
                    @foreach($pd_list as $valuetag)
                      @if(strcmp($valuetag->tennhomsanpham, $value) == 0)<!-- kiểm tra nhóm sản phẩm có cùng tag không để đổ sản phẩm đúng nhóm-->
                        <div class="item item-carousel">
                          <div class="products">
                            <div class="product">
                              <div class="product-image">
                                <div class="image"> 
                                @php 
                                  $no_image = env('APP_URL')."/public/frontend/images/noimage.png";
                                  $extensions = array('jpg', 'jpeg', 'png', 'gif', 'bmp');
                                  $dir = 'storage/app/' . $valuetag->thumuc;
                                  if(file_exists($dir))
                                  {
                                      $files = scandir($dir);
                                      if(isset($files[3]))
                                      {
                                          $extension2 = strtolower(pathinfo($files[3], PATHINFO_EXTENSION));
                                          if(in_array($extension2, $extensions))
                                          {
                                              $first_file = config('app.url') . '/'. $dir .'/'. $files[3];
                                          }
                                          else
                                          {
                                              $first_file = $no_image;
                                          }
                                      }
                                      else
                                      {
                                          $first_file = $no_image;
                                      }
                                      if(isset($files[4]))
                                      {
                                          $extension2 = strtolower(pathinfo($files[4], PATHINFO_EXTENSION));
                                          if(in_array($extension2, $extensions))
                                          {
                                              $two_file = config('app.url') . '/'. $dir .'/'. $files[4];
                                          }
                                          else
                                          {
                                              $two_file = $no_image;
                                          }
                                      }
                                      else
                                      {
                                          $two_file = $no_image;
                                      }
                                  }
                                  else
                                  {
                                      $two_file = $no_image;
                                  }                 
                                @endphp
                                  <a href="{{ route('frontend.sanpham.chitiet',['tensanpham_slug' => $valuetag->tensanpham_slug]) }}">
                                      <img src="{{ $first_file }}" alt=""> 
                                      <img src="{{ $two_file }}" alt="" class="hover-image">
                                  </a> 
                              </div>
                                <!-- /.image -->
                                @if($valuetag->trangthaisanpham == 1)
                                  <div class="tag new"><span>New</span></div>
                                @elseif($valuetag->trangthaisanpham == 2)
                                  <div class="tag sale"><span>Sale</span></div>
                                @elseif($valuetag->trangthaisanpham == 3)
                                  <div class="tag hot"><span>Hot</span></div>
                                @endif
                              </div>
                              <!-- /.product-image -->                      
                              <div class="product-info text-left">
                                <h3 class="name"><a href="{{ route('frontend.sanpham.chitiet',['tensanpham_slug' => $valuetag->tensanpham_slug]) }}">{{ $valuetag->tensanpham }}</a></h3>
                                <div class="rating rateit-small">
                                  @if(array_key_exists($valuetag->tensanpham, $stars->toArray())) 
                                    @foreach($stars as $aaa => $list_sao)
                                      @foreach($list_sao as $aa )           
                                          @if($aa['sao'] <= 10)
                                              <i class="icon fa fa-star-half-o"></i>
                                              <i class="icon fa fal fa-star-o"></i>
                                              <i class="icon fa fal fa-star-o"></i>
                                              <i class="icon fa fal fa-star-o"></i>
                                              <i class="icon fa fal fa-star-o"></i>
                                          @elseif($aa['sao'] > 10 && $aa['sao']<= 20)
                                              <i class="icon fa fa fa-star"></i>
                                              <i class="icon fa fal fa-star-o"></i>
                                              <i class="icon fa fal fa-star-o"></i>
                                              <i class="icon fa fal fa-star-o"></i>
                                              <i class="icon fa fal fa-star-o"></i>
                                          @elseif($aa['sao'] > 20 && $aa['sao'] <= 30)
                                              <i class="icon fa fa fa-star"></i>
                                              <i class="icon fa fa-star-half-o"></i>
                                              <i class="icon fa fal fa-star-o"></i>
                                              <i class="icon fa fal fa-star-o"></i>
                                              <i class="icon fa fal fa-star-o"></i>
                                          @elseif($aa['sao'] > 30 && $aa['sao'] <= 40)
                                              <i class="icon fa fa fa-star"></i>
                                              <i class="icon fa fa fa-star"></i>
                                              <i class="icon fa fal fa-star-o"></i>
                                              <i class="icon fa fal fa-star-o"></i>
                                              <i class="icon fa fal fa-star-o"></i>
                                          @elseif($aa['sao'] > 40 && $aa['sao'] <= 50)
                                              <i class="icon fa fa fa-star"></i>
                                              <i class="icon fa fa fa-star"></i>
                                              <i class="icon fa fa-star-half-o"></i>
                                              <i class="icon fa fal fa-star-o"></i>
                                              <i class="icon fa fal fa-star-o"></i>
                                          @elseif($aa['sao'] > 50 && $aa['sao'] <= 60)
                                              <i class="icon fa fa fa-star"></i>
                                              <i class="icon fa fa fa-star"></i>
                                              <i class="icon fa fa fa-star"></i>
                                              <i class="icon fa fal fa-star-o"></i>
                                              <i class="icon fa fal fa-star-o"></i>
                                          @elseif($aa['sao'] > 60 && $aa['sao'] <= 70)
                                              <i class="icon fa fa fa-star">f</i>
                                              <i class="icon fa fa fa-star"></i>
                                              <i class="icon fa fa fa-star"></i>
                                              <i class="icon fa fa-star-half-o"></i>
                                              <i class="icon fa fal fa-star"></i>
                                          @elseif($aa['sao'] > 70 && $aa['sao'] <= 80)
                                              <i class="icon fa fa fa-star">g</i>
                                              <i class="icon fa fa fa-star"></i>
                                              <i class="icon fa fa fa-star"></i>
                                              <i class="icon fa fa fa-star"></i>
                                              <i class="icon fa fal fa-star-o"></i>
                                          @elseif($aa['sao'] > 80 && $aa['sao'] <= 90)
                                              <i class="icon fa fa fa-star">h</i>
                                              <i class="icon fa fa fa-star"></i>
                                              <i class="icon fa fa fa-star"></i>
                                              <i class="icon fa fa fa-star"></i>
                                              <i class="icon fa fa-star-half-o"></i>
                                          @elseif($aa > 100)
                                              <i class="icon fa fa fa-star">da</i>
                                              <i class="icon fa fa fa-star"></i>
                                              <i class="icon fa fa fa-star"></i>
                                              <i class="icon fa fa fa-star"></i>
                                              <i class="icon fa fa fa-star"></i>
                                          @endif 
                                      @endforeach      
                                    @endforeach    
                                  @else
                                      <i class="icon fa fal fa-star-o"></i>
                                      <i class="icon fa fal fa-star-o"></i>
                                      <i class="icon fa fal fa-star-o"></i>
                                      <i class="icon fa fal fa-star-o"></i>
                                      <i class="icon fa fal fa-star-o"></i>
                                  @endif                                    
                                </div>       
                                <div class="description"></div>
                                <div class="product-price"> 
                                  <span class="price">{{ number_format($valuetag->dongia - ($valuetag->dongia * ($valuetag->phantramgia/100))) }} VNĐ </span> 
                                  <span class="price-before-discount">@if(!empty($valuetag->phantramgia)) {{ number_format($valuetag->dongia)}} @endif</span> 
                                </div>
                                <!-- /.product-price -->      
                              </div>
                              <!-- /.product-info -->
                              <div class="cart clearfix animate-effect">
                                <div class="action">
                                  <ul class="list-unstyled">
                                    <li class="add-cart-button btn-group">
                                      <button class="btn btn-primary cart-btn" type="button">Thêm vào giỏ hàng  </button>
                                      <a class="btn btn-primary icon" href="{{ route('frontend.giohang.them', ['tensanpham_slug' => $valuetag->tensanpham_slug]) }}"title="Giỏ hàng"><i class="fa fa-shopping-cart"></i></a>
                                    </li>
                                    @if(Auth::check())
                                    <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="{{ route('khachhang.sanphamyeuthich.them', ['tensanpham_slug' => $valuetag->tensanpham_slug]) }}" title="Yêu thích"> <i class="icon fa fa-heart"></i> </a> </li>
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
                      @endif   
                    @endforeach 
                  @endforeach
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        @endforeach
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
              <img data-echo="{{ env('APP_URL') . '/storage/app/hangsanxuat/' . $value->hinhanh }}" src="{{ env('APP_URL') . '/storage/app/hangsanxuat/' . $value->hinhanh }}" alt=""> </a> 
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