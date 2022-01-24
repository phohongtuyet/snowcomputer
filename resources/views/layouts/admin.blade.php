<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Trang quản trị - SnowComputer  </title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('public/admin/css/app.min.css')}}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('public/admin/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('public/admin/css/components.css')}}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{ asset('public/admin/css/custom.css')}}">
  <link rel='shortcut icon' type='image/x-icon' href="{{ asset('public/admin/img/SnowComputer.png')}}" />

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      @if(Auth::user() != null)
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            <li>
              <form class="form-inline mr-auto">
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
              class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
              <span class="badge headerBadge1">
                6 </span> </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                Messages
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-message">
                <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar
											text-white"> <img alt="image" src="assets/img/users/user-1.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">John
                      Deo</span>
                    <span class="time messege-text">Please check your mail !!</span>
                    <span class="time">2 Min Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                      Smith</span> <span class="time messege-text">Request for leave
                      application</span>
                    <span class="time">5 Min Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets/img/users/user-5.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Jacob
                      Ryan</span> <span class="time messege-text">Your payment invoice is
                      generated.</span> <span class="time">12 Min Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets/img/users/user-4.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Lina
                      Smith</span> <span class="time messege-text">hii John, I have upload
                      doc
                      related to task.</span> <span class="time">30
                      Min Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets/img/users/user-3.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Jalpa
                      Joshi</span> <span class="time messege-text">Please do as specify.
                      Let me
                      know if you have any query.</span> <span class="time">1
                      Days Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar text-white">
                    <img alt="image" src="assets/img/users/user-2.png" class="rounded-circle">
                  </span> <span class="dropdown-item-desc"> <span class="message-user">Sarah
                      Smith</span> <span class="time messege-text">Client Requirements</span>
                    <span class="time">2 Days Ago</span>
                  </span>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
              class="nav-link notification-toggle nav-link-lg"><i data-feather="bell" class="bell"></i>
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread"> <span
                    class="dropdown-item-icon bg-primary text-white"> <i class="fas
												fa-code"></i>
                  </span> <span class="dropdown-item-desc"> Template update is
                    available now! <span class="time">2 Min
                      Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white"> <i class="far
												fa-user"></i>
                  </span> <span class="dropdown-item-desc"> <b>You</b> and <b>Dedik
                      Sugiharto</b> are now friends <span class="time">10 Hours
                      Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-success text-white"> <i
                      class="fas
												fa-check"></i>
                  </span> <span class="dropdown-item-desc"> <b>Kusnaedi</b> has
                    moved task <b>Fix bug header</b> to <b>Done</b> <span class="time">12
                      Hours
                      Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-danger text-white"> <i
                      class="fas fa-exclamation-triangle"></i>
                  </span> <span class="dropdown-item-desc"> Low disk space. Let's
                    clean it! <span class="time">17 Hours Ago</span>
                  </span>
                </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white"> <i class="fas
												fa-bell"></i>
                  </span> <span class="dropdown-item-desc"> Welcome to Otika
                    template! <span class="time">Yesterday</span>
                  </span>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="assets/img/user.png"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello Sarah Smith</div>
              <a href="profile.html" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
              </a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                Activities
              </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="auth-login.html" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      @endif
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="{{ asset('public/admin/img/SnowComputer.png')}}" class="header-logo" /> <span
                class="logo-name">SnowComputer</span>
            </a>
          </div>
          @guest
          @if(Route::has('login'))
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('login') }}"><i data-feather="log-in"></i> Đăng nhập</a>
            </li>
          @endif
        @else
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
              <a href="index.html" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Danh mục</li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Quản lý danh mục</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('admin.danhmuc') }}">Danh mục sản phẩm</a></li>
                <li><a class="nav-link" href="{{ route('admin.nhomsanpham') }}">Nhóm sản phẩm</a></li>
                <li><a class="nav-link" href="{{ route('admin.loaisanpham') }}">Loại sản phẩm</a></li>
                <li><a class="nav-link" href="{{ route('admin.hangsanxuat') }}">Hãng sản xuất</a></li>
                <li><a class="nav-link" href="{{ route('admin.noisanxuat') }}">Nơi sản xuất</a></li>   
                <li><a class="nav-link" href="{{ route('admin.slides') }}">Trình chiếu </a></li>                
             
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="navigation"></i><span>Quản lý bài viết</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('admin.chude') }}">Chủ đề</a></li>
                <li><a class="nav-link" href="{{ route('admin.baiviet') }}">Bài viết</a></li>
                
              </ul>
            </li>

            <li class="menu-header">Người dùng</li>
            <li class="dropdown">
              <a href="{{ route('admin.nguoidung') }}" ><i data-feather="users"></i><span>Quản lý người dùng</span></a>
              
            </li>

            <li class="menu-header">Sản phẩm</li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="layout"></i><span>Quản lý sản phẩm</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('admin.sanpham') }}">Sản phẩm</a></li>
                <li><a class="nav-link" href="">Đánh giá </a></li>
                <li><a class="nav-link" href="">Khuyễn mãi</a></li>
              </ul>
            </li>
            
           
            <li class="menu-header">Đặt hàng</li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="image"></i><span>Quản lý đặt hàng</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('admin.sanpham') }}">Tình trạng đơn hàng</a></li>
                <li><a class="nav-link" href="{{ route('admin.donhang') }}">Đơn hàng </a></li>
              </ul>
            </li>
            
            <li class="menu-header">Thống kê báo cáo</li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="bar-chart"></i><span>
                  Thống kê doanh thu</span></a>
              <ul class="dropdown-menu">
                <li><a href="gmaps-advanced-route.html">Advanced Route</a></li>
                <li><a href="gmaps-draggable-marker.html">Draggable Marker</a></li>
                <li><a href="gmaps-geocoding.html">Geocoding</a></li>
                <li><a href="gmaps-geolocation.html">Geolocation</a></li>
                <li><a href="gmaps-marker.html">Marker</a></li>
                <li><a href="gmaps-multiple-marker.html">Multiple Marker</a></li>
                <li><a href="gmaps-route.html">Route</a></li>
                <li><a href="gmaps-simple.html">Simple</a></li>
              </ul>
            </li>
           
            <li class="menu-header">Tài khoản</li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="user-check"></i><span>{{Auth::user()->name}}</span></a>
              <ul class="dropdown-menu">
                <li>
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Đăng xuất</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                        @csrf
                    </form>
                </li>
              </ul>
            </li>    
          </ul>
          @endguest
        </aside>      
      </div>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                @yield('content')  
              </div>            
            </div>
          </div>    
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          <a href="">by SnowComputer</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="{{ asset('public/admin/js/app.min.js')}}"></script>
  <!-- JS Libraies -->
  <script src="{{ asset('public/admin/bundles/apexcharts/apexcharts.min.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{ asset('public/admin/js/page/index.js')}}"></script>
  <!-- Template JS File -->
  <script src="{{ asset('public/admin/js/scripts.js')}}"></script>
  <!-- Custom JS File -->
  <script src="{{ asset('public/admin/js/custom.js')}}"></script>

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

  <script>
		
		$(document).ready(function() {
			$("#table_id").DataTable({
				"aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Tất cả"]],
				"iDisplayLength": 10,
				"oLanguage": {
					"sLengthMenu": "Hiện _MENU_ dòng",
					"oPaginate": {
						"sFirst": "<i class='fas fa-step-backward'></i>",
						"sLast": "<i class='fas fa-step-forward'></i>",
						"sNext": "<i class='fas fa-chevron-right'></i>",
						"sPrevious": "<i class='fas fa-chevron-left'></i>"
					},
					"sEmptyTable": "Không có dữ liệu",
					"sSearch": "Tìm kiếm:",
					"sZeroRecords": "Không có dữ liệu",
					"sInfo": "Hiện từ _START_ đến _END_ của _TOTAL_ dòng",
					"sInfoEmpty" : "Không tìm thấy",
					"sInfoFiltered": " (tổng số _MAX_ dòng)"
				}
			});
			$("#table_id").wrap('<div class="table-responsive"></div>');
		});
	</script>
  
  @yield('javascript')
</body>


</html>