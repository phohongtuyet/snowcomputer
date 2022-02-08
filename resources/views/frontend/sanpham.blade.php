@extends('layouts.frontend')
@section('content')
<div class="breadcrumb">
  <div class="container">
    <div class="breadcrumb-inner">
      <ul class="list-inline list-unstyled">
        <li><a href="#">Home</a></li>
        @if(empty($tennhomsanpham))
          <li class='active'>{{$tendanhmuc}}</li>
        @elseif(empty($tenloaisanpham))
          <li class='active'>{{$tennhomsanpham}}</li>
        @else
          <li class=>{{$tennhomsanpham}}</li>
          <li class='active'>{{$tenloaisanpham}}</li>
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
                    <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-shopping-bag" aria-hidden="true"></i>{{ $value->tendanhmuc }}</a>
                    <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                        <div class="row">
                        @foreach($value->NhomSanPham as $nhom)
                        <div class="col-sm-12 col-md-3">
                            <h2 class="title">{{ $nhom->tennhomsanpham }}</h2>
                            @foreach($nhom->LoaiSanPham as $loai)
                            <ul class="links list-unstyled">
                                <li><a href="#">{{$loai->tenloai}}</a></li>
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
            <div class="sidebar-widget">
              <h3 class="section-title">Shop by</h3>
              <div class="widget-header">
                <h4 class="widget-title">Category</h4>
              </div>
              <div class="sidebar-widget-body">
                <div class="accordion">
                  <div class="accordion-group">
                    <div class="accordion-heading"> <a href="#collapseOne" data-toggle="collapse" class="accordion-toggle collapsed"> Camera </a> </div>
                    <!-- /.accordion-heading -->
                    <div class="accordion-body collapse" id="collapseOne" style="height: 0px;">
                      <div class="accordion-inner">
                        <ul>
                          <li><a href="#">gaming</a></li>
                          <li><a href="#">office</a></li>
                          <li><a href="#">kids</a></li>
                          <li><a href="#">for women</a></li>
                        </ul>
                      </div>
                      <!-- /.accordion-inner --> 
                    </div>
                    <!-- /.accordion-body --> 
                  </div>
                  <!-- /.accordion-group -->
                  
                  <div class="accordion-group">
                    <div class="accordion-heading"> <a href="#collapseTwo" data-toggle="collapse" class="accordion-toggle collapsed"> Desktops </a> </div>
                    <!-- /.accordion-heading -->
                    <div class="accordion-body collapse" id="collapseTwo" style="height: 0px;">
                      <div class="accordion-inner">
                        <ul>
                          <li><a href="#">gaming</a></li>
                          <li><a href="#">office</a></li>
                          <li><a href="#">kids</a></li>
                          <li><a href="#">for women</a></li>
                        </ul>
                      </div>
                      <!-- /.accordion-inner --> 
                    </div>
                    <!-- /.accordion-body --> 
                  </div>
                  <!-- /.accordion-group -->
                  
                  <div class="accordion-group">
                    <div class="accordion-heading"> <a href="#collapseThree" data-toggle="collapse" class="accordion-toggle collapsed"> Pants </a> </div>
                    <!-- /.accordion-heading -->
                    <div class="accordion-body collapse" id="collapseThree" style="height: 0px;">
                      <div class="accordion-inner">
                        <ul>
                          <li><a href="#">gaming</a></li>
                          <li><a href="#">office</a></li>
                          <li><a href="#">kids</a></li>
                          <li><a href="#">for women</a></li>
                        </ul>
                      </div>
                      <!-- /.accordion-inner --> 
                    </div>
                    <!-- /.accordion-body --> 
                  </div>
                  <!-- /.accordion-group -->
                  
                  <div class="accordion-group">
                    <div class="accordion-heading"> <a href="#collapseFour" data-toggle="collapse" class="accordion-toggle collapsed"> Bags </a> </div>
                    <!-- /.accordion-heading -->
                    <div class="accordion-body collapse" id="collapseFour" style="height: 0px;">
                      <div class="accordion-inner">
                        <ul>
                          <li><a href="#">gaming</a></li>
                          <li><a href="#">office</a></li>
                          <li><a href="#">kids</a></li>
                          <li><a href="#">for women</a></li>
                        </ul>
                      </div>
                      <!-- /.accordion-inner --> 
                    </div>
                    <!-- /.accordion-body --> 
                  </div>
                  <!-- /.accordion-group -->
                  
                  <div class="accordion-group">
                    <div class="accordion-heading"> <a href="#collapseFive" data-toggle="collapse" class="accordion-toggle collapsed"> Hats </a> </div>
                    <!-- /.accordion-heading -->
                    <div class="accordion-body collapse" id="collapseFive" style="height: 0px;">
                      <div class="accordion-inner">
                        <ul>
                          <li><a href="#">gaming</a></li>
                          <li><a href="#">office</a></li>
                          <li><a href="#">kids</a></li>
                          <li><a href="#">for women</a></li>
                        </ul>
                      </div>
                      <!-- /.accordion-inner --> 
                    </div>
                    <!-- /.accordion-body --> 
                  </div>
                  <!-- /.accordion-group -->
                  
                  <div class="accordion-group">
                    <div class="accordion-heading"> <a href="#collapseSix" data-toggle="collapse" class="accordion-toggle collapsed"> Accessories </a> </div>
                    <!-- /.accordion-heading -->
                    <div class="accordion-body collapse" id="collapseSix" style="height: 0px;">
                      <div class="accordion-inner">
                        <ul>
                          <li><a href="#">gaming</a></li>
                          <li><a href="#">office</a></li>
                          <li><a href="#">kids</a></li>
                          <li><a href="#">for women</a></li>
                        </ul>
                      </div>
                      <!-- /.accordion-inner --> 
                    </div>
                    <!-- /.accordion-body --> 
                  </div>
                  <!-- /.accordion-group --> 
                  
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
                <h4 class="widget-title">Price Slider</h4>
              </div>
              <div class="sidebar-widget-body m-t-10">
                <div class="price-range-holder"> <span class="min-max"> <span class="pull-left">$200.00</span> <span class="pull-right">$800.00</span> </span>
                  <input type="text" id="amount" style="border:0; color:#666666; font-weight:bold;text-align:center;">
                  <input type="text" class="price-slider" value="" >
                </div>
                <!-- /.price-range-holder --> 
                <a href="#" class="lnk btn btn-primary">Show Now</a> </div>
              <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 
            <!-- ============================================== PRICE SILDER : END ============================================== --> 
            <!-- ============================================== MANUFACTURES============================================== -->
            <div class="sidebar-widget">
              <div class="widget-header">
                <h4 class="widget-title">Manufactures</h4>
              </div>
              <div class="sidebar-widget-body">
                <ul class="list">
                  <li><a href="#">Forever 18</a></li>
                  <li><a href="#">Nike</a></li>
                  <li><a href="#">Dolce & Gabbana</a></li>
                  <li><a href="#">Alluare</a></li>
                  <li><a href="#">Chanel</a></li>
                  <li><a href="#">Other Brand</a></li>
                </ul>
                <!--<a href="#" class="lnk btn btn-primary">Show Now</a>--> 
              </div>
              <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 
            <!-- ============================================== MANUFACTURES: END ============================================== --> 
            <!-- ============================================== COLOR============================================== -->
            <div class="sidebar-widget">
              <div class="widget-header">
                <h4 class="widget-title">Colors</h4>
              </div>
              <div class="sidebar-widget-body">
                <ul class="list">
                  <li><a href="#">Red</a></li>
                  <li><a href="#">Blue</a></li>
                  <li><a href="#">Yellow</a></li>
                  <li><a href="#">Pink</a></li>
                  <li><a href="#">Brown</a></li>
                  <li><a href="#">Teal</a></li>
                </ul>
              </div>
              <!-- /.sidebar-widget-body --> 
            </div>
            <!-- /.sidebar-widget --> 
            <!-- ============================================== COLOR: END ============================================== --> 
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
                  <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
                  <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-bars"></i>List</a></li>
                </ul>
              </div>
              <!-- /.filter-tabs --> 
            </div>
            <!-- /.col -->
            <div class="col col-sm-12 col-md-5 col-lg-5 hidden-sm">
              <div class="col col-sm-6 col-md-6 no-padding">
                <div class="lbl-cnt"> <span class="lbl">Sắp xếp</span>
                  <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                      <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
                      <ul role="menu" class="dropdown-menu">
                        <li role="presentation"><a href="#">position</a></li>
                        <li role="presentation"><a href="#">Giá: Thấp nhất đầu tiên</a></li>
                        <li role="presentation"><a href="#">Giá: cao nhất trước tiên</a></li>
                        <li role="presentation"><a href="#">Tên sản phẩm: A đến Z</a></li>
                      </ul>
                    </div>
                  </div>
                  <!-- /.fld --> 
                </div>
                <!-- /.lbl-cnt --> 
              </div>
              <!-- /.col -->
              <div class="col col-sm-6 col-md-6 no-padding hidden-sm hidden-md">
                <div class="lbl-cnt"> <span class="lbl">Hiển thị</span>
                  <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                      <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 1 <span class="caret"></span> </button>
                      <ul role="menu" class="dropdown-menu">
                        <li role="presentation"><a href="#">1</a></li>
                        <li role="presentation"><a href="#">2</a></li>
                        <li role="presentation"><a href="#">3</a></li>
                        <li role="presentation"><a href="#">4</a></li>
                        <li role="presentation"><a href="#">5</a></li>
                        <li role="presentation"><a href="#">6</a></li>
                        <li role="presentation"><a href="#">7</a></li>
                        <li role="presentation"><a href="#">8</a></li>
                        <li role="presentation"><a href="#">9</a></li>
                        <li role="presentation"><a href="#">10</a></li>
                      </ul>
                    </div>
                  </div>
                  <!-- /.fld --> 
                </div>
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
                                    $img='';
                                    $dir = 'storage/app/' . $value->thumuc . '/images/';
                                    $files = scandir($dir); 
                                    $img = config('app.url') . '/'. $dir . $files[2];
                                    $img2 = config('app.url') . '/'. $dir . $files[3];        
                                @endphp
                                    <img src="{{$img}}" alt=""> 
                                    <img src="{{$img2}}" alt="" class="hover-image">
                                </a> 
                            </div>
                                <!-- /.image -->
                                
                                @if($value->trangthaisanpham == 1)
                                    <div class="tag new"><span>New</span></div>
                                @elseif($value->trangthaisanpham == 2)
                                    <div class="tag sale"><span>Sale</span></div>
                                @else
                                    <div class="tag hot"><span>Hot</span></div>
                                @endif
                                </div>
                                <!-- /.product-image -->
                                
                                <div class="product-info text-left">
                                <h3 class="name"><a href="{{ route('frontend.sanpham.chitiet',['tensanpham_slug' => $value->tensanpham_slug]) }}">{{ $value->tensanpham}}</a></h3>
                                <div class="rating rateit-small"></div>
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
                                    <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
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
                                                $img='';
                                                $dir = 'storage/app/' . $value->thumuc . '/images/';
                                                $files = scandir($dir); 
                                                $img = config('app.url') . '/'. $dir . $files[2];
                                            @endphp
                                            <img src="{{$img}}" alt=""> 
                                        </div>
                                    </div>
                                    <!-- /.product-image --> 
                                    </div>
                                    <!-- /.col -->
                                    <div class="col col-sm-9 col-lg-9">
                                    <div class="product-info">
                                        <h3 class="name"><a href="{{ route('frontend.sanpham.chitiet',['tensanpham_slug' => $value->tensanpham_slug]) }}">{{$value->tensanpham}}</a></h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="product-price"> <span class="price"> {{ number_format($value->dongia - ($value->dongia * ($value->phantramgia/100))) }} VNĐ </span> <span class="price-before-discount">@if(!empty($value->phantramgia)) {{ number_format($value->dongia)}} @endif</span> </div>
                                        <!-- /.product-price -->
                                        <div class="description m-t-10">Suspendisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget, lacinia id purus. Suspendisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget. Suspendisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget, lacinia id purus. Suspendisse posuere arcu diam, id accumsan eros pharetra.</div>
                                        <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                            <li class="add-cart-button btn-group">
                                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                            </li>
                                            <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
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
                                @else
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
      <!-- /.col --> 
    </div>
    <!-- /.row --> 
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    <div id="brands-carousel" class="logo-slider">
      <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
            @foreach($hangsanxuat as $value)
                <div class="item m-t-15"> <a href="#" class="image"> 
                <img data-echo="{{ env('APP_URL') . '/storage/app/hangsanxuat/images/' . $value->hinhanh }}" src="{{ env('APP_URL') . '/storage/app/hangsanxuat/images/' . $value->hinhanh }}" alt=""> </a> 
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
<!-- /.body-content --> 

@endsection