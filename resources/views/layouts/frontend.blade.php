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

  <!-- Bootstrap Core CSS -->
  <link rel="stylesheet" href="{{ asset('public/frontend/css/bootstrap.min.css')}}">

  <!-- Customizable CSS -->
  <link rel="stylesheet" href="{{ asset('public/frontend/css/main.css')}}">
  <link rel="stylesheet" href="{{ asset('public/frontend/css/blue.css')}}">
  <link rel="stylesheet" href="{{ asset('public/frontend/css/owl.carousel.css')}}">
  <link rel="stylesheet" href="{{ asset('public/frontend/css/owl.transitions.css')}}">
  <link rel="stylesheet" href="{{ asset('public/frontend/css/animate.min.css')}}">
  <link rel="stylesheet" href="{{ asset('public/frontend/css/rateit.css')}}">
  <link rel="stylesheet" href="{{ asset('public/frontend/css/bootstrap-select.min.css')}}">

  <!-- Icons/Glyphs -->
  <link rel="stylesheet" href="{{ asset('public/frontend/css/font-awesome.css')}}">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Barlow:200,300,300i,400,400i,500,500i,600,700,800" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="cnt-home">
  <header class="header-style-1"> 
    
    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
      <div class="container">
        <div class="header-top-inner">
          <div class="cnt-account">
            <ul class="list-unstyled">
              <li class="myaccount"><a href="#"><span>Tài khoản của tôi</span></a></li>
              <li class="wishlist"><a href="#"><span>Danh sách yêu thích</span></a></li>
              <li class="header_cart hidden-xs"><a href="#"><span>Giỏ hàng của tôi</span></a></li>
              <li class="check"><a href="#"><span>Thanh toán</span></a></li>
              <li class="login"><a href="#"><span>Đăng nhập</span></a></li>
            </ul>
          </div>
          <!-- /.cnt-account -->
          
          <div class="cnt-block">
            <ul class="list-unstyled list-inline">
              <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">USD</a></li>
                  <li><a href="#">INR</a></li>
                  <li><a href="#">GBP</a></li>
                </ul>
              </li>
              <li class="dropdown dropdown-small lang"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">English </span><b class="caret"></b></a>
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
            <div class="logo"> <a href="home.html"> <img src="assets/images/logo.png" alt="logo"> </a> </div>
            <!-- /.logo --> 
            <!-- ============================================================= LOGO : END ============================================================= --> </div>
          <!-- /.logo-holder -->
          
          <div class="col-lg-7 col-md-6 col-sm-8 col-xs-12 top-search-holder"> 
            <!-- /.contact-row --> 
            <!-- ============================================================= SEARCH AREA ============================================================= -->
            <div class="search-area">
              <form>
                <div class="control-group">
                  <ul class="categories-filter animate-dropdown">
                    <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a>
                      <ul class="dropdown-menu" role="menu" >
                        <li class="menu-header">Computer</li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Clothing</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Electronics</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Shoes</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Watches</a></li>
                      </ul>
                    </li>
                  </ul>
                  <input class="search-field" placeholder="Search here..." />
                  <a class="search-button" href="#" ></a> </div>
              </form>
            </div>
            <!-- /.search-area --> 
            <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
          <!-- /.top-search-holder -->
          
          <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 animate-dropdown top-cart-row"> 
            <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
            
            <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
              <div class="items-cart-inner">
                <div class="basket">
                <div class="basket-item-count"><span class="count">2</span></div>
                <div class="total-price-basket"> <span class="lbl">Shopping Cart</span> <span class="value">$4580</span> </div>
                </div>
              </div>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <div class="cart-item product-summary">
                    <div class="row">
                      <div class="col-xs-4">
                        <div class="image"> <a href="detail.html"><img src="assets/images/products/p4.jpg" alt=""></a> </div>
                      </div>
                      <div class="col-xs-7">
                        <h3 class="name"><a href="index8a95.html?page-detail">Simple Product</a></h3>
                        <div class="price">$600.00</div>
                      </div>
                      <div class="col-xs-1 action"> <a href="#"><i class="fa fa-trash"></i></a> </div>
                    </div>
                  </div>
                  <!-- /.cart-item -->
                  <div class="clearfix"></div>
                  <hr>
                  <div class="clearfix cart-total">
                    <div class="pull-right"> <span class="text">Sub Total :</span><span class='price'>$600.00</span> </div>
                    <div class="clearfix"></div>
                    <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
                  <!-- /.cart-total--> 
                  
                </li>
              </ul>
              <!-- /.dropdown-menu--> 
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
                  <li class="active dropdown"> <a href="home.html">Home</a> </li>
                  <li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Clothing</a>
                    <ul class="dropdown-menu container">
                      <li>
                        <div class="yamm-content ">
                          <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                              <h2 class="title">Men</h2>
                              <ul class="links">
                                <li><a href="#">Dresses</a></li>
                                <li><a href="#">Shoes </a></li>
                                <li><a href="#">Jackets</a></li>
                                <li><a href="#">Sunglasses</a></li>
                                <li><a href="#">Sport Wear</a></li>
                                <li><a href="#">Blazers</a></li>
                                <li><a href="#">Shirts</a></li>
                              </ul>
                            </div>
                            <!-- /.col -->
                            
                            <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                              <h2 class="title">Women</h2>
                              <ul class="links">
                                <li><a href="#">Handbags</a></li>
                                <li><a href="#">Jwellery</a></li>
                                <li><a href="#">Swimwear </a></li>
                                <li><a href="#">Tops</a></li>
                                <li><a href="#">Flats</a></li>
                                <li><a href="#">Shoes</a></li>
                                <li><a href="#">Winter Wear</a></li>
                              </ul>
                            </div>
                            <!-- /.col -->
                            
                            <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                              <h2 class="title">Boys</h2>
                              <ul class="links">
                                <li><a href="#">Toys & Games</a></li>
                                <li><a href="#">Jeans</a></li>
                                <li><a href="#">Shirts</a></li>
                                <li><a href="#">Shoes</a></li>
                                <li><a href="#">School Bags</a></li>
                                <li><a href="#">Lunch Box</a></li>
                                <li><a href="#">Footwear</a></li>
                              </ul>
                            </div>
                            <!-- /.col -->
                            
                            <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                              <h2 class="title">Girls</h2>
                              <ul class="links">
                                <li><a href="#">Sandals </a></li>
                                <li><a href="#">Shorts</a></li>
                                <li><a href="#">Dresses</a></li>
                                <li><a href="#">Jwellery</a></li>
                                <li><a href="#">Bags</a></li>
                                <li><a href="#">Night Dress</a></li>
                                <li><a href="#">Swim Wear</a></li>
                              </ul>
                            </div>
                            <!-- /.col -->
                            
                            <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image"> <img class="img-responsive" src="assets/images/banners/top-menu-banner.jpg" alt=""> </div>
                            <!-- /.yamm-content --> 
                          </div>
                        </div>
                      </li>
                    </ul>
                  </li>
                  <li class="dropdown mega-menu"> 
                  <a href="category.html"  data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Electronics <span class="menu-label hot-menu hidden-xs">hot</span> </a>
                    <ul class="dropdown-menu container">
                      <li>
                        <div class="yamm-content">
                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                              <h2 class="title">Laptops</h2>
                              <ul class="links">
                                <li><a href="#">Gaming</a></li>
                                <li><a href="#">Laptop Skins</a></li>
                                <li><a href="#">Apple</a></li>
                                <li><a href="#">Dell</a></li>
                                <li><a href="#">Lenovo</a></li>
                                <li><a href="#">Microsoft</a></li>
                                <li><a href="#">Asus</a></li>
                                <li><a href="#">Adapters</a></li>
                                <li><a href="#">Batteries</a></li>
                                <li><a href="#">Cooling Pads</a></li>
                              </ul>
                            </div>
                            <!-- /.col -->
                            
                            <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                              <h2 class="title">Desktops</h2>
                              <ul class="links">
                                <li><a href="#">Routers & Modems</a></li>
                                <li><a href="#">CPUs, Processors</a></li>
                                <li><a href="#">PC Gaming Store</a></li>
                                <li><a href="#">Graphics Cards</a></li>
                                <li><a href="#">Components</a></li>
                                <li><a href="#">Webcam</a></li>
                                <li><a href="#">Memory (RAM)</a></li>
                                <li><a href="#">Motherboards</a></li>
                                <li><a href="#">Keyboards</a></li>
                                <li><a href="#">Headphones</a></li>
                              </ul>
                            </div>
                            <!-- /.col -->
                            
                            <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                              <h2 class="title">Cameras</h2>
                              <ul class="links">
                                <li><a href="#">Accessories</a></li>
                                <li><a href="#">Binoculars</a></li>
                                <li><a href="#">Telescopes</a></li>
                                <li><a href="#">Camcorders</a></li>
                                <li><a href="#">Digital</a></li>
                                <li><a href="#">Film Cameras</a></li>
                                <li><a href="#">Flashes</a></li>
                                <li><a href="#">Lenses</a></li>
                                <li><a href="#">Surveillance</a></li>
                                <li><a href="#">Tripods</a></li>
                              </ul>
                            </div>
                            <!-- /.col -->
                            <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                              <h2 class="title">Mobile Phones</h2>
                              <ul class="links">
                                <li><a href="#">Apple</a></li>
                                <li><a href="#">Samsung</a></li>
                                <li><a href="#">Lenovo</a></li>
                                <li><a href="#">Motorola</a></li>
                                <li><a href="#">LeEco</a></li>
                                <li><a href="#">Asus</a></li>
                                <li><a href="#">Acer</a></li>
                                <li><a href="#">Accessories</a></li>
                                <li><a href="#">Headphones</a></li>
                                <li><a href="#">Memory Cards</a></li>
                              </ul>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-menu custom-banner"> <a href="#"><img alt="" src="assets/images/banners/top-menu-banner1.jpg"></a> </div>
                          </div>
                          <!-- /.row --> 
                        </div>
                        <!-- /.yamm-content --> </li>
                    </ul>
                  </li>
                  <li class="dropdown hidden-sm"> <a href="category.html">Health & Beauty <span class="menu-label new-menu hidden-xs">new</span> </a> </li>
                  <li class="dropdown hidden-sm"> <a href="category.html">Watches</a> </li>
                  <li class="dropdown"> <a href="contact.html">Jewellery</a> </li>
                  <li class="dropdown"> <a href="contact.html">Shoes</a> </li>
                  <li class="dropdown"> <a href="contact.html">Kids & Girls</a> </li>
                  <li class="dropdown"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Pages</a>
                    <ul class="dropdown-menu pages">
                      <li>
                        <div class="yamm-content">
                          <div class="row">
                            <div class="col-xs-12 col-menu">
                              <ul class="links">
                                <li><a href="home.html">Home</a></li>
                                <li><a href="category.html">Category</a></li>
                                <li><a href="detail.html">Detail</a></li>
                                <li><a href="shopping-cart.html">Shopping Cart Summary</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="blog-details.html">Blog Detail</a></li>
                                <li><a href="contact.html">Contact</a></li>
                                <li><a href="sign-in.html">Sign In</a></li>
                                <li><a href="my-wishlist.html">Wishlist</a></li>
                                <li><a href="terms-conditions.html">Terms and Condition</a></li>
                                <li><a href="track-orders.html">Track Orders</a></li>
                                <li><a href="product-comparison.html">Product-Comparison</a></li>
                                <li><a href="faq.html">FAQ</a></li>
                                <li><a href="404.html">404</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </li>
                  <li class="dropdown  navbar-right special-menu"> <a href="#">Get 30% off on selected items</a> </li>
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
                <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-shopping-bag" aria-hidden="true"></i>Clothing</a>
                  <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                      <div class="row">
                        <div class="col-sm-12 col-md-3">
                          <ul class="links list-unstyled">
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Shoes </a></li>
                            <li><a href="#">Jackets</a></li>
                            <li><a href="#">Sunglasses</a></li>
                            <li><a href="#">Sport Wear</a></li>
                            <li><a href="#">Blazers</a></li>
                            <li><a href="#">Shirts</a></li>
                            <li><a href="#">Shorts</a></li>
                          </ul>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-12 col-md-3">
                          <ul class="links list-unstyled">
                            <li><a href="#">Handbags</a></li>
                            <li><a href="#">Jwellery</a></li>
                            <li><a href="#">Swimwear </a></li>
                            <li><a href="#">Tops</a></li>
                            <li><a href="#">Flats</a></li>
                            <li><a href="#">Shoes</a></li>
                            <li><a href="#">Winter Wear</a></li>
                            <li><a href="#">Night Suits</a></li>
                          </ul>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-12 col-md-3">
                          <ul class="links list-unstyled">
                            <li><a href="#">Toys &amp; Games</a></li>
                            <li><a href="#">Jeans</a></li>
                            <li><a href="#">Shirts</a></li>
                            <li><a href="#">Shoes</a></li>
                            <li><a href="#">School Bags</a></li>
                            <li><a href="#">Lunch Box</a></li>
                            <li><a href="#">Footwear</a></li>
                            <li><a href="#">Wipes</a></li>
                          </ul>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-12 col-md-3">
                          <ul class="links list-unstyled">
                            <li><a href="#">Sandals </a></li>
                            <li><a href="#">Shorts</a></li>
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Jwellery</a></li>
                            <li><a href="#">Bags</a></li>
                            <li><a href="#">Night Dress</a></li>
                            <li><a href="#">Swim Wear</a></li>
                            <li><a href="#">Toys</a></li>
                          </ul>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.row --> 
                    </li>
                    <!-- /.yamm-content -->
                  </ul>
                  <!-- /.dropdown-menu --> </li>
                <!-- /.menu-item -->
                
                <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-laptop" aria-hidden="true"></i>Electronics</a> 
                  <!-- ================================== MEGAMENU VERTICAL ================================== -->
                  <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                      <div class="row">
                        <div class="col-xs-12 col-sm-12 col-lg-4">
                          <ul>
                            <li><a href="#">Gaming</a></li>
                            <li><a href="#">Laptop Skins</a></li>
                            <li><a href="#">Apple</a></li>
                            <li><a href="#">Dell</a></li>
                            <li><a href="#">Lenovo</a></li>
                            <li><a href="#">Microsoft</a></li>
                            <li><a href="#">Asus</a></li>
                            <li><a href="#">Adapters</a></li>
                            <li><a href="#">Batteries</a></li>
                            <li><a href="#">Cooling Pads</a></li>
                          </ul>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-lg-4">
                          <ul>
                            <li><a href="#">Routers &amp; Modems</a></li>
                            <li><a href="#">CPUs, Processors</a></li>
                            <li><a href="#">PC Gaming Store</a></li>
                            <li><a href="#">Graphics Cards</a></li>
                            <li><a href="#">Components</a></li>
                            <li><a href="#">Webcam</a></li>
                            <li><a href="#">Memory (RAM)</a></li>
                            <li><a href="#">Motherboards</a></li>
                            <li><a href="#">Keyboards</a></li>
                            <li><a href="#">Headphones</a></li>
                          </ul>
                        </div>
                        <div class="dropdown-banner-holder"> <a href="#"><img alt="" src="assets/images/banners/banner-side.png" /></a> </div>
                      </div>
                      <!-- /.row --> 
                    </li>
                    <!-- /.yamm-content -->
                  </ul>
                  <!-- /.dropdown-menu --> 
                  <!-- ================================== MEGAMENU VERTICAL ================================== --> </li>
                <!-- /.menu-item -->
                
                <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-paw" aria-hidden="true"></i>Shoes</a>
                  <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                      <div class="row">
                        <div class="col-sm-12 col-md-3">
                          <ul class="links list-unstyled">
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Shoes </a></li>
                            <li><a href="#">Jackets</a></li>
                            <li><a href="#">Sunglasses</a></li>
                            <li><a href="#">Sport Wear</a></li>
                            <li><a href="#">Blazers</a></li>
                            <li><a href="#">Shirts</a></li>
                            <li><a href="#">Shorts</a></li>
                          </ul>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-12 col-md-3">
                          <ul class="links list-unstyled">
                            <li><a href="#">Handbags</a></li>
                            <li><a href="#">Jwellery</a></li>
                            <li><a href="#">Swimwear </a></li>
                            <li><a href="#">Tops</a></li>
                            <li><a href="#">Flats</a></li>
                            <li><a href="#">Shoes</a></li>
                            <li><a href="#">Winter Wear</a></li>
                            <li><a href="#">Night Suits</a></li>
                          </ul>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-12 col-md-3">
                          <ul class="links list-unstyled">
                            <li><a href="#">Toys &amp; Games</a></li>
                            <li><a href="#">Jeans</a></li>
                            <li><a href="#">Shirts</a></li>
                            <li><a href="#">Shoes</a></li>
                            <li><a href="#">School Bags</a></li>
                            <li><a href="#">Lunch Box</a></li>
                            <li><a href="#">Footwear</a></li>
                            <li><a href="#">Wipes</a></li>
                          </ul>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-12 col-md-3">
                          <ul class="links list-unstyled">
                            <li><a href="#">Sandals </a></li>
                            <li><a href="#">Shorts</a></li>
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Jwellery</a></li>
                            <li><a href="#">Bags</a></li>
                            <li><a href="#">Night Dress</a></li>
                            <li><a href="#">Swim Wear</a></li>
                            <li><a href="#">Toys</a></li>
                          </ul>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.row --> 
                    </li>
                    <!-- /.yamm-content -->
                  </ul>
                  <!-- /.dropdown-menu --> </li>
                <!-- /.menu-item -->
                
                <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-clock-o"></i>Watches</a>
                  <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                      <div class="row">
                        <div class="col-xs-12 col-sm-12 col-lg-4">
                          <ul>
                            <li><a href="#">Gaming</a></li>
                            <li><a href="#">Laptop Skins</a></li>
                            <li><a href="#">Apple</a></li>
                            <li><a href="#">Dell</a></li>
                            <li><a href="#">Lenovo</a></li>
                            <li><a href="#">Microsoft</a></li>
                            <li><a href="#">Asus</a></li>
                            <li><a href="#">Adapters</a></li>
                            <li><a href="#">Batteries</a></li>
                            <li><a href="#">Cooling Pads</a></li>
                          </ul>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-lg-4">
                          <ul>
                            <li><a href="#">Routers &amp; Modems</a></li>
                            <li><a href="#">CPUs, Processors</a></li>
                            <li><a href="#">PC Gaming Store</a></li>
                            <li><a href="#">Graphics Cards</a></li>
                            <li><a href="#">Components</a></li>
                            <li><a href="#">Webcam</a></li>
                            <li><a href="#">Memory (RAM)</a></li>
                            <li><a href="#">Motherboards</a></li>
                            <li><a href="#">Keyboards</a></li>
                            <li><a href="#">Headphones</a></li>
                          </ul>
                        </div>
                        <div class="dropdown-banner-holder"> <a href="#"><img alt="" src="assets/images/banners/banner-side.png" /></a> </div>
                      </div>
                      <!-- /.row --> 
                    </li>
                    <!-- /.yamm-content -->
                  </ul>
                  <!-- /.dropdown-menu --> </li>
                <!-- /.menu-item -->
                
                <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-diamond"></i>Jewellery</a>
                  <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                      <div class="row">
                        <div class="col-sm-12 col-md-3">
                          <ul class="links list-unstyled">
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Shoes </a></li>
                            <li><a href="#">Jackets</a></li>
                            <li><a href="#">Sunglasses</a></li>
                            <li><a href="#">Sport Wear</a></li>
                            <li><a href="#">Blazers</a></li>
                            <li><a href="#">Shirts</a></li>
                            <li><a href="#">Shorts</a></li>
                          </ul>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-12 col-md-3">
                          <ul class="links list-unstyled">
                            <li><a href="#">Handbags</a></li>
                            <li><a href="#">Jwellery</a></li>
                            <li><a href="#">Swimwear </a></li>
                            <li><a href="#">Tops</a></li>
                            <li><a href="#">Flats</a></li>
                            <li><a href="#">Shoes</a></li>
                            <li><a href="#">Winter Wear</a></li>
                            <li><a href="#">Night Suits</a></li>
                          </ul>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-12 col-md-3">
                          <ul class="links list-unstyled">
                            <li><a href="#">Toys &amp; Games</a></li>
                            <li><a href="#">Jeans</a></li>
                            <li><a href="#">Shirts</a></li>
                            <li><a href="#">Shoes</a></li>
                            <li><a href="#">School Bags</a></li>
                            <li><a href="#">Lunch Box</a></li>
                            <li><a href="#">Footwear</a></li>
                            <li><a href="#">Wipes</a></li>
                          </ul>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-12 col-md-3">
                          <ul class="links list-unstyled">
                            <li><a href="#">Sandals </a></li>
                            <li><a href="#">Shorts</a></li>
                            <li><a href="#">Dresses</a></li>
                            <li><a href="#">Jwellery</a></li>
                            <li><a href="#">Bags</a></li>
                            <li><a href="#">Night Dress</a></li>
                            <li><a href="#">Swim Wear</a></li>
                            <li><a href="#">Toys</a></li>
                          </ul>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.row --> 
                    </li>
                    <!-- /.yamm-content -->
                  </ul>
                  <!-- /.dropdown-menu --> </li>
                <!-- /.menu-item -->
                
                <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-heartbeat"></i>Health and Beauty</a>
                  <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                      <div class="row">
                        <div class="col-xs-12 col-sm-12 col-lg-4">
                          <ul>
                            <li><a href="#">Gaming</a></li>
                            <li><a href="#">Laptop Skins</a></li>
                            <li><a href="#">Apple</a></li>
                            <li><a href="#">Dell</a></li>
                            <li><a href="#">Lenovo</a></li>
                            <li><a href="#">Microsoft</a></li>
                            <li><a href="#">Asus</a></li>
                            <li><a href="#">Adapters</a></li>
                            <li><a href="#">Batteries</a></li>
                            <li><a href="#">Cooling Pads</a></li>
                          </ul>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-lg-4">
                          <ul>
                            <li><a href="#">Routers &amp; Modems</a></li>
                            <li><a href="#">CPUs, Processors</a></li>
                            <li><a href="#">PC Gaming Store</a></li>
                            <li><a href="#">Graphics Cards</a></li>
                            <li><a href="#">Components</a></li>
                            <li><a href="#">Webcam</a></li>
                            <li><a href="#">Memory (RAM)</a></li>
                            <li><a href="#">Motherboards</a></li>
                            <li><a href="#">Keyboards</a></li>
                            <li><a href="#">Headphones</a></li>
                          </ul>
                        </div>
                        <div class="dropdown-banner-holder"> <a href="#"><img alt="" src="assets/images/banners/banner-side.png" /></a> </div>
                      </div>
                      <!-- /.row --> 
                    </li>
                    <!-- /.yamm-content -->
                  </ul>
                  <!-- /.dropdown-menu --> </li>
                <!-- /.menu-item -->
                
                <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-paper-plane"></i>Kids and Babies</a> 
                  <!-- /.dropdown-menu --> </li>
                <!-- /.menu-item -->
                
                <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-futbol-o"></i>Sports</a> 
                  <!-- ================================== MEGAMENU VERTICAL ================================== --> 
                  <!-- /.dropdown-menu --> 
                  <!-- ================================== MEGAMENU VERTICAL ================================== --> </li>
                <!-- /.menu-item -->
                
                <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-envira"></i>Home and Garden</a> 
                  <!-- /.dropdown-menu --> </li>
                <!-- /.menu-item -->
                
              </ul>
              <!-- /.nav --> 
            </nav>
            <!-- /.megamenu-horizontal --> 
          </div>
          <!-- /.side-menu --> 
          <!-- ================================== TOP NAVIGATION : END ================================== --> 
           
          <!-- ============================================== NEWSLETTER ============================================== -->
          <div class="sidebar-widget newsletter outer-bottom-small">
            <h3 class="section-title">Newsletters</h3>
            <div class="sidebar-widget-body outer-top-xs">
              <p>Sign Up for Our Newsletter!</p>
              <form>
                <div class="form-group">
                  <label class="sr-only" for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
                </div>
                <button class="btn btn-primary">Subscribe</button>
              </form>
            </div>
            <!-- /.sidebar-widget-body --> 
          </div>
          <!-- /.sidebar-widget -->  
        </div>
        <!-- /.sidemenu-holder --> 
        
        <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder"> 
          <!-- ========================================== SECTION – HERO ========================================= -->
          
          <div id="hero">
            <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
              <div class="item" style="background-image: url({{ asset('public/frontend/images/sliders/01.jpg')}});">
                <div class="container-fluid">
                  <div class="caption bg-color vertical-center text-left">
                    <div class="slider-header fadeInDown-1">Top Brands</div>
                    <div class="big-text fadeInDown-1"> New Collections </div>
                    <div class="excerpt fadeInDown-2 hidden-xs"> <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span> </div>
                    <div class="button-holder fadeInDown-3"> <a href="index6c11.html?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                  </div>
                  <!-- /.caption --> 
                </div>
                <!-- /.container-fluid --> 
              </div>
              <!-- /.item -->
              
              <div class="item" style="background-image: url({{ asset('public/frontend/images/sliders/02.jpg')}});">
                <div class="container-fluid">
                  <div class="caption bg-color vertical-center text-left">
                    <div class="slider-header fadeInDown-1">Spring 2018</div>
                    <div class="big-text fadeInDown-1"> Women Fashion </div>
                    <div class="excerpt fadeInDown-2 hidden-xs"> <span>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit</span> </div>
                    <div class="button-holder fadeInDown-3"> <a href="index6c11.html?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                  </div>
                  <!-- /.caption --> 
                </div>
                <!-- /.container-fluid --> 
              </div>
              <!-- /.item --> 
              
            </div>
            <!-- /.owl-carousel --> 
          </div>

          <!-- ============================================== WIDE PRODUCTS ============================================== -->
          <div class="wide-banners outer-bottom-xs">
            <div class="row">
              <div class="col-md-8">
                <div class="wide-banner1 cnt-strip">
                  <div class="image"> <img class="img-responsive" src="assets/images/banners/home-banner.jpg" alt=""> </div>
                  <div class="strip strip-text">
                    <div class="strip-inner">
                      <h2 class="text-right">Amazing Sunglasses<br>
                        <span class="shopping-needs">Get 40% off on selected items</span></h2>
                    </div>
                  </div>
                  <div class="new-label">
                    <div class="text">NEW</div>
                  </div>
                  <!-- /.new-label --> 
                </div>
                <!-- /.wide-banner --> 
              </div>
              <!-- /.col --> 
              <div class="col-md-4">
                <div class="wide-banner cnt-strip">
                  <div class="image"> <img class="img-responsive" src="assets/images/banners/home-banner4.jpg" alt=""> </div>
                  
                  
                  <!-- /.new-label --> 
                </div>
                <!-- /.wide-banner --> 
              </div>
              
            </div>
            <!-- /.row --> 
          </div>
          <!-- /.wide-banners --> 
        </div>
        <!-- /.homebanner-holder --> 
        <!-- ============================================== CONTENT : END ============================================== --> 
      </div>
      <!-- /.row --> 
      <!-- ============================================== BRANDS CAROUSEL ============================================== -->
      <div id="brands-carousel" class="logo-slider">
        <div class="logo-slider-inner">
          <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
            <div class="item m-t-15"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->
            
            <div class="item m-t-10"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->
            
            <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->
            
            <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->
            
            <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->
            
            <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->
            
            <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->
            
            <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->
            
            <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->
            
            <div class="item"> <a href="#" class="image"> <img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item--> 
          </div>
          <!-- /.owl-carousel #logo-slider --> 
        </div>
        <!-- /.logo-slider-inner --> 
        
      </div>
      <!-- /.logo-slider --> 
      <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> 
    </div>
    <!-- /.container --> 
  </div>

  @yield('content')

  <div class="row our-features-box">
    <div class="container">
      <ul>
        <li>
          <div class="feature-box">
            <div class="icon-truck"></div>
            <div class="content-blocks">Chúng tôi vận chuyển trên toàn quốc</div>
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
            <div class="content-blocks">Money Back Guarantee</div>
          </div>
        </li>
        <li>
          <div class="feature-box">
            <div class="icon-return"></div>
            <div class="content">30 days return</div>
          </div>
        </li>
        
      </ul>
    </div>
  </div>
       

  <footer id="footer" class="footer color-bg">
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="address-block">
          
            <!-- /.module-heading -->
            
            <div class="module-body">
              <ul class="toggle-footer" style="">
                <li class="media">
                  <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i> </span> </div>
                  <div class="media-body">
                    <p>Đại học An Giang - DH19PM</p>
                  </div>
                </li>
                <li class="media">
                  <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-mobile fa-stack-1x fa-inverse"></i> </span> </div>
                  <div class="media-body">
                    <p> 0987.965.435</p>
                  </div>
                </li>
                <li class="media">
                  <div class="pull-left"> <span class="icon fa-stack fa-lg"> <i class="fa fa-envelope fa-stack-1x fa-inverse"></i> </span> </div>
                  <div class="media-body"> <span><a href="#">phtuyet_19pm@student.agu.edu.vn</a></span> </div>
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
                <li class="first"><a href="#" title="Contact us">Tài khoản của tôi</a></li>
                <li><a href="#" title="About us">lịch sử đơn hàng</a></li>
                <li><a href="#" title="faq">FAQ</a></li>
                <li><a href="#" title="Popular Searches">Đặc biệt</a></li>
                <li class="last"><a href="#" title="Where is my order?">Trung tập hỗ trợ</a></li>
              </ul>
            </div>
            <!-- /.module-body --> 
          </div>
          <!-- /.col -->
          
          <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="module-heading">
              <h4 class="module-title">Corporation</h4>
            </div>
            <!-- /.module-heading -->
            
            <div class="module-body">
              <ul class='list-unstyled'>
                <li class="first"><a title="Your Account" href="#">About us</a></li>
                <li><a title="Information" href="#">Customer Service</a></li>
                <li><a title="Addresses" href="#">Company</a></li>
                <li><a title="Addresses" href="#">Investor Relations</a></li>
                <li class="last"><a title="Orders History" href="#">Advanced Search</a></li>
              </ul>
            </div>
            <!-- /.module-body --> 
          </div>
          <!-- /.col -->
          
          <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="module-heading">
              <h4 class="module-title">Why Choose Us</h4>
            </div>
            <!-- /.module-heading -->
            
            <div class="module-body">
              <ul class='list-unstyled'>
                <li class="first"><a href="#" title="About us">Shopping Guide</a></li>
                <li><a href="#" title="Blog">Blog</a></li>
                <li><a href="#" title="Company">Company</a></li>
                <li><a href="#" title="Investor Relations">Investor Relations</a></li>
                <li class=" last"><a href="contact-us.html" title="Suppliers">Contact Us</a></li>
              </ul>
            </div>
            <!-- /.module-body --> 
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
        <div class="col-xs-12 col-sm-4 no-padding copyright">by PHO HONG TUYET </div>
        <div class="col-xs-12 col-sm-4 no-padding">
          <div class="clearfix payment-methods">
            <ul>
              <li><img src="assets/images/payments/1.png" alt=""></li>
              <li><img src="assets/images/payments/2.png" alt=""></li>
              <li><img src="assets/images/payments/3.png" alt=""></li>
              <li><img src="assets/images/payments/4.png" alt=""></li>
              <li><img src="assets/images/payments/5.png" alt=""></li>
            </ul>
          </div>
          <!-- /.payment-methods --> 
        </div>
      </div>
    </div>
  </footer>

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
</body>

</html>