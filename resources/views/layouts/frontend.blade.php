<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Meta -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="keywords" content="MediaCenter, Template, eCommerce">
  <meta name="robots" content="all">
  <title>Snow Computer</title>
  <link rel="shortcut icon" href="{{ asset('public/frontend/images/icon.png')}}">
  <link rel="stylesheet" href="{{ asset('public/frontend/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('public/frontend/css/main.css')}}">
  <link rel="stylesheet" href="{{ asset('public/frontend/css/blue.css')}}">
  <link rel="stylesheet" href="{{ asset('public/frontend/css/owl.carousel.css')}}">
  <link rel="stylesheet" href="{{ asset('public/frontend/css/owl.transitions.css')}}">
  <link rel="stylesheet" href="{{ asset('public/frontend/css/animate.min.css')}}">
  <link rel="stylesheet" href="{{ asset('public/frontend/css/rateit.css')}}">
  <link rel="stylesheet" href="{{ asset('public/frontend/css/bootstrap-select.min.css')}}">
  <link rel="stylesheet" href="{{ asset('public/frontend/css/font-awesome.css')}}">
  <link rel="stylesheet" href="{{ asset('public/frontend/css/thongbao.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Barlow:200,300,300i,400,400i,500,500i,600,700,800" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1"> 
  
  <!-- ============================================== TOP MENU ============================================== -->
  <div class="top-bar animate-dropdown">
    <div class="container">
      <div class="header-top-inner">
        <div class="cnt-account">
          <ul class="list-unstyled">
            
            <li class="header_cart hidden-xs"><a href="{{route('frontend.giohang')}}"><span>Giỏ hàng của tôi</span></a></li>
            <li class="check"><a href="#"><span>Thủ tục thanh toán</span></a></li>
            @if(!Auth::check())
              <li class="login"><a href="{{route('khachhang.dangnhap')}}"><span>Đăng nhập</span></a></li>
            @else
              <li class="wishlist"><a href="{{route('khachhang.sanphamyeuthich')}}"><span>Danh sách yêu thích</span></a></li>
              <li class="myaccount"><a href="{{route('khachhang')}}"><span>Tài khoản của tôi</span></a></li>
            @endif
          </ul>
        </div>
        <!-- /.cnt-account -->
        
        <div class="cnt-block">
          <ul class="list-unstyled list-inline">
            <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">VNĐ </span><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">USD</a></li>
                <li><a href="#">INR</a></li>
                <li><a href="#">GBP</a></li>
              </ul>
            </li>
            <li class="dropdown dropdown-small lang"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">Tiếng Việt </span><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">English</a></li>
                <li><a href="#">French</a></li>
                <li><a href="#">German</a></li>
              </ul>
            </li>
          </ul>
          <!-- /.list-unstyled --> 
        </div>
        <!-- /.cnt-cart -->
        <div class="clearfix"></div>
      </div>
      <!-- /.header-top-inner --> 
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.header-top --> 
  <!-- ============================================== TOP MENU : END ============================================== -->
  <div class="main-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 
          <!-- ============================================================= LOGO ============================================================= -->
          <div class="logo"> <a href="{{ route('frontend')}}"> <img src="{{ asset('public/frontend/images/SnowComputer.png')}}" alt="logo"> </a> </div>
          <!-- /.logo --> 
          <!-- ============================================================= LOGO : END ============================================================= --> </div>
        <!-- /.logo-holder -->
        
        <div class="col-lg-7 col-md-6 col-sm-8 col-xs-12 top-search-holder"> 
          <!-- /.contact-row --> 
          <!-- ============================================================= SEARCH AREA ============================================================= -->
          <div class="search-area" >
            <form autocomplete="off" id="search" method="get" action ="{{route('frontend.timkiemsanpham')}}"> 
              
              <div class="control-group">
                <ul class="categories-filter ">
                   <a href="">Tìm kiếm </a>
                </ul>
                <input class="search-field typeahead" name="search" placeholder="Bạn muốn tìm sản phẩm..." />
                <a href="{{route('frontend.timkiemsanpham')}}" class="search-button" onclick="event.preventDefault();document.getElementById('search').submit();"></a>
              </div>
            </form>
          </div>
          <!-- /.search-area --> 
          <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
        <!-- /.top-search-holder -->
        
        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 animate-dropdown top-cart-row"> 
          <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
          
          <div class="dropdown dropdown-cart"> 
            <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
              <div class="items-cart-inner">
                <div class="basket">
                  <div class="basket-item-count"><span class="count">{{ Cart::count() ?? 0 }}</span></div>
                  <div class="total-price-basket"> <span class="lbl">Giỏ hàng</span> <span class="value">@if(Cart::count() != null) {{Cart::priceTotal()}} @endif</span> </div>
                </div>
              </div>
            </a>
            @if( Cart::count() != 0)

            <ul class="dropdown-menu">
              <li>
                @foreach(Cart::content() as $value)
                <div class="cart-item product-summary">
                  <div class="row">
                    <div class="col-xs-4">
                      <div class="image"> <a href="{{ route('frontend.sanpham.chitiet',['tensanpham_slug' => Str::slug($value->name)]) }}"><img src="{{$value->options->image}}" alt=""></a> </div>
                    </div>
                    <div class="col-xs-7">
                      <h3 class="name"><a href="{{ route('frontend.sanpham.chitiet',['tensanpham_slug' => Str::slug($value->name)]) }}">{{ $value->name}}</a></h3>
                      <div class="price">{{number_format($value->price)}}</div>
                    </div>
                    <div class="col-xs-1 action"> <a href="{{ route('frontend.giohang.xoa', ['row_id' => $value->rowId]) }}"><i class="fa fa-trash"></i></a> </div>
                  </div>
                </div>
                @endforeach
                <!-- /.cart-item -->
                <div class="clearfix"></div>
                <hr>
                    <div class="clearfix cart-total">
                      <div class="pull-right"><span class="text">Tổng tiền  :</span><span class='price'>{{ Cart::priceTotal() }}</span> </div>
                      <div class="clearfix"></div>
                          <a href="{{ route('frontend.giohang') }}" class="btn btn-upper btn-primary btn-block m-t-20">Giỏ hàng </a> 
                          <a href="{{ route('frontend.dathang') }}" class="btn btn-upper btn-primary btn-block m-t-20">Thanh Toán</a> 
                    </div>
              </li>
            </ul>                  
            @endif
          </div>
          <!-- /.dropdown-cart --> 
          
          <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
        <!-- /.top-cart-row --> 
      </div>
      <!-- /.row --> 
      
    </div>
    <!-- /.container --> 
    
  </div>
  <!-- /.main-header --> 
  
  <!-- ============================================== NAVBAR ============================================== -->
  <div class="header-nav animate-dropdown">
    <div class="container">
      <div class="yamm navbar navbar-default" role="navigation">
        <div class="navbar-header">
       <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
       <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="nav-bg-class">
          <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
            <div class="nav-outer">
              <ul class="nav navbar-nav">
                <li class="active dropdown"> <a href="{{ route('frontend')}}">Trang chủ </a> </li>
                @foreach($danhmuc as $value)
                  <li class="dropdown yamm mega-menu"> <a href="{{ route('frontend.sanpham',['danhmuc_slug' =>$value->tendanhmuc_slug]) }}" data-hover="dropdown" class="dropdown-toggle">{{$value->tendanhmuc}}</a>
                    <ul class="dropdown-menu container">
                      <li>
                        <div class="yamm-content ">
                          <div class="row">
                            @foreach($value->NhomSanPham as $nhom)
                              <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                <h2 class="title">  
                                  <a href="{{route('frontend.sanpham.nhom',['danhmuc_slug' =>$value->tendanhmuc_slug,'nhomsanpham' => $nhom->tennhomsanpham_slug])}}">{{ $nhom->tennhomsanpham }} </a>       
                                </h2>
                                @foreach($nhom->LoaiSanPham as $loai)
                                  <ul class="links">
                                    <li><a href="{{route('frontend.sanpham.loai',['danhmuc_slug' =>$value->tendanhmuc_slug,'nhomsanpham' => $nhom->tennhomsanpham_slug,'loaisanpham' => $loai->tenloai_slug ])}}">{{$loai->tenloai}}</a></li>
                                  </ul>
                                @endforeach
                              </div>
                            @endforeach
                            <!-- /.col -->
                            @php 
                              $no_image = config('app.url') . '/public/frontend/images/no-image.jpg';
                              $path = config('app.url') . '/storage/app/danhmuc/';
                            @endphp
                            <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image"> 
                              <img class="img-responsive" src="{{ $path. $value->hinhanh }}" alt=""> 
                            </div>
                            <!-- /.yamm-content --> 
                          </div>
                        </div>
                      </li>
                    </ul>
                  </li>
                @endforeach
                <li class="dropdown"> <a href="{{route('frontend.lienhe')}}">Liên hệ </a> </li>
                <li class="dropdown"> <a href="{{route('frontend.baiviet')}}">Tin công nghệ</a>  
                </li>
              </ul>
              <!-- /.navbar-nav -->
              <div class="clearfix"></div>
            </div>
            <!-- /.nav-outer --> 
          </div>
          <!-- /.navbar-collapse --> 
          
        </div>
        <!-- /.nav-bg-class --> 
      </div>
      <!-- /.navbar-default --> 
    </div>
    <!-- /.container-class --> 
    
  </div>
  <!-- /.header-nav --> 
  <!-- ============================================== NAVBAR : END ============================================== --> 
  
</header>

<!-- ============================================== HEADER : END ============================================== -->
@yield('content')

<!-- /#top-banner-and-menu --> 

        <!-- ============================================== INFO BOXES ============================================== -->
  <div class="row our-features-box">
     <div class="container">
      <ul>
        <li>
          <div class="feature-box">
            <div class="icon-truck"></div>
            <div class="content-blocks">Chúng tôi vận chuyển trên toàn quốc </div>
          </div>
        </li>
        <li>
          <div class="feature-box">
            <div class="icon-support"></div>
            <div class="content-blocks">Gọi 
             0987 965 435</div>
          </div>
        </li>
        <li>
          <div class="feature-box">
            <div class="icon-money"></div>
            <div class="content-blocks">Đảm bảo hoàn tiền</div>
          </div>
        </li>
        <li>
          <div class="feature-box">
            <div class="icon-return"></div>
            <div class="content">30 ngày đổi trả </div>
          </div>
        </li>
        
      </ul>
    </div>
  </div>
        <!-- /.info-boxes --> 
        <!-- ============================================== INFO BOXES : END ============================================== --> 
  <div class="zalo-chat-widget" data-oaid="684233205486983641" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="300" data-height="300"></div>
  <script src="https://sp.zalo.me/plugins/sdk.js"></script>
<!-- ============================================================= FOOTER ============================================================= -->
<footer id="footer" class="footer color-bg">
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3">
        <div class="address-block">
          <div class="module-body">
            <ul class="toggle-footer" style="">
              <li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i> </span> </div>
                <div class="media-body">
                  <p>Đại học An Giang</p>
                </div>
              </li>
              <li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-mobile fa-stack-1x fa-inverse"></i> </span> </div>
                <div class="media-body">
                  <p> 0987 965 435</p>
                </div>
              </li>
              <li class="media">
                <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-envelope fa-stack-1x fa-inverse"></i> </span> </div>
                <div class="media-body"> <span><a href="mailto:snowcomputershop@gmail.com">snowcomputershop@gmail.com</a></span> </div>
              </li>
            </ul>
          </div>
          </div>
          <!-- /.module-body --> 
        </div>
        <!-- /.col -->
        
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">Dịch vụ khách hàng</h4>
          </div>
          <!-- /.module-heading -->
          
          <div class="module-body">
            <ul class='list-unstyled'>
              <li class="first"><a href="#" title="ài khoản của tôi">Tài khoản của tôi</a></li>
              <li><a href="#" title="Lịch sử đơn hàng">Lịch sử đơn hàng</a></li>
              <li><a href="#" title="faq">FAQ</a></li>
              <li><a href="#" title="Đặc biệt">Đặc biệt</a></li>
            </ul>
          </div>
          <!-- /.module-body --> 
        </div>
        <!-- /.col -->
        
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">Hướng dẫn</h4>
          </div>
          <div class="module-body">
            <ul class='list-unstyled'>
              <li class="first"><a title="Hướng dẫn mua sắm" href="#">Hướng dẫn mua sắm</a></li>
              <li><a title="Hướng dẫn thanh toán" href="#">Hướng dẫn thanh toán</a></li>
            </ul>
          </div>
        </div>
        
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">Tại sao chọn chúng tôi</h4>
          </div>          
          <div class="module-body">
            <ul class='list-unstyled'>
              <li class="first"><a title="Your Account" href="#">Về chúng tôi</a></li>
              <li><a href="{{route('frontend.baiviet')}}" title="Tin công nghệ">Tin công nghệ</a></li>
              <li class=" last"><a href="{{route('frontend.lienhe')}}" title="Liên hệ">Liên hệ</a></li>
              <li class="last"><a href="#" title="Trung tâm trợ giúp?">Trung tâm trợ giúp</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="copyright-bar">
    <div class="container">
      <div class="col-xs-12 col-sm-4 no-padding social">
        <ul class="link">
          <li class="fb pull-left"><a target="_blank" rel="nofollow" href="#" title="Facebook"></a></li>
          <li class="tw pull-left"><a target="_blank" rel="nofollow" href="#" title="Twitter"></a></li>
          <li class="googleplus pull-left"><a target="_blank" rel="nofollow" href="#" title="GooglePlus"></a></li>
          <li class="rss pull-left"><a target="_blank" rel="nofollow" href="#" title="RSS"></a></li>
          <li class="pintrest pull-left"><a target="_blank" rel="nofollow" href="#" title="PInterest"></a></li>
          <li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="#" title="Linkedin"></a></li>
          <li class="youtube pull-left"><a target="_blank" rel="nofollow" href="#" title="Youtube"></a></li>
        </ul>
      </div>
      <div class="col-xs-12 col-sm-4 no-padding copyright"><a target="_blank" href="#">&copy; Snow Computer </a> </div>
      <div class="col-xs-12 col-sm-4 no-padding">
        <div class="clearfix payment-methods">
          <ul>
            <li><img src="{{ asset('public/frontend/images/payments/1.png')}}" alt=""></li>
            <li><img src="{{ asset('public/frontend/images/payments/2.png')}}" alt=""></li>
            <li><img src="{{ asset('public/frontend/images/payments/3.png')}}" alt=""></li>
            <li><img src="{{ asset('public/frontend/images/payments/4.png')}}" alt=""></li>
            <li><img src="{{ asset('public/frontend/images/payments/5.png')}}" alt=""></li>
          </ul>
        </div>
        <!-- /.payment-methods --> 
      </div>
    </div>
  </div>
</footer>
<!-- ============================================================= FOOTER : END============================================================= --> 

  <script src="{{ asset('public/frontend/js/jquery-1.11.1.min.js')}}"></script> 
  <script src="{{ asset('public/frontend/js/bootstrap.min.js')}}"></script> 
  <script src="{{ asset('public/frontend/js/bootstrap-hover-dropdown.min.js')}}"></script> 
  <script src="{{ asset('public/frontend/js/owl.carousel.min.js')}}"></script> 
  <script src="{{ asset('public/frontend/js/echo.min.js')}}"></script> 
  <script src="{{ asset('public/frontend/js/jquery.easing-1.3.min.js')}}"></script> 
  <script src="{{ asset('public/frontend/js/bootstrap-slider.min.js')}}"></script> 
  <script src="{{ asset('public/frontend/js/jquery.rateit.min.js')}}"></script> 
  <script src="{{ asset('public/frontend/js/lightbox.min.js')}}"></script> 
  <script src="{{ asset('public/frontend/js/bootstrap-select.min.js')}}"></script> 
  <script src="{{ asset('public/frontend/js/wow.min.js')}}"></script> 
  <script src="{{ asset('public/frontend/js/scripts.js')}}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>  
  <script type="text/javascript">                      
      var path = "{{ route('frontend.selectSearch') }}";
      $('input.typeahead').typeahead({
          source:  function (query, process) {
              return $.get(path, { query: query }, function (data) {
                  return process(data);
              });
          },
          highlighter: function (item, data) {
              var parts = item.split('#'),
                  html = '<div class="row">';
                  html += '<div class="col-md-2">';
                  html += '<img src="'+data.img+'"/ height="50px;" width="70px;">';
                  html += '</div>';
                  html += '<div class="col-md-10 pl-0" style="width=1000px;">';
                  html += '<span>'+data.name+'</span>';
                  html += '<p class="m-0">'+  data.price.toLocaleString('it-IT', {style : 'currency', currency : 'VND'}); +'</p>';
                  html += '</div>';
                  html += '</div>';
              return html;
      }
    });

    $(document).ready(function() {
      $('.toast').addClass("active");
      $('.progress').addClass("active");
      setTimeout(function(){
            $('.toast').removeClass("active");
            $('.progress').removeClass("active");
           },4000);
    });
  </script>
  @yield('javascript')

</body>

</html>