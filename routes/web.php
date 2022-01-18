<?php

use App\Http\Controllers\HomeController; 
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\LoaiSanPhamController; 
use App\Http\Controllers\HangSanXuatController; 
use App\Http\Controllers\TinhTrangController; 
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\DonHangChiTietController;
use App\Http\Controllers\NoiSanXuatController;
use App\Http\Controllers\HinhAnhController;
use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\BinhluanController;
use App\Http\Controllers\ChuDeController;
use App\Http\Controllers\SlidesController;
use App\Http\Controllers\DanhMucController;


Auth::routes();

// Trang chủ
Route::get('/', [HomeController::class, 'getHome'])->name('frontend');

// Trang tài khoản khách hàng
Route::prefix('khach-hang')->group(function() {
    // Trang chủ tài khoản khách hàng
    Route::get('/', [KhachHangController::class, 'getHome'])->name('khachhang');
    
    // Xem và cập nhật trạng thái đơn hàng
    Route::get('/donhang', [KhachHangController::class, 'getDonHang'])->name('khachhang.donhang');
    Route::get('/don-hang/{id}', [KhachHangController::class, 'getDonHang_ChiTiet'])->name('khachhang.donhang.chitiet');
    Route::post('/don-hang/{id}', [KhachHangController::class, 'postDonHang_ChiTiet'])->name('khachhang.donhang.chitiet');
    Route::get('/donhang-huy/{id}', [KhachHangController::class, 'getDonHangHuy'])->name('khachhang.donhang.huy');

    // Xem và cập nhật mật khẩu
	Route::get('/matkhau', [KhachHangController::class, 'getMatKhau'])->name('khachhang.matkhau');
	Route::post('/matkhau', [KhachHangController::class, 'postMatKhau'])->name('khachhang.matkhau');

    // Cập nhật thông tin tài khoản
	Route::get('/hoso', [KhachHangController::class, 'getHoSo'])->name('khachhang.hoso');
	Route::post('/hoso', [KhachHangController::class, 'postHoSo'])->name('khachhang.hoso');	
});

// Trang quản trị
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() {

    // Trang chủ quản trị
    Route::get('/home', [AdminController::class, 'getHome'])->name('home');
    Route::get('/403', [AdminController::class, 'getForbidden'])->name('forbidden');

    // Quản lý Slide
    Route::get('/slides', [SlidesController::class, 'getDanhSach'])->name('slides');
    Route::get('/slides/them', [SlidesController::class, 'getThem'])->name('slides.them');
    Route::post('/slides/them', [SlidesController::class, 'postThem'])->name('slides.them');
    Route::get('/slides/sua/{id}', [SlidesController::class, 'getSua'])->name('slides.sua');
    Route::post('/slides/sua/{id}', [SlidesController::class, 'postSua'])->name('slides.sua');
    Route::post('/slides/xoa', [SlidesController::class, 'postXoa'])->name('slides.xoa');
    Route::get('/slides/hiethi/{id}', [SlidesController::class, 'getHienThi'])->name('slides.hienthi');
    Route::post('/slides/ajax', [SlidesController::class, 'postHinhAnhAjax'])->name('slides.ajax');
    Route::get('/slides/OnOffHienThi/{id}', [SlidesController::class, 'getOnOffHienThi'])->name('slides.OnOffHienThi');

     // Quản lý danh mục
    Route::get('/danhmuc', [DanhMucController::class, 'getDanhSach'])->name('danhmuc');
    Route::get('/danhmuc/them', [DanhMucController::class, 'getThem'])->name('danhmuc.them');
    Route::post('/danhmuc/them', [DanhMucController::class, 'postThem'])->name('danhmuc.them');
    Route::get('/danhmuc/sua/{id}', [DanhMucController::class, 'getSua'])->name('danhmuc.sua');
    Route::post('/danhmuc/sua/{id}', [DanhMucController::class, 'postSua'])->name('danhmuc.sua');
    Route::post('/danhmuc/xoa', [DanhMucController::class, 'postXoa'])->name('danhmuc.xoa');
    // Quản lý Loại sản phẩm
    Route::get('/loaisanpham', [LoaiSanPhamController::class, 'getDanhSach'])->name('loaisanpham');
    Route::get('/loaisanpham/them', [LoaiSanPhamController::class, 'getThem'])->name('loaisanpham.them');
    Route::post('/loaisanpham/them', [LoaiSanPhamController::class, 'postThem'])->name('loaisanpham.them');
    Route::get('/loaisanpham/sua/{id}', [LoaiSanPhamController::class, 'getSua'])->name('loaisanpham.sua');
    Route::post('/loaisanpham/sua/{id}', [LoaiSanPhamController::class, 'postSua'])->name('loaisanpham.sua');
    Route::post('/loaisanpham/xoa', [LoaiSanPhamController::class, 'postXoa'])->name('loaisanpham.xoa');

    // Quản lý chất liệu
    Route::get('/noisanxuat', [NoiSanXuatController::class, 'getDanhSach'])->name('noisanxuat');
    Route::get('/noisanxuat/them', [NoiSanXuatController::class, 'getThem'])->name('noisanxuat.them');
    Route::post('/noisanxuat/them', [NoiSanXuatController::class, 'postThem'])->name('noisanxuat.them');
    Route::get('/noisanxuat/sua/{id}', [NoiSanXuatController::class, 'getSua'])->name('noisanxuat.sua');
    Route::post('/noisanxuat/sua/{id}', [NoiSanXuatController::class, 'postSua'])->name('noisanxuat.sua');
    Route::post('/noisanxuat/xoa', [NoiSanXuatController::class, 'postXoa'])->name('noisanxuat.xoa');
    Route::post('/noisanxuat/nhap', [NoiSanXuatController::class, 'postNhap'])->name('noisanxuat.nhap');

    // Quản lý Hãng sản xuất
    Route::get('/hangsanxuat', [HangSanXuatController::class, 'getDanhSach'])->name('hangsanxuat');
    Route::get('/hangsanxuat/them', [HangSanXuatController::class, 'getThem'])->name('hangsanxuat.them');
    Route::post('/hangsanxuat/them', [HangSanXuatController::class, 'postThem'])->name('hangsanxuat.them');
    Route::get('/hangsanxuat/sua/{id}', [HangSanXuatController::class, 'getSua'])->name('hangsanxuat.sua');
    Route::post('/hangsanxuat/sua/{id}', [HangSanXuatController::class, 'postSua'])->name('hangsanxuat.sua');
    Route::post('/hangsanxuat/xoa', [HangSanXuatController::class, 'postXoa'])->name('hangsanxuat.xoa');
    Route::post('/hangsanxuat/nhap', [HangSanXuatController::class, 'postNhap'])->name('hangsanxuat.nhap');
    Route::get('/hangsanxuat/xuat', [HangSanXuatController::class, 'getXuat'])->name('hangsanxuat.xuat');
    Route::post('/hangsanxuat/ajax', [HangSanXuatController::class, 'postHinhAnhAjax'])->name('hangsanxuat.ajax');

    // Quản lý Tình trạng đơn hàng
    Route::get('/tinhtrang', [TinhTrangController::class, 'getDanhSach'])->name('tinhtrang');
    Route::get('/tinhtrang/them', [TinhTrangController::class, 'getThem'])->name('tinhtrang.them');
    Route::post('/tinhtrang/them', [TinhTrangController::class, 'postThem'])->name('tinhtrang.them');
    Route::get('/tinhtrang/sua/{id}', [TinhTrangController::class, 'getSua'])->name('tinhtrang.sua');
    Route::post('/tinhtrang/sua/{id}', [TinhTrangController::class, 'postSua'])->name('tinhtrang.sua');
    Route::post('/tinhtrang/xoa', [TinhTrangController::class, 'postXoa'])->name('tinhtrang.xoa');
    
    // Quản lý Sản phẩm
    Route::get('/sanpham', [SanPhamController::class, 'getDanhSach'])->name('sanpham');
    Route::get('/sanpham/them', [SanPhamController::class, 'getThem'])->name('sanpham.them');
    Route::post('/sanpham/them', [SanPhamController::class, 'postThem'])->name('sanpham.them');
    Route::get('/sanpham/sua/{id}', [SanPhamController::class, 'getSua'])->name('sanpham.sua');
    Route::post('/sanpham/sua/{id}', [SanPhamController::class, 'postSua'])->name('sanpham.sua');
    Route::post('/sanpham/xoa', [SanPhamController::class, 'postXoa'])->name('sanpham.xoa');
    Route::post('/sanpham/nhap', [SanPhamController::class, 'postNhap'])->name('sanpham.nhap');
    Route::get('/sanpham/xuat', [SanPhamController::class, 'getXuat'])->name('sanpham.xuat');
    Route::get('/sanpham/OnOffHienThi/{id}', [SanPhamController::class, 'getOnOffHienThi'])->name('sanpham.OnOffHienThi');
    Route::get('/sanphamghet/xuat', [SanPhamController::class, 'getXuatSanPhamHet'])->name('sanpham.het.xuat');
    Route::post('/sanphamghet/ajax', [SanPhamController::class, 'postHinhAnhSanPhamAjax'])->name('sanpham.hinhanh.ajax');
    Route::get('/sanphamloai', [SanPhamController::class, 'getLoai'])->name('sanpham.loai');
    Route::get('/sanphamdanhmuc', [SanPhamController::class, 'getDanhMuc'])->name('sanpham.danhmuc');

    // Quản lý chủ đề
    Route::get('/chude', [ChuDeController::class, 'getDanhSach'])->name('chude');
    Route::get('/chude/them', [ChuDeController::class, 'getThem'])->name('chude.them');
    Route::post('/chude/them', [ChuDeController::class, 'postThem'])->name('chude.them');
    Route::get('/chude/sua/{id}', [ChuDeController::class, 'getSua'])->name('chude.sua');
    Route::post('/chude/sua/{id}', [ChuDeController::class, 'postSua'])->name('chude.sua');
    Route::post('/chude/xoa', [ChuDeController::class, 'postXoa'])->name('chude.xoa');
    
    // Quản lý bài viết
    Route::get('/baiviet', [BaiVietController::class, 'getDanhSach'])->name('baiviet');
    Route::get('/baiviet/them', [BaiVietController::class, 'getThem'])->name('baiviet.them');
    Route::post('/baiviet/them', [BaiVietController::class, 'postThem'])->name('baiviet.them');
    Route::get('/baiviet/sua/{id}', [BaiVietController::class, 'getSua'])->name('baiviet.sua');
    Route::post('/baiviet/sua/{id}', [BaiVietController::class, 'postSua'])->name('baiviet.sua');
    Route::post('/baiviet/xoa', [BaiVietController::class, 'postXoa'])->name('baiviet.xoa');
    Route::get('/baiviet/OnOffDuyet/{id}', [BaiVietController::class, 'getOnOffDuyet'])->name('baiviet.OnOffDuyet');
    Route::get('/baiviet/OnOffHienThi/{id}', [BaiVietController::class, 'getOnOffHienThi'])->name('baiviet.OnOffHienThi');
    Route::get('/baiviet/OnOffBinhLuan/{id}', [BaiVietController::class, 'getOnOffBinhLuan'])->name('baiviet.OnOffBinhLuan');
    Route::get('/baiviet/sua/info/{id}', [BaiVietController::class, 'getSuaBaiVietInfo'])->name('baiviet.sua.info');
    Route::post('/baiviet/sua/info/{id}', [BaiVietController::class, 'postSuaBaiVietInfo'])->name('baiviet.sua.info');
    Route::get('/baiviet/xoa/info/{id}', [BaiVietController::class, 'getXoaInfo'])->name('baiviet.xoa.info');

    // Quản lý bình luận
    Route::get('/binhluan', [BinhLuanController::class, 'getDanhSach'])->name('binhluan.danhsach');
    Route::get('/binhluan/{tieude_slug}', [BinhLuanController::class, 'getDanhSach'])->name('binhluan');
    Route::get('/binhluan/them', [BinhLuanController::class, 'getThem'])->name('binhluan.them');
    Route::post('/binhluan/them', [BinhLuanController::class, 'postThem'])->name('binhluan.them');
    Route::get('/binhluan/sua/{id}', [BinhLuanController::class, 'getSua'])->name('binhluan.sua');
    Route::post('/binhluan/sua/{id}', [BinhLuanController::class, 'postSua'])->name('binhluan.sua');
    Route::get('/binhluan/xoa/{id}', [BinhLuanController::class, 'getXoa'])->name('binhluan.xoa');
    Route::get('/binhluan/OnOffDuyet/{id}', [BinhLuanController::class, 'getOnOffDuyet'])->name('binhluan.OnOffDuyet');

    // Quản lý hình ảnh
    Route::get('/hinhanh/{tensanpham_slug}', [HinhAnhController::class, 'getDanhSach'])->name('hinhanh');
    Route::get('/hinhanh/them/{tensanpham_slug}', [HinhAnhController::class, 'getThem'])->name('hinhanh.them');
    Route::post('/hinhanh/them/{tensanpham_slug}', [HinhAnhController::class, 'postThem'])->name('hinhanh.them');
    Route::get('/hinhanh/sua/{id}', [HinhAnhController::class, 'getSua'])->name('hinhanh.sua');
    Route::post('/hinhanh/sua/{id}', [HinhAnhController::class, 'postSua'])->name('hinhanh.sua');
    Route::get('/hinhanh/xoa/{id}', [HinhAnhController::class, 'getXoa'])->name('hinhanh.xoa');

    // Quản lý Đơn hàng
    Route::get('/donhang', [DonHangController::class, 'getDanhSach'])->name('donhang');
    Route::get('/donhang/them', [DonHangController::class, 'getThem'])->name('donhang.them');
    Route::post('/donhang/them', [DonHangController::class, 'postThem'])->name('donhang.them');
    Route::get('/donhang/sua/{id}', [DonHangController::class, 'getSua'])->name('donhang.sua');
    Route::post('/donhang/sua/{id}', [DonHangController::class, 'postSua'])->name('donhang.sua');
    Route::get('/donhang/xoa/{id}', [DonHangController::class, 'getXoa'])->name('donhang.xoa');
    Route::get('/donhang/moi', [DonHangController::class, 'getDanhSachDonHangMoi'])->name('donhang.moi');
    Route::post('/donhang/trangthai/{id}', [DonHangController::class, 'postTrangThai'])->name('donhang.trangthai');
    Route::get('/donhang/doanhthu', [DonHangController::class, 'getDoanhThu'])->name('donhang.doanhthu');
    Route::get('/donhang/thongdoanhthu', [DonHangController::class, 'getDoanhThu'])->name('donhang.thongkedoanhthu');
    Route::get('/donhang/ngay', [DonHangController::class, 'getDanhSachNgay'])->name('donhang.ngay');

    // Quản lý Đơn hàng chi tiết
    Route::get('/donhang/chitiet/{id}', [DonHangChiTietController::class, 'getDanhSach'])->name('donhang.chitiet');
    Route::get('/donhang/chitiet/sua/{id}', [DonHangChiTietController::class, 'getSua'])->name('donhang.chitiet.sua');
    Route::post('/donhang/chitiet/sua/{id}', [DonHangChiTietController::class, 'postSua'])->name('donhang.chitiet.sua');
    Route::get('/donhang/chitiet/xoa/{id}', [DonHangChiTietController::class, 'getXoa'])->name('donhang.chitiet.xoa');
    
    // Quản lý Tài khoản người dùng
    Route::get('/nguoidung', [UserController::class, 'getDanhSach'])->name('nguoidung');
    Route::get('/nguoidung/them', [UserController::class, 'getThem'])->name('nguoidung.them');
    Route::post('/nguoidung/them', [UserController::class, 'postThem'])->name('nguoidung.them');
    Route::get('/nguoidung/sua/{id}', [UserController::class, 'getSua'])->name('nguoidung.sua');
    Route::post('/nguoidung/sua/{id}', [UserController::class, 'postSua'])->name('nguoidung.sua');
    Route::get('/nguoidung/xoa/{id}', [UserController::class, 'getXoa'])->name('nguoidung.xoa');
    Route::post('/nguoidung/nhap', [UserController::class, 'postNhap'])->name('nguoidung.nhap');
    Route::post('/nguoidung/xuat', [UserController::class, 'postXuat'])->name('nguoidung.xuat');
    Route::get('/nguoidung/info/{name}', [UserController::class, 'getInfo'])->name('nguoidung.info');
    Route::post('/nguoidung/sua/info/{id}', [UserController::class, 'postSuaInfo'])->name('nguoidung.sua.info');


});