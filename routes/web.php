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
use App\Http\Controllers\NhomSanPhamController;
use App\Http\Controllers\LienHeController;
use App\Http\Controllers\KhuyenMaiController;
use App\Http\Controllers\DanhGiaSanPhamController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\VerifyEmailController;

Auth::routes(['verify' => true]);
// Trang chủ
Route::get('/', [HomeController::class, 'getHome'])->name('frontend');

// Trang sản phẩm
Route::get('/collections/{danhmuc_slug}', [HomeController::class, 'getSanPham'])->name('frontend.sanpham');
Route::get('/san-pham/{tensanpham_slug}', [HomeController::class, 'getSanPham_ChiTiet'])->name('frontend.sanpham.chitiet');
Route::get('/san-pham/category/{nhomsanpham}', [HomeController::class, 'getSanPham_Nhom'])->name('frontend.sanpham.nhom');
Route::get('/san-pham/type/{nhomsanpham}/{loaisanpham}', [HomeController::class, 'getSanPham_LoaiSanPham'])->name('frontend.sanpham.loai');
Route::get('/ajax-search', [HomeController::class, 'selectSearch'])->name('frontend.selectSearch');
Route::get('/tim-kiem', [HomeController::class, 'getTimKiemSanPham'])->name('frontend.timkiemsanpham');
Route::get('/san-pham/hang-san-xuat/{hangsanxuat}', [HomeController::class, 'getSanPham_HangSanXuat'])->name('frontend.hangsanxuat');


// Trang giỏ hàng
Route::get('/gio-hang', [HomeController::class, 'getGioHang'])->name('frontend.giohang');
Route::get('/gio-hang/them/{tensanpham_slug}', [HomeController::class, 'getGioHang_Them'])->name('frontend.giohang.them');
Route::get('/gio-hang/them/chitiet/{tensanpham_slug}', [HomeController::class, 'getGioHang_ThemChiTiet'])->name('frontend.giohang.them.chitiet');
Route::get('/gio-hang/xoa', [HomeController::class, 'getGioHang_XoaTatCa'])->name('frontend.giohang.xoatatca');
Route::get('/gio-hang/xoa/{row_id}', [HomeController::class, 'getGioHang_Xoa'])->name('frontend.giohang.xoa');
Route::get('/gio-hang/giam/{row_id}', [HomeController::class, 'getGioHang_Giam'])->name('frontend.giohang.giam');
Route::get('/gio-hang/tang/{row_id}', [HomeController::class, 'getGioHang_Tang'])->name('frontend.giohang.tang');

// Trang đặt hàng
Route::get('/dat-hang', [HomeController::class, 'getDatHang'])->name('frontend.dathang');
Route::post('/dat-hang', [HomeController::class, 'postDatHang'])->name('frontend.dathang');
Route::get('/dat-hang-thanh-cong', [HomeController::class, 'getDatHangThanhCong'])->name('frontend.dathangthanhcong');

//Tin tức
Route::get('/tin-tuc', [HomeController::class, 'getBaiViet'])->name('frontend.baiviet');
Route::get('/tin-tuc/{tieude_slug}', [HomeController::class, 'getBaiViet_ChiTiet'])->name('frontend.baiviet_chitiet');
Route::get('/tin-tuc/chu-de/{chude}', [HomeController::class, 'getBaiViet'])->name('frontend.baiviet_chude');

//Bình luận
Route::get('/binh-luan/{tieude_slug}', [HomeController::class, 'getBinhLuan'])->name('frontend.binhluan');

// Liên hệ
Route::get('/lien-he', [HomeController::class, 'getLienHe'])->name('frontend.lienhe');
Route::post('/lien-he/ho-tro', [HomeController::class, 'postHoTro'])->name('frontend.hotro');

//khuyễn mãi
Route::post('/khuyen-mai', [HomeController::class, 'postKhuyenMai'])->name('frontend.khuyenmai');

//Đánh giá sản phẩm
Route::post('/danh-gia/{tensanpham_slug}', [HomeController::class, 'postDanhGia'])->name('frontend.danhgia');

// Trang khách hàng
Route::get('/khach-hang/dang-ky', [HomeController::class, 'getDangKy'])->name('khachhang.dangky');
Route::get('/khach-hang/dang-nhap', [HomeController::class, 'getDangNhap'])->name('khachhang.dangnhap');

// Google OAuth
Route::get('/login/google', [HomeController::class, 'getGoogleLogin'])->name('google.login');
Route::get('/login/google/callback', [HomeController::class, 'getGoogleCallback'])->name('google.callback');

// Trang tài khoản khách hàng
Route::prefix('khach-hang')->group(function() {
    // Trang chủ tài khoản khách hàng
    Route::get('/', [KhachHangController::class, 'getHome'])->name('khachhang');
    
    // Xem và cập nhật trạng thái đơn hàng
    Route::get('/donhang', [KhachHangController::class, 'getDonHang'])->name('khachhang.donhang');
    Route::get('/don-hang/{id}', [KhachHangController::class, 'getDonHang_ChiTiet'])->name('khachhang.donhang.chitiet');
    Route::get('/donhang-huy/{id}', [KhachHangController::class, 'getDonHangHuy'])->name('khachhang.donhang.huy');

    // Xem và cập nhật mật khẩu
	Route::get('/matkhau', [KhachHangController::class, 'getMatKhau'])->name('khachhang.matkhau');
	Route::post('/matkhau', [KhachHangController::class, 'postMatKhau'])->name('khachhang.matkhau');

    // Cập nhật thông tin tài khoản
	Route::post('/hoso', [KhachHangController::class, 'postHoSo'])->name('khachhang.hoso');	
});

// Trang quản trị
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() {

    // Trang chủ quản trị
    Route::get('/home', [AdminController::class, 'getHome'])->name('home');
    Route::get('/403', [AdminController::class, 'getForbidden'])->name('forbidden');

    // Quản lý Slide
    Route::get('/slides', [SlidesController::class, 'getDanhSach'])->name('slides')->middleware('nhanvien');
    Route::get('/slides/them', [SlidesController::class, 'getThem'])->name('slides.them')->middleware('nhanvien');
    Route::post('/slides/them', [SlidesController::class, 'postThem'])->name('slides.them')->middleware('nhanvien');
    Route::get('/slides/sua/{id}', [SlidesController::class, 'getSua'])->name('slides.sua')->middleware('nhanvien');
    Route::post('/slides/sua/{id}', [SlidesController::class, 'postSua'])->name('slides.sua')->middleware('nhanvien');
    Route::post('/slides/xoa', [SlidesController::class, 'postXoa'])->name('slides.xoa')->middleware('nhanvien');
    Route::get('/slides/hiethi/{id}', [SlidesController::class, 'getHienThi'])->name('slides.hienthi')->middleware('nhanvien');
    Route::post('/slides/ajax', [SlidesController::class, 'postHinhAnhAjax'])->name('slides.ajax')->middleware('nhanvien');
    Route::get('/slides/OnOffHienThi/{id}', [SlidesController::class, 'getOnOffHienThi'])->name('slides.OnOffHienThi')->middleware('admin');

    // Quản lý danh mục
    Route::get('/danhmuc', [DanhMucController::class, 'getDanhSach'])->name('danhmuc')->middleware('nhanvien');
    Route::get('/danhmuc/them', [DanhMucController::class, 'getThem'])->name('danhmuc.them')->middleware('nhanvien');
    Route::post('/danhmuc/them', [DanhMucController::class, 'postThem'])->name('danhmuc.them')->middleware('nhanvien');
    Route::get('/danhmuc/sua/{id}', [DanhMucController::class, 'getSua'])->name('danhmuc.sua')->middleware('nhanvien');
    Route::post('/danhmuc/sua/{id}', [DanhMucController::class, 'postSua'])->name('danhmuc.sua')->middleware('nhanvien');
    Route::post('/danhmuc/xoa', [DanhMucController::class, 'postXoa'])->name('danhmuc.xoa')->middleware('nhanvien');
    
    // Quản lý Loại sản phẩm
    Route::get('/nhomsanpham', [NhomSanPhamController::class, 'getDanhSach'])->name('nhomsanpham')->middleware('nhanvien');
    Route::get('/nhomsanpham/them', [NhomSanPhamController::class, 'getThem'])->name('nhomsanpham.them')->middleware('nhanvien');
    Route::post('/nhomsanpham/them', [NhomSanPhamController::class, 'postThem'])->name('nhomsanpham.them')->middleware('nhanvien');
    Route::get('/nhomsanpham/sua/{id}', [NhomSanPhamController::class, 'getSua'])->name('nhomsanpham.sua')->middleware('nhanvien');
    Route::post('/nhomsanpham/sua/{id}', [NhomSanPhamController::class, 'postSua'])->name('nhomsanpham.sua')->middleware('nhanvien');
    Route::post('/nhomsanpham/xoa', [NhomSanPhamController::class, 'postXoa'])->name('nhomsanpham.xoa')->middleware('nhanvien');
    
    // Quản lý Loại sản phẩm
    Route::get('/loaisanpham', [LoaiSanPhamController::class, 'getDanhSach'])->name('loaisanpham')->middleware('nhanvien');
    Route::get('/loaisanpham/them', [LoaiSanPhamController::class, 'getThem'])->name('loaisanpham.them')->middleware('nhanvien');
    Route::post('/loaisanpham/them', [LoaiSanPhamController::class, 'postThem'])->name('loaisanpham.them')->middleware('nhanvien');
    Route::get('/loaisanpham/sua/{id}', [LoaiSanPhamController::class, 'getSua'])->name('loaisanpham.sua')->middleware('nhanvien');
    Route::post('/loaisanpham/sua/{id}', [LoaiSanPhamController::class, 'postSua'])->name('loaisanpham.sua')->middleware('nhanvien');
    Route::post('/loaisanpham/xoa', [LoaiSanPhamController::class, 'postXoa'])->name('loaisanpham.xoa')->middleware('nhanvien');
    Route::get('/loaisanpham/nhomsanpham', [SanPhamController::class, 'getNhomSanPham'])->name('loaisanpham.nhomsanpham')->middleware('nhanvien');
    Route::get('/loaisanphamdanhmuc', [SanPhamController::class, 'getNhomSanPhamSua'])->name('loaisanpham.nhom.sua')->middleware('nhanvien');
    Route::get('/loaisanphamnhomsua', [SanPhamController::class, 'getDanhMucSua'])->name('loaisanpham.danhmuc.sua')->middleware('nhanvien');

    // Quản lý chất liệu
    Route::get('/noisanxuat', [NoiSanXuatController::class, 'getDanhSach'])->name('noisanxuat')->middleware('nhanvien');
    Route::get('/noisanxuat/them', [NoiSanXuatController::class, 'getThem'])->name('noisanxuat.them')->middleware('nhanvien');
    Route::post('/noisanxuat/them', [NoiSanXuatController::class, 'postThem'])->name('noisanxuat.them')->middleware('nhanvien');
    Route::get('/noisanxuat/sua/{id}', [NoiSanXuatController::class, 'getSua'])->name('noisanxuat.sua')->middleware('nhanvien');
    Route::post('/noisanxuat/sua/{id}', [NoiSanXuatController::class, 'postSua'])->name('noisanxuat.sua')->middleware('nhanvien');
    Route::post('/noisanxuat/xoa', [NoiSanXuatController::class, 'postXoa'])->name('noisanxuat.xoa')->middleware('nhanvien');
    Route::post('/noisanxuat/nhap', [NoiSanXuatController::class, 'postNhap'])->name('noisanxuat.nhap')->middleware('nhanvien');

    // Quản lý Hãng sản xuất
    Route::get('/hangsanxuat', [HangSanXuatController::class, 'getDanhSach'])->name('hangsanxuat')->middleware('nhanvien');
    Route::get('/hangsanxuat/them', [HangSanXuatController::class, 'getThem'])->name('hangsanxuat.them')->middleware('nhanvien');
    Route::post('/hangsanxuat/them', [HangSanXuatController::class, 'postThem'])->name('hangsanxuat.them')->middleware('nhanvien');
    Route::get('/hangsanxuat/sua/{id}', [HangSanXuatController::class, 'getSua'])->name('hangsanxuat.sua')->middleware('nhanvien');
    Route::post('/hangsanxuat/sua/{id}', [HangSanXuatController::class, 'postSua'])->name('hangsanxuat.sua')->middleware('nhanvien');
    Route::post('/hangsanxuat/xoa', [HangSanXuatController::class, 'postXoa'])->name('hangsanxuat.xoa')->middleware('nhanvien');
    Route::post('/hangsanxuat/nhap', [HangSanXuatController::class, 'postNhap'])->name('hangsanxuat.nhap')->middleware('nhanvien');
    Route::get('/hangsanxuat/xuat', [HangSanXuatController::class, 'getXuat'])->name('hangsanxuat.xuat')->middleware('nhanvien');
    Route::post('/hangsanxuat/ajax', [HangSanXuatController::class, 'postHinhAnhAjax'])->name('hangsanxuat.ajax')->middleware('nhanvien');

    // Quản lý Tình trạng đơn hàng
    Route::get('/tinhtrang', [TinhTrangController::class, 'getDanhSach'])->name('tinhtrang')->middleware('nhanvien');
    Route::get('/tinhtrang/them', [TinhTrangController::class, 'getThem'])->name('tinhtrang.them')->middleware('nhanvien') ;
    Route::post('/tinhtrang/them', [TinhTrangController::class, 'postThem'])->name('tinhtrang.them') ->middleware('nhanvien');
    Route::get('/tinhtrang/sua/{id}', [TinhTrangController::class, 'getSua'])->name('tinhtrang.sua') ->middleware('nhanvien');
    Route::post('/tinhtrang/sua/{id}', [TinhTrangController::class, 'postSua'])->name('tinhtrang.sua') ->middleware('nhanvien');
    Route::post('/tinhtrang/xoa', [TinhTrangController::class, 'postXoa'])->name('tinhtrang.xoa') ->middleware('nhanvien');
    
    // Quản lý Liên hệ
    Route::get('/lienhe', [LienHeController::class, 'getDanhSach'])->name('lienhe')->middleware('nhanvien') ;
    Route::get('/lienhe/phanhoi/{id}', [LienHeController::class, 'getPhanHoi'])->name('lienhe.phanhoi')->middleware('nhanvien');
    Route::post('/lienhe/phanhoi/{id}', [LienHeController::class, 'postPhanHoi'])->name('lienhe.phanhoi')->middleware('nhanvien') ;
    Route::post('/lienhe/xoa', [LienHeController::class, 'postXoa'])->name('lienhe.xoa')->middleware('nhanvien') ;
    Route::get('/lienhe/khuyenmai', [LienHeController::class, 'getDanhSachLienHeKhuyenMai'])->name('lienhe.khuyenmai')->middleware('nhanvien') ;
    Route::get('/lienhe/khuyenmai/{id}', [LienHeController::class, 'getKhuyenMai'])->name('lienhe.repkhuyenmai')->middleware('nhanvien') ;
    Route::post('/lienhe/khuyenmai/{id}', [LienHeController::class, 'postKhuyenMai'])->name('lienhe.repkhuyenmai')->middleware('nhanvien') ;
    
    // Quản lý khuyến mãi
    Route::get('/khuyenmai', [KhuyenMaiController::class, 'getDanhSach'])->name('khuyenmai')->middleware('nhanvien') ;
    Route::get('/khuyenmai/them', [KhuyenMaiController::class, 'getThem'])->name('khuyenmai.them')->middleware('nhanvien') ;
    Route::post('/khuyenmai/them', [KhuyenMaiController::class, 'postThem'])->name('khuyenmai.them')->middleware('nhanvien') ;
    Route::get('/khuyenmai/sua/{id}', [KhuyenMaiController::class, 'getSua'])->name('khuyenmai.sua')->middleware('nhanvien') ;
    Route::post('/khuyenmai/sua/{id}', [KhuyenMaiController::class, 'postSua'])->name('khuyenmai.sua')->middleware('nhanvien') ;
    Route::post('/khuyenmai/xoa', [KhuyenMaiController::class, 'postXoa'])->name('khuyenmai.xoa')->middleware('nhanvien') ;
    
    // Quản lý đánh giá sản phẩm
    Route::get('/danhgia', [DanhGiaSanPhamController::class, 'getDanhSach'])->name('danhgia')->middleware('nhanvien');
    Route::get('/danhgia/{tensanpham_slug}', [DanhGiaSanPhamController::class, 'getDanhSach_DanhGia'])->name('danhgia.danhsach')->middleware('nhanvien');
    Route::get('/danhgia/OnOffHienThi/{id}', [DanhGiaSanPhamController::class, 'getOnOffHienThi'])->name('danhgia.OnOffHienThi')->middleware('nhanvien');
    Route::post('/danhgia/xoa', [DanhGiaSanPhamController::class, 'postXoa'])->name('danhgia.xoa')->middleware('nhanvien');

    // Quản lý Sản phẩm
    Route::get('/sanpham', [SanPhamController::class, 'getDanhSach'])->name('sanpham')->middleware('nhanvien');
    Route::get('/sanpham/them', [SanPhamController::class, 'getThem'])->name('sanpham.them')->middleware('nhanvien');
    Route::post('/sanpham/them', [SanPhamController::class, 'postThem'])->name('sanpham.them')->middleware('nhanvien');
    Route::get('/sanpham/sua/{id}', [SanPhamController::class, 'getSua'])->name('sanpham.sua')->middleware('nhanvien');
    Route::post('/sanpham/sua/{id}', [SanPhamController::class, 'postSua'])->name('sanpham.sua')->middleware('nhanvien');
    Route::post('/sanpham/xoa', [SanPhamController::class, 'postXoa'])->name('sanpham.xoa')->middleware('nhanvien');
    Route::post('/sanpham/nhap', [SanPhamController::class, 'postNhap'])->name('sanpham.nhap')->middleware('nhanvien');
    Route::get('/sanpham/xuat', [SanPhamController::class, 'getXuat'])->name('sanpham.xuat')->middleware('nhanvien');
    Route::get('/sanpham/OnOffHienThi/{id}', [SanPhamController::class, 'getOnOffHienThi'])->name('sanpham.OnOffHienThi')->middleware('nhanvien');
    Route::get('/sanphamghet/xuat', [SanPhamController::class, 'getXuatSanPhamHet'])->name('sanpham.het.xuat')->middleware('nhanvien');
    Route::post('/sanphamghet/ajax', [SanPhamController::class, 'postHinhAnhSanPhamAjax'])->name('sanpham.hinhanh.ajax')->middleware('nhanvien');
    Route::get('/sanphamloai', [SanPhamController::class, 'getLoai'])->name('sanpham.loai')->middleware('nhanvien');
    Route::get('/sanphamdanhmuc', [SanPhamController::class, 'getNhomSanPhamSua'])->name('sanpham.nhom.sua')->middleware('nhanvien');
    Route::get('/sanphamnhomsanpham', [SanPhamController::class, 'getNhomSanPham'])->name('sanpham.nhomsanpham')->middleware('nhanvien');
    Route::get('/sanphamnhomsanphamsua', [SanPhamController::class, 'getDanhMucSua'])->name('sanpham.danhmuc.sua')->middleware('nhanvien');

    // Quản lý chủ đề
    Route::get('/chude', [ChuDeController::class, 'getDanhSach'])->name('chude')->middleware('nhanvien');
    Route::get('/chude/them', [ChuDeController::class, 'getThem'])->name('chude.them')->middleware('nhanvien');
    Route::post('/chude/them', [ChuDeController::class, 'postThem'])->name('chude.them')->middleware('nhanvien');
    Route::get('/chude/sua/{id}', [ChuDeController::class, 'getSua'])->name('chude.sua')->middleware('nhanvien');
    Route::post('/chude/sua/{id}', [ChuDeController::class, 'postSua'])->name('chude.sua')->middleware('nhanvien');
    Route::post('/chude/xoa', [ChuDeController::class, 'postXoa'])->name('chude.xoa')->middleware('nhanvien');
    
    // Quản lý bài viết
    Route::get('/baiviet', [BaiVietController::class, 'getDanhSach'])->name('baiviet')->middleware('nhanvien');
    Route::get('/baiviet/them', [BaiVietController::class, 'getThem'])->name('baiviet.them')->middleware('nhanvien');
    Route::post('/baiviet/them', [BaiVietController::class, 'postThem'])->name('baiviet.them')->middleware('nhanvien');
    Route::get('/baiviet/sua/{id}', [BaiVietController::class, 'getSua'])->name('baiviet.sua')->middleware('nhanvien');
    Route::post('/baiviet/sua/{id}', [BaiVietController::class, 'postSua'])->name('baiviet.sua')->middleware('nhanvien');
    Route::post('/baiviet/xoa', [BaiVietController::class, 'postXoa'])->name('baiviet.xoa')->middleware('nhanvien');
    Route::get('/baiviet/OnOffDuyet/{id}', [BaiVietController::class, 'getOnOffDuyet'])->name('baiviet.OnOffDuyet')->middleware('admin');
    Route::get('/baiviet/OnOffHienThi/{id}', [BaiVietController::class, 'getOnOffHienThi'])->name('baiviet.OnOffHienThi')->middleware('admin');
    Route::get('/baiviet/OnOffBinhLuan/{id}', [BaiVietController::class, 'getOnOffBinhLuan'])->name('baiviet.OnOffBinhLuan')->middleware('admin');
    Route::get('/baiviet/sua/info/{id}', [BaiVietController::class, 'getSuaBaiVietInfo'])->name('baiviet.sua.info')->middleware('nhanvien');
    Route::post('/baiviet/sua/info/{id}', [BaiVietController::class, 'postSuaBaiVietInfo'])->name('baiviet.sua.info')->middleware('nhanvien');
    Route::get('/baiviet/xoa/info/{id}', [BaiVietController::class, 'getXoaInfo'])->name('baiviet.xoa.info')->middleware('nhanvien');

    // Quản lý bình luận
    Route::get('/binhluan', [BinhLuanController::class, 'getDanhSach'])->name('binhluan.danhsach')->middleware('nhanvien');
    Route::get('/binhluan/{tieude_slug}', [BinhLuanController::class, 'getDanhSach'])->name('binhluan')->middleware('nhanvien');
    Route::get('/binhluan/them', [BinhLuanController::class, 'getThem'])->name('binhluan.them')->middleware('nhanvien');
    Route::post('/binhluan/them', [BinhLuanController::class, 'postThem'])->name('binhluan.them')->middleware('nhanvien');
    Route::get('/binhluan/sua/{id}', [BinhLuanController::class, 'getSua'])->name('binhluan.sua')->middleware('nhanvien');
    Route::post('/binhluan/sua/{id}', [BinhLuanController::class, 'postSua'])->name('binhluan.sua')->middleware('nhanvien');
    Route::get('/binhluan/xoa/{id}', [BinhLuanController::class, 'getXoa'])->name('binhluan.xoa')->middleware('nhanvien');
    Route::get('/binhluan/OnOffDuyet/{id}', [BinhLuanController::class, 'getOnOffDuyet'])->name('binhluan.OnOffDuyet')->middleware('admin');

    // Quản lý hình ảnh
    Route::get('/hinhanh/{tensanpham_slug}', [HinhAnhController::class, 'getDanhSach'])->name('hinhanh')->middleware('nhanvien');
    Route::get('/hinhanh/them/{tensanpham_slug}', [HinhAnhController::class, 'getThem'])->name('hinhanh.them')->middleware('nhanvien');
    Route::post('/hinhanh/them/{tensanpham_slug}', [HinhAnhController::class, 'postThem'])->name('hinhanh.them')->middleware('nhanvien');
    Route::get('/hinhanh/sua/{id}', [HinhAnhController::class, 'getSua'])->name('hinhanh.sua')->middleware('nhanvien');
    Route::post('/hinhanh/sua/{id}', [HinhAnhController::class, 'postSua'])->name('hinhanh.sua')->middleware('nhanvien');
    Route::get('/hinhanh/xoa/{id}', [HinhAnhController::class, 'getXoa'])->name('hinhanh.xoa')->middleware('nhanvien');

    // Quản lý Đơn hàng
    Route::get('/donhang', [DonHangController::class, 'getDanhSach'])->name('donhang')->middleware('nhanvien');
    Route::get('/donhang/them', [DonHangController::class, 'getThem'])->name('donhang.them')->middleware('nhanvien');
    Route::post('/donhang/them', [DonHangController::class, 'postThem'])->name('donhang.them')->middleware('nhanvien');
    Route::get('/donhang/sua/{id}', [DonHangController::class, 'getSua'])->name('donhang.sua')->middleware('nhanvien');
    Route::post('/donhang/sua/{id}', [DonHangController::class, 'postSua'])->name('donhang.sua')->middleware('nhanvien');
    Route::get('/donhang/xoa/{id}', [DonHangController::class, 'getXoa'])->name('donhang.xoa')->middleware('nhanvien');
    Route::get('/donhang/moi', [DonHangController::class, 'getDanhSachDonHangMoi'])->name('donhang.moi')->middleware('nhanvien');
    Route::post('/donhang/trangthai/{id}', [DonHangController::class, 'postTrangThai'])->name('donhang.trangthai')->middleware('admin');
    Route::get('/donhang/doanhthu', [DonHangController::class, 'getDoanhThu'])->name('donhang.doanhthu')->middleware('nhanvien');
    Route::get('/donhang/thongdoanhthu', [DonHangController::class, 'getDoanhThu'])->name('donhang.thongkedoanhthu')->middleware('admin');
    Route::get('/donhang/ngay', [DonHangController::class, 'getDanhSachNgay'])->name('donhang.ngay')->middleware('admin');
    Route::get('/donhang/chart', [DonHangController::class, 'getChartDoanhThu'])->name('donhang.chart')->middleware('admin');

    // Quản lý Đơn hàng chi tiết
    Route::get('/donhang/chitiet/{id}', [DonHangChiTietController::class, 'getDanhSach'])->name('donhang.chitiet')->middleware('admin');
    Route::get('/donhang/chitiet/sua/{id}', [DonHangChiTietController::class, 'getSua'])->name('donhang.chitiet.sua')->middleware('admin');
    Route::post('/donhang/chitiet/sua/{id}', [DonHangChiTietController::class, 'postSua'])->name('donhang.chitiet.sua')->middleware('admin');
    Route::get('/donhang/chitiet/xoa/{id}', [DonHangChiTietController::class, 'getXoa'])->name('donhang.chitiet.xoa')->middleware('admin');
    
    // Quản lý Tài khoản người dùng
    Route::get('/nguoidung', [UserController::class, 'getDanhSach'])->name('nguoidung')->middleware('admin');
    Route::get('/nguoidung/them', [UserController::class, 'getThem'])->name('nguoidung.them')->middleware('admin');
    Route::post('/nguoidung/them', [UserController::class, 'postThem'])->name('nguoidung.them')->middleware('admin');
    Route::get('/nguoidung/sua/{id}', [UserController::class, 'getSua'])->name('nguoidung.sua')->middleware('admin');
    Route::post('/nguoidung/sua/{id}', [UserController::class, 'postSua'])->name('nguoidung.sua')->middleware('admin');
    Route::post('/nguoidung/xoa', [UserController::class, 'postXoa'])->name('nguoidung.xoa')->middleware('admin');
    Route::post('/nguoidung/nhap', [UserController::class, 'postNhap'])->name('nguoidung.nhap')->middleware('admin');
    Route::post('/nguoidung/xuat', [UserController::class, 'postXuat'])->name('nguoidung.xuat')->middleware('admin');
    Route::get('/nguoidung/info/{name}', [UserController::class, 'getInfo'])->name('nguoidung.info')->middleware('admin');
    Route::post('/nguoidung/sua/info/{id}', [UserController::class, 'postSuaInfo'])->name('nguoidung.sua.info')->middleware('admin');
    Route::get('/nguoidung/khoa/{id}', [UserController::class, 'getKhoa'])->name('nguoidung.khoa')->middleware('admin');


});

// Email verification notification
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
