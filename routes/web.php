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
use App\Http\Controllers\ChatLieuController;
use App\Http\Controllers\HinhAnhController;
use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\BinhluanController;
use App\Http\Controllers\ChuDeController;


Auth::routes();

// Trang chủ
Route::get('/', [HomeController::class, 'getHome'])->name('frontend');

// Trang quản trị
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() {

    // Trang chủ quản trị
    Route::get('/home', [AdminController::class, 'getHome'])->name('home');
    Route::get('/403', [AdminController::class, 'getForbidden'])->name('forbidden');

    // Quản lý Loại sản phẩm
    Route::get('/loaisanpham', [LoaiSanPhamController::class, 'getDanhSach'])->name('loaisanpham');
    Route::get('/loaisanpham/them', [LoaiSanPhamController::class, 'getThem'])->name('loaisanpham.them');
    Route::post('/loaisanpham/them', [LoaiSanPhamController::class, 'postThem'])->name('loaisanpham.them');
    Route::get('/loaisanpham/sua/{id}', [LoaiSanPhamController::class, 'getSua'])->name('loaisanpham.sua');
    Route::post('/loaisanpham/sua/{id}', [LoaiSanPhamController::class, 'postSua'])->name('loaisanpham.sua');
    Route::get('/loaisanpham/xoa/{id}', [LoaiSanPhamController::class, 'getXoa'])->name('loaisanpham.xoa');

    // Quản lý chất liệu
    Route::get('/chatlieu', [ChatLieuController::class, 'getDanhSach'])->name('chatlieu');
    Route::get('/chatlieu/them', [ChatLieuController::class, 'getThem'])->name('chatlieu.them');
    Route::post('/chatlieu/them', [ChatLieuController::class, 'postThem'])->name('chatlieu.them');
    Route::get('/chatlieu/sua/{id}', [ChatLieuController::class, 'getSua'])->name('chatlieu.sua');
    Route::post('/chatlieu/sua/{id}', [ChatLieuController::class, 'postSua'])->name('chatlieu.sua');
    Route::get('/chatlieu/xoa/{id}', [ChatLieuController::class, 'getXoa'])->name('chatlieu.xoa');
    Route::post('/chatlieu/nhap', [ChatLieuController::class, 'postNhap'])->name('chatlieu.nhap');

    // Quản lý Hãng sản xuất
    Route::get('/hangsanxuat', [HangSanXuatController::class, 'getDanhSach'])->name('hangsanxuat');
    Route::get('/hangsanxuat/them', [HangSanXuatController::class, 'getThem'])->name('hangsanxuat.them');
    Route::post('/hangsanxuat/them', [HangSanXuatController::class, 'postThem'])->name('hangsanxuat.them');
    Route::get('/hangsanxuat/sua/{id}', [HangSanXuatController::class, 'getSua'])->name('hangsanxuat.sua');
    Route::post('/hangsanxuat/sua/{id}', [HangSanXuatController::class, 'postSua'])->name('hangsanxuat.sua');
    Route::get('/hangsanxuat/xoa/{id}', [HangSanXuatController::class, 'getXoa'])->name('hangsanxuat.xoa');
    Route::post('/hangsanxuat/nhap', [HangSanXuatController::class, 'postNhap'])->name('hangsanxuat.nhap');
    Route::get('/hangsanxuat/xuat', [HangSanXuatController::class, 'getXuat'])->name('hangsanxuat.xuat');
    
    // Quản lý Tình trạng đơn hàng
    Route::get('/tinhtrang', [TinhTrangController::class, 'getDanhSach'])->name('tinhtrang');
    Route::get('/tinhtrang/them', [TinhTrangController::class, 'getThem'])->name('tinhtrang.them');
    Route::post('/tinhtrang/them', [TinhTrangController::class, 'postThem'])->name('tinhtrang.them');
    Route::get('/tinhtrang/sua/{id}', [TinhTrangController::class, 'getSua'])->name('tinhtrang.sua');
    Route::post('/tinhtrang/sua/{id}', [TinhTrangController::class, 'postSua'])->name('tinhtrang.sua');
    Route::get('/tinhtrang/xoa/{id}', [TinhTrangController::class, 'getXoa'])->name('tinhtrang.xoa');
    
    // Quản lý Sản phẩm
    Route::get('/sanpham', [SanPhamController::class, 'getDanhSach'])->name('sanpham');
    Route::get('/sanpham/them', [SanPhamController::class, 'getThem'])->name('sanpham.them');
    Route::post('/sanpham/them', [SanPhamController::class, 'postThem'])->name('sanpham.them');
    Route::get('/sanpham/sua/{id}', [SanPhamController::class, 'getSua'])->name('sanpham.sua');
    Route::post('/sanpham/sua/{id}', [SanPhamController::class, 'postSua'])->name('sanpham.sua');
    Route::get('/sanpham/xoa/{id}', [SanPhamController::class, 'getXoa'])->name('sanpham.xoa');
    Route::post('/sanpham/nhap', [SanPhamController::class, 'postNhap'])->name('sanpham.nhap');
    Route::get('/sanpham/xuat', [SanPhamController::class, 'getXuat'])->name('sanpham.xuat');
    Route::get('/sanpham/OnOffHienThi/{id}', [SanPhamController::class, 'getOnOffHienThi'])->name('sanpham.OnOffHienThi');
    Route::get('/sanphamghet/xuat', [SanPhamController::class, 'getXuatSanPhamHet'])->name('sanpham.het.xuat');

    // Quản lý chủ đề
    Route::get('/chude', [ChuDeController::class, 'getDanhSach'])->name('chude');
    Route::get('/chude/them', [ChuDeController::class, 'getThem'])->name('chude.them');
    Route::post('/chude/them', [ChuDeController::class, 'postThem'])->name('chude.them');
    Route::get('/chude/sua/{id}', [ChuDeController::class, 'getSua'])->name('chude.sua');
    Route::post('/chude/sua/{id}', [ChuDeController::class, 'postSua'])->name('chude.sua');
    Route::get('/chude/xoa/{id}', [ChuDeController::class, 'getXoa'])->name('chude.xoa');
    
    // Quản lý bài viết
    Route::get('/baiviet', [BaiVietController::class, 'getDanhSach'])->name('baiviet');
    Route::get('/baiviet/them', [BaiVietController::class, 'getThem'])->name('baiviet.them');
    Route::post('/baiviet/them', [BaiVietController::class, 'postThem'])->name('baiviet.them');
    Route::get('/baiviet/sua/{id}', [BaiVietController::class, 'getSua'])->name('baiviet.sua');
    Route::post('/baiviet/sua/{id}', [BaiVietController::class, 'postSua'])->name('baiviet.sua');
    Route::get('/baiviet/xoa/{id}', [BaiVietController::class, 'getXoa'])->name('baiviet.xoa');
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