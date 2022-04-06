<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Trang quản trị - SnowComputer  </title>
  <link rel="stylesheet" href="{{ asset('public/admin/css/app.min.css')}}">
  <link rel="stylesheet" href="{{ asset('public/admin/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('public/admin/css/components.css')}}">
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
          <li class="dropdown dropdown-list-toggle">
            <a href="#" data-toggle="dropdown"
              class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
                <span class="badge headerBadge1">{{$lienhe->count()}}</span> 
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                Gmail
               
              </div>
              <div class="dropdown-list-content dropdown-list-message">
                @foreach($lienhe as $value)
                  <a href="#" class="dropdown-item"> 
                    <span class="dropdown-item-desc"> 
                      <span class="message-user">{{ $value->email }}</span>
                      <span class="time messege-text">{{ $value->tieude }}</span>
                      <span class="time">
                      </span>
                    </span>
                  </a>
                @endforeach
              </div>
              <div class="dropdown-footer text-center">
                <a href="{{ route('admin.gmail')}}">Xem tất cả<i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>

          <li class="dropdown">
            <a href="#" data-toggle="dropdown"class="nav-link dropdown-toggle nav-link-lg nav-link-user"> 
              <img alt="image" src="{{ asset('public/admin/img/users/user-1.png')}}"class="user-img-radious-style"> 
              <span class="d-sm-none d-lg-inline-block"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">{{Auth::user()->name}}</div>
                <a href="{{route('admin.nguoidung.info',['name' => Auth::user()->name ])}}" class="dropdown-item has-icon"> <i class="farfa-user"></i> Thông tin cá nhân</a> 
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a>
              <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                  @csrf
              </form>
            </div>
          </li>
        </ul>
      </nav>
      @endif
        @guest
      
        @else
        <div class="main-sidebar sidebar-style-2">
          <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
              <a href="{{route('admin.home')}}"> <img alt="image" src="{{ asset('public/admin/img/SnowComputer.png')}}" class="header-logo" /> <span
                  class="logo-name">SnowComputer</span>
              </a>
            </div>
            <ul class="sidebar-menu">
              <li class="menu-header">Main</li>
              <li class="dropdown">
                <a href="{{route('admin.home')}}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
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
              @if(Auth::user()->role === 'admin')
              <li class="menu-header">Người dùng</li>
              <li class="dropdown">
                <a href="{{ route('admin.nguoidung') }}" ><i data-feather="users"></i><span>Quản lý người dùng</span></a>     
              </li>
              @endif
              <li class="menu-header">Sản phẩm</li>
              <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fas fa-boxes"></i><span>Quản lý sản phẩm</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{ route('admin.sanpham') }}">Sản phẩm</a></li>
                  <li><a class="nav-link" href="{{ route('admin.danhgia') }}">Đánh giá </a></li>
                  <li><a class="nav-link" href="{{ route('admin.khuyenmai') }}">Khuyễn mãi</a></li>
                </ul>
              </li>

              @if(Auth::user()->role === 'admin')
              <li class="menu-header">Đặt hàng</li>
              <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="shopping-cart"></i><span>Quản lý đặt hàng</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{ route('admin.tinhtrang') }}">Tình trạng đơn hàng</a></li>
                  <li><a class="nav-link" href="{{ route('admin.donhang') }}">Đơn hàng </a></li>
                </ul>
              </li>

              <li class="menu-header">Gmail</li>
              <li class="dropdown">
                <a href="{{ route('admin.gmail') }}"><i data-feather="mail"></i><span>Quản lý Gmail</span></a>
               
              </li>

              <li class="menu-header">Thống kê báo cáo</li>
              <li class="dropdown">
                <a href="{{route('admin.donhang.doanhthu')}}"><i data-feather="bar-chart"></i><span>
                    Thống kê doanh thu</span>
                </a>          
              </li>
              @endif
              <li class="menu-header">Tài khoản</li>
              <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="user-check"></i><span>{{Auth::user()->name}}</span></a>
                <ul class="dropdown-menu">
                <li><a href="{{route('admin.nguoidung.info',['name' => Auth::user()->name ])}}">Thông tin cá nhân</a></li>

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
      <div class="main-content">
        @yield('content')       
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

  <script src="{{ asset('public/admin/js/app.min.js')}}"></script>
  <script src="{{ asset('public/admin/bundles/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{ asset('public/admin/js/page/index.js')}}"></script>
  <script src="{{ asset('public/admin/js/scripts.js')}}"></script>
  <script src="{{ asset('public/admin/js/custom.js')}}"></script>
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
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
  <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
  <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
  <script src="https://unpkg.com/chart.js@^2.9.3/dist/Chart.min.js"></script>
  <script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>
  
  @yield('javascript')
</body>
</html>