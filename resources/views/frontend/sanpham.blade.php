@extends('layouts.frontend')
@section('content')
<div class="breadcrumb">
  <div class="container">
    <div class="breadcrumb-inner">
      <ul class="list-inline list-unstyled">
        <li style="width: 80px;"><a href="{{route('frontend')}}">Trang chủ</a></li>
        @if(empty($tenhangsanxuat))
          @if(empty($tenloaisanpham) && empty($tennhomsanpham))
            <li class='active' ><a href="{{ route('frontend.sanpham',['danhmuc_slug' => Str::slug($sesion_title_menu) ]) }}">{{$sesion_title_menu}}</a></li>
          @elseif(!empty($tendanhmuc) && !empty($tennhomsanpham) && empty($tenloaisanpham))
            <li style="width: 168px;"><a href="{{ route('frontend.sanpham',['danhmuc_slug' => Str::slug($sesion_title_menu) ]) }}">{{$sesion_title_menu}}</a></li>
            <li class='active'>{{$tennhomsanpham}}</li>
          @else
            <li style="width: 168px;"><a href="{{ route('frontend.sanpham',['danhmuc_slug' => Str::slug($tendanhmuc) ]) }}">{{$tendanhmuc}}</a></li>
            <li style="width: 173px;"><a href="{{ route('frontend.sanpham.nhom',['danhmuc_slug' => Str::slug($tendanhmuc),'nhomsanpham' =>Str::slug($tennhomsanpham) ]) }}">{{$tennhomsanpham}}</a></li>
            <li class='active'>{{ $tenloaisanpham }}</li>
          @endif 
        @else
          <li class='active'><a href="{{ route('frontend.hangsanxuat',['hangsanxuat' => Str::slug($tenhangsanxuat) ]) }}">{{$tenhangsanxuat}}</a></li>
        @endif
      </ul>
    </div>
    <!-- /.breadcrumb-inner --> 
  </div>
  <!-- /.container --> 
</div>
<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
  <div class='container'>
    <div class='row'>
      <div class='col-xs-12 col-sm-12 col-md-3 sidebar'> 
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
        <div class="sidebar-module-container">
          <div class="sidebar-filter"> 
            <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
            <form action="{{route('frontend.locsanpham')}}" method="get" class="needs-validation" novalidate>
              <input type="text" name="catelogary" hidden value="{{Str::slug($sesion_title_menu)}}">
            <div class="sidebar-widget">
              <h3 class="section-title">Bộ lọc</h3>
              <div class="widget-header">
                <h4 class="widget-title">Danh mục</h4>
              </div>
              <div class="sidebar-widget-body">
                <div class="accordion">
                  @foreach($nhomsp as $value)
                    <div class="accordion-group">
                      <div class="accordion-heading"> 
                        <a href="#{{ $value->tennhomsanpham_slug}}" data-toggle="collapse" class="accordion-toggle collapsed">  {{$value->tennhomsanpham}} </a> 
                      </div>
                      <!-- /.accordion-heading -->
                      <div class="accordion-body collapse" id="{{ $value->tennhomsanpham_slug}}" style="height: 0px;">
                        <div class="accordion-inner">
                          <ul>
                            @foreach($value->LoaiSanPham as $loai)
                            <li>
                              <input type="checkbox" name="loai" value="{{$loai->tenloai_slug}}"> {{$loai->tenloai}} 
                            </li>
                            @endforeach
                          </ul>
                        </div>
                        <!-- /.accordion-inner --> 
                      </div>
                      <!-- /.accordion-body --> 
                    </div>
                  @endforeach
                </div>
                <!-- /.accordion --> 
              </div>

              <div class="widget-header">
                <h4 class="widget-title" class="accordion-toggle collapsed"> 
                  <a href="#thuonghieu" data-toggle="collapse">Thương hiệu</a> 
                </h4>
              </div>
              <div class="sidebar-widget-body">
                <div class="accordion">
                    <div class="accordion-group">
                      <div class="accordion-heading"> 
                      </div>
                      <!-- /.accordion-heading -->
                      <div class="accordion-body collapse" id="thuonghieu" style="height: 0px;">
                        <div class="accordion-inner">
                          <ul>
                            @foreach($hangsanxuat as $value)
                            <li>
                              <input type="checkbox" name="hangsanxuat" value="{{$value->tenhangsanxuat_slug}}">
                              <img src="{{ env('APP_URL') . '/storage/app/hangsanxuat/images/' . $value->hinhanh }}" alt="" style="width: 100px;">
                            </li>
                            @endforeach
                          </ul>
                        </div>
                        <!-- /.accordion-inner --> 
                      </div>
                      <!-- /.accordion-body --> 
                    </div>
                </div>
                <!-- /.accordion --> 
              </div>
              <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 
            <!-- ============================================== SIDEBAR CATEGORY : END ============================================== --> 
            
            <!-- ============================================== PRICE SILDER============================================== -->
            <div class="sidebar-widget">
              <div class="widget-header">
                <h4 class="widget-title">Giá </h4>
              </div>
              <div class="sidebar-widget-body m-t-10">
                <div class="price-range-holder"> 
               
                  
                  <div class="price-range-slider">
                    <p class="range-value">
                      <input type="text" name="pricefiller" id="amount" readonly>
                    </p>
                    <div id="slider-range" class="range-bar" data-min="0" data-max="100" data-step="5"></div>      
                  </div>

                </div>
                <!-- /.price-range-holder --> 
                <button class="lnk btn btn-primary btn-loc" type="submit">Hiển thị</button>

              </div>
              <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 
            <!-- ============================================== PRICE SILDER : END ============================================== --> 
            </form>
            <!-- ============================================== COMPARE============================================== -->
            <div class="sidebar-widget outer-top-vs">
              <h3 class="section-title">So sánh sản phẩm</h3>
              <div class="sidebar-widget-body">
                <div class="compare-report">
                  <p>You have no <span>item(s)</span> to compare</p>
                </div>
                <!-- /.compare-report --> 
              </div>
              <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 
            <!-- ============================================== COMPARE: END ============================================== --> 
            <!-- ============================================== PRODUCT TAGS ============================================== -->
           
          <!-- /.Testimonials -->
           
            
            <!-- ============================================== Testimonials: END ============================================== -->
            
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
          <!-- /.sidebar-filter --> 
        </div>
        <!-- /.sidebar-module-container --> 
      </div>
      <!-- /.sidebar -->
      @if(empty($sesion_title))
      <div class="col-xs-12 col-sm-12 col-md-9 rht-col"> 
        <!-- ========================================== SECTION – HERO ========================================= -->
        
        <div id="category" class="category-carousel hidden-xs">
          <div class="item">
            <div class="image"> <img src="{{ asset('public/frontend/images/banners/cat-banner-1.jpg')}}" alt="" class="img-responsive"> </div>
            <div class="container-fluid">
              <div class="caption vertical-top text-left">
                <div class="big-text"> Big Sale </div>
                <div class="excerpt hidden-sm hidden-md"> Save up to 49% off </div>
                <div class="excerpt-normal hidden-sm hidden-md"> Lorem ipsum dolor sit amet, consectetur adipiscing elit </div>
                <div class="buy-btn"><a href="#" class="lnk btn btn-primary">Show Now</a></div>
              </div>
              <!-- /.caption --> 
            </div>
            <!-- /.container-fluid --> 
          </div>
        </div>
        
     
        <div class="clearfix filters-container m-t-10">
          <div class="row">
            <div class="col col-sm-6 col-md-3 col-lg-3 col-xs-6">
              <div class="filter-tabs">
                <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                  <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Lưới</a> </li>
                  <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-bars"></i>Danh sách</a></li>
                </ul>
              </div>
              <!-- /.filter-tabs --> 
            </div>
            <!-- /.col -->
            <div class="col col-sm-12 col-md-5 col-lg-5 hidden-sm" style="width: 521px;">
              <div class="col col-sm-6 col-md-6 no-padding">
                @if(empty($sesion_fitler))
                  <div class="lbl-cnt"> <span class="lbl">Sắp xếp</span>
                    <div class="fld inline">
                      <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                        <button data-toggle="dropdown" type="button" class="btn dropdown-toggle sapxep"> Mặc định <span class="caret"></span> </button>
                        <ul role="menu" class="dropdown-menu menu-sapxep">
                          @if(empty($hsx_name))
                            @if(empty($tenloaisanpham) && empty($tennhomsanpham))
                              <li role="presentation"><a class="sapxep" href="{{ route('frontend.sanpham',['danhmuc_slug' => Str::slug($sesion_title_menu) ]) }}">Mặc định</a></li>
                              <li role="presentation"><a class="sapxep" href="{{ route('frontend.sanpham',['danhmuc_slug' => Str::slug($sesion_title_menu),'orderby' =>'priceUp' ]) }}">Giá: Thấp nhất đầu tiên</a></li>
                              <li role="presentation"><a class="sapxep" href="{{ route('frontend.sanpham',['danhmuc_slug' => Str::slug($sesion_title_menu),'orderby' =>'priceDown' ]) }}">Giá: Cao nhất trước tiên</a></li>
                              <li role="presentation"><a class="sapxep" href="{{ route('frontend.sanpham',['danhmuc_slug' => Str::slug($sesion_title_menu),'orderby' =>'name' ]) }}">Tên sản phẩm: A đến Z</a></li>
                            @elseif(!empty($tendanhmuc) && !empty($tennhomsanpham) && empty($tenloaisanpham))
                              <li role="presentation"><a class="sapxep" href="{{ route('frontend.sanpham.nhom',['danhmuc_slug' => Str::slug($sesion_title_menu),'nhomsanpham' => Str::slug($tennhomsanpham) ]) }}">Mặc định</a></li>
                              <li role="presentation"><a class="sapxep" href="{{ route('frontend.sanpham.nhom',['danhmuc_slug' => Str::slug($sesion_title_menu),'nhomsanpham' => Str::slug($tennhomsanpham),'orderby' =>'priceUp' ]) }}">Giá: Thấp nhất đầu tiên</a></li>
                              <li role="presentation"><a class="sapxep" href="{{ route('frontend.sanpham.nhom',['danhmuc_slug' => Str::slug($sesion_title_menu),'nhomsanpham' => Str::slug($tennhomsanpham),'orderby' =>'priceDown' ]) }}">Giá: Cao nhất trước tiên</a></li>
                              <li role="presentation"><a class="sapxep" href="{{ route('frontend.sanpham.nhom',['danhmuc_slug' => Str::slug($sesion_title_menu),'nhomsanpham' => Str::slug($tennhomsanpham),'orderby' =>'name' ]) }}">Tên sản phẩm: A đến Z</a></li>
                            @else
                              <li role="presentation"><a class="sapxep" href="{{ route('frontend.sanpham.loai',['danhmuc_slug' => Str::slug($tendanhmuc),'nhomsanpham' => Str::slug($tennhomsanpham),'loaisanpham' => Str::slug($tenloaisanpham)]) }}">Mặc định</a></li>
                              <li role="presentation"><a class="sapxep" href="{{ route('frontend.sanpham.loai',['danhmuc_slug' => Str::slug($tendanhmuc),'nhomsanpham' => Str::slug($tennhomsanpham),'loaisanpham' => Str::slug($tenloaisanpham),'orderby' =>'priceUp']) }}">Giá: Thấp nhất đầu tiên</a></li>
                              <li role="presentation"><a class="sapxep" href="{{ route('frontend.sanpham.loai',['danhmuc_slug' => Str::slug($tendanhmuc),'nhomsanpham' => Str::slug($tennhomsanpham),'loaisanpham' => Str::slug($tenloaisanpham),'orderby' =>'priceDown']) }}">Giá: Cao nhất trước tiên</a></li>
                              <li role="presentation"><a class="sapxep" href="{{ route('frontend.sanpham.loai',['danhmuc_slug' => Str::slug($tendanhmuc),'nhomsanpham' => Str::slug($tennhomsanpham),'loaisanpham' => Str::slug($tenloaisanpham),'orderby' =>'name' ]) }}">Tên sản phẩm: A đến Z</a></li>
                            @endif 
                          @else
                              <li role="presentation"><a class="sapxep" href="{{ route('frontend.hangsanxuat',['hangsanxuat' => Str::slug($hsx_name)]) }}">Mặc định</a></li>
                              <li role="presentation"><a class="sapxep" href="{{ route('frontend.hangsanxuat',['hangsanxuat' => Str::slug($hsx_name),'orderby' =>'priceUp']) }}">Giá: Thấp nhất đầu tiên</a></li>
                              <li role="presentation"><a class="sapxep" href="{{ route('frontend.hangsanxuat',['hangsanxuat' => Str::slug($hsx_name),'orderby' =>'priceDown']) }}">Giá: Cao nhất trướac tiên</a></li>
                              <li role="presentation"><a class="sapxep" href="{{ route('frontend.hangsanxuat',['hangsanxuat' => Str::slug($hsx_name),'orderby' =>'name' ]) }}">Tên sản phẩm: A đến Z</a></li>
                          @endif
                        </ul>
                      </div>
                    </div>
                    <!-- /.fld --> 
                  </div>
                @endif

                <!-- /.lbl-cnt --> 
              </div>
              <!-- /.col --> 
            </div>
            <!-- /.col -->
            <div class="col col-sm-6 col-md-4 col-xs-6 col-lg-4 text-right">
              <div class="pagination-container">
                <ul class="list-inline list-unstyled">
                    {{ $sanpham->links() }}
                </ul>
                <!-- /.list-inline --> 
              </div>
              <!-- /.pagination-container --> </div>
            <!-- /.col --> 
          </div>
          <!-- /.row --> 
        </div>
        <div class="search-result-container ">
          <div id="myTabContent" class="tab-content category-list">
            <div class="tab-pane active " id="grid-container">
              <div class="category-product">
                <div class="row">
                    @foreach($sanpham as $value)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="item">
                            <div class="products">
                            <div class="product">
                                <div class="product-image">
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
                                      $two_file = config('app.url') . '/'. $dir .'/'. $files[4];
                                  }
                                  else
                                  {
                                      $first_file = $no_image;
                                      $two_file = $no_image;
                                  }
                              }
                              else
                              {
                                  $first_file = $no_image;
                                  $two_file = $no_image;
                              }
                          }
                          else
                          {
                              $first_file = $no_image;
                              $two_file = $no_image;
                          }                 
                        @endphp
                                    <img src="{{$first_file}}" alt=""> 
                                    <img src="{{$two_file}}" alt="" class="hover-image">
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
                                <h3 class="name"><a href="{{ route('frontend.sanpham.chitiet',['tensanpham_slug' => $value->tensanpham_slug]) }}">{{ $value->tensanpham}}</a></h3>
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
                                <div class="product-price"> <span class="price"> {{ number_format($value->dongia - ($value->dongia * ($value->phantramgia/100))) }} VNĐ </span> <span class="price-before-discount">@if(!empty($value->phantramgia)) {{ number_format($value->dongia)}} @endif</span> </div>
                                <!-- /.product-price --> 
                                
                                </div>
                                <!-- /.product-info -->
                                <div class="cart clearfix animate-effect">
                                <div class="action">
                                    <ul class="list-unstyled">
                                    <li class="add-cart-button btn-group">
                                      <button class="btn btn-primary cart-btn" type="button">Thêm vào giỏ hàng  </button>
                                      <a class="btn btn-primary icon"href="{{ route('frontend.giohang.them', ['tensanpham_slug' => $value->tensanpham_slug]) }}"><i class="fa fa-shopping-cart"></i></a>
                                    </li>
                                    @if(Auth::check())
                                    <li class="lnk wishlist"> <a class="add-to-cart" href="{{ route('khachhang.sanphamyeuthich.them', ['tensanpham_slug' => $value->tensanpham_slug]) }}" title="Yêu thích"> <i class="icon fa fa-heart"></i> </a> </li>
                                    @endif
                                    <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
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
                    </div>
                    <!-- /.item -->
                  @endforeach
                  
                </div>
                <!-- /.row --> 
              </div>
              <!-- /.category-product --> 
              
            </div>
            <!-- /.tab-pane -->
            
            <div class="tab-pane "  id="list-container">
              <div class="category-product">
                @foreach($sanpham as $value)
                <div class="category-product-inner">
                    <div class="products">
                        <div class="product-list product">
                            <div class="row product-list-row">
                                <div class="col col-sm-3 col-lg-3">
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
                                          }
                                          else
                                          {
                                              $first_file = $no_image;
                                          }                 
                                        @endphp
                                            <img src="{{$first_file}}" alt=""> 
                                        </div>
                                    </div>
                                    <!-- /.product-image --> 
                                    </div>
                                    <!-- /.col -->
                                    <div class="col col-sm-9 col-lg-9">
                                    <div class="product-info">
                                        <h3 class="name"><a href="{{ route('frontend.sanpham.chitiet',['tensanpham_slug' => $value->tensanpham_slug]) }}">{{$value->tensanpham}}</a></h3>
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
                                        <div class="product-price"> <span class="price"> {{ number_format($value->dongia - ($value->dongia * ($value->phantramgia/100))) }} VNĐ </span> <span class="price-before-discount">@if(!empty($value->phantramgia)) {{ number_format($value->dongia)}} @endif</span> </div>
                                        <!-- /.product-price -->
                                        <div class="description m-t-10">
                                          {{$value->HangSanXuat->tenhangsanxuat}} <br>
                                          Bảo hành {{$value->baohanh}} <br>
                                        </div>
                                        <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                              <button class="btn btn-primary cart-btn" type="button">Thêm vào giỏ hàng  </button>
                                              <a class="btn btn-primary icon"href="{{ route('frontend.giohang.them', ['tensanpham_slug' => $value->tensanpham_slug]) }}"><i class="fa fa-shopping-cart"></i></a>
                                            </li>
                                            @if(Auth::check())
                                            <li class="lnk wishlist"> <a class="add-to-cart" href="{{ route('khachhang.sanphamyeuthich.them', ['tensanpham_slug' => $value->tensanpham_slug]) }}" title="Yêu thích"> <i class="icon fa fa-heart"></i> </a> </li>
                                            @endif
                                            <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action --> 
                                        </div>
                                        <!-- /.cart --> 
                                        
                                    </div>
                                    <!-- /.product-info --> 
                                    </div>
                                <!-- /.col --> 
                                </div>
                                <!-- /.product-list-row -->
                                @if($value->trangthaisanpham == 1)
                                  <div class="tag new"><span>New</span></div>
                                @elseif($value->trangthaisanpham == 2)
                                  <div class="tag sale"><span>Sale</span></div>
                                @elseif($value->trangthaisanpham == 3)
                                  <div class="tag hot"><span>Hot</span></div>
                                @endif                       
                            </div>
                        <!-- /.product-list --> 
                        </div>
                        <!-- /.products --> 
                    </div>
                    <!-- /.category-product-inner --> 
                    @endforeach 
                </div>
                <!-- /.category-product --> 
            </div>
            <!-- /.tab-pane #list-container --> 
        </div>
        <!-- /.tab-content -->
          <div class="clearfix filters-container bottom-row">
            <div class="text-right">
              <div class="pagination-container">
                <ul class="list-inline list-unstyled">
                    {{ $sanpham->links() }}
                </ul>
                <!-- /.list-inline --> 
              </div>
              <!-- /.pagination-container --> </div>
            <!-- /.text-right --> 
            
          </div>
          <!-- /.filters-container --> 
          
        </div>
        <!-- /.search-result-container --> 
        
      </div>
      @else
      <div class="col-xs-12 col-sm-12 col-md-9 rht-col"> 
        <div id="category" class="category-carousel hidden-xs">
          <div class="item">
            <div class="image">
              <div class="text" style="font-size: 35px;">
                {!!$sesion_title!!}
              </div>
            </div>
          </div>
        </div>         
      </div>
      @endif
    </div>
    <!-- /.row --> 
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    <div id="brands-carousel" class="logo-slider">
      <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
            @foreach($hangsanxuat as $value)
            <div class="item m-t-15"> <a href="{{route('frontend.hangsanxuat',['hangsanxuat' => $value->tenhangsanxuat_slug])}}" class="image"> 
                <img data-echo="{{ env('APP_URL') . '/storage/app/hangsanxuat/' . $value->hinhanh }}" src="{{ env('APP_URL') . '/storage/app/hangsanxuat/images/' . $value->hinhanh }}" alt=""> </a> 
                </div>
            @endforeach
        </div>
        <!-- /.owl-carousel #logo-slider --> 
      </div>
      <!-- /.logo-slider-inner --> 
      
    </div>
    <!-- /.logo-slider --> 
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> </div>
  <!-- /.container --> 
  
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
<!-- /.body-content --> 
<style>  
  .price-range-slider {
    width: 100%;
    float: left;
    padding: 10px 20px;
  }
  .price-range-slider .range-value {
    margin: 0;
  }
  .price-range-slider .range-value input {
    width: 100%;
    background: none;
    color: #000;
    font-size: 16px;
    font-weight: initial;
    box-shadow: none;
    border: none;
    margin: 0px 0 20px 0;
  }
  .price-range-slider .range-bar {
    border: none;
    background: #000;
    height: 3px;
    width: 96%;
    margin-left: 8px;
  }
  .price-range-slider .range-bar .ui-slider-range {
    background: #06b9c0;
  }
  .price-range-slider .range-bar .ui-slider-handle {
    border: none;
    border-radius: 25px;
    background: #fff;
    border: 2px solid #06b9c0;
    height: 17px;
    width: 17px;
    top: -0.52em;
    cursor: pointer;
  }
  .price-range-slider .range-bar .ui-slider-handle + span {
    background: #06b9c0;
  }
</style>
@endsection
@section('javascript')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script>
  const name = '<?php echo $name ;?>';
    $(".menu-sapxep li a").ready(function(){ 
      $(".sapxep.btn:first-child").text(name);
      $(".sapxep.btn:first-child").val($(this).text());
    });  

  let giacao = '<?php echo $spgiacao->dongia ;?>';
  $(function() {
	$( "#slider-range" ).slider({
	  range: true,
	  min: 0,
	  max: parseInt(giacao),
	  values: [ 0,  parseInt(giacao)],
	  slide: function( event, ui ) {
		$( "#amount" ).val( ui.values[ 0 ] + "-" + ui.values[ 1 ] );
	  }
	});
	$( "#amount" ).val( $( "#slider-range" ).slider( "values", 0 ) +"-" + $( "#slider-range" ).slider( "values", 1 ) );
});

</script>
@endsection
