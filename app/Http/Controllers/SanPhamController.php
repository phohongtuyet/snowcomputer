<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use App\Models\HangSanXuat;
use App\Models\LoaiSanPham;
use App\Models\NoiSanXuat;
use App\Models\DanhMuc;
use App\Models\NhomSanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Imports\SanPhamImport;
use App\Exports\SanPhamExport;
use App\Exports\SanPham_MauExport;
use Excel;

class SanPhamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getDanhSach()
    {
        $sanpham = SanPham::where('xoa',0)->get();
        return view('admin.sanpham.danhsach', compact('sanpham'));
    }

    public function getOnOffHienThi($id)
    {
        $orm = SanPham::find($id);
        $orm->hienthi = 1 - $orm->hienthi; 
        $orm->save();

        return redirect()->route('admin.sanpham');
    }

    // Nhập từ Excel
    public function postNhap(Request $request)
    {   
        try 
        {
            Excel::import(new SanPhamImport, $request->file('file_excel'));
            return redirect()->route('admin.sanpham');        
        } 
        catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $error = $e->failures();
            return redirect()->route('admin.sanpham')->with('error','Không thể nhập excel do lỗi định dạng hoặc sai dữ liệu ');
        } 
    }
    
    // Xuất ra Excel
    public function getXuat()
    {
        return Excel::download(new SanPhamExport, 'danh-sach-san-pham.xlsx');
    }

    public function getXuatMau()
    {
        return Excel::download(new SanPham_MauExport, 'danh-sach-san-pham.xlsx');
    }
    public function getXuatSanPhamHet()
    {
        return Excel::download(new SanPhamHetExport, 'danh-sach-san-pham-het-hang.xlsx');
    }

    public function getThem()
    {
        if(session_status() == PHP_SESSION_NONE)
		{
			session_start();
		}
        //lay thu tu tu dong
		$hinhanh_identity = DB::select("SELECT `AUTO_INCREMENT`
                                        FROM  INFORMATION_SCHEMA.TABLES
                                        WHERE TABLE_SCHEMA = 'snowcomputer'
                                        AND   TABLE_NAME   = 'sanpham';");
		$next_id = $hinhanh_identity[0]->AUTO_INCREMENT;

        //tao thu muc va lay day bang STR_PAD_LEFT
		Storage::makeDirectory('sanpham/' . str_pad($next_id, 7, '0', STR_PAD_LEFT), 0775);
		
        //gan duong dan
		$path = config('app.url') . '/storage/app/sanpham/' . str_pad($next_id, 7, '0', STR_PAD_LEFT) . '/';
		
        //ktr duong dan
		if(isset($_SESSION['baseUrl'])) unset($_SESSION['baseUrl']);
		$_SESSION['baseUrl'] = $path;

		if(isset($_SESSION['resourceType'])) unset($_SESSION['resourceType']);
		$_SESSION['resourceType'] = 'Images';
		
		$folder = 'sanpham/' . str_pad($next_id, 7, '0', STR_PAD_LEFT);

        $noisanxuat = NoiSanXuat::where('xoa',0)->get();
        $hangsanxuat = HangSanXuat::where('xoa',0)->get();
        $danhmuc = DanhMuc::where('xoa',0)->get();

        return view('admin.sanpham.them', compact('noisanxuat','hangsanxuat','folder','danhmuc'));
    }

    public function getNhomSanPham(Request $request)
    {
        $nhomsanpham = NhomSanPham::where([["danhmuc_id", $request->id],['xoa',0]])->pluck("tennhomsanpham", "id");
        return response()->json($nhomsanpham);
    }

    public function getLoai(Request $request)
    {
        $loai = LoaiSanPham::where([["nhomsanpham_id", $request->id],['xoa',0]])->pluck("tenloai", "id");
        return response()->json($loai);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,[
           'hangsanxuat_id' => ['required'],
           'noisanxuat_id' => ['required'],
           'loaisanpham_id' => ['required'],
           'baohanh' => ['required'],
           'tensanpham' =>['required','max:255','unique:sanpham'],
           'soluong' =>['required','numeric','min:1'],
           'dongia' =>['required','numeric','min:1'],
       ],
       $messages = [
        'hangsanxuat_id.required' => 'Chưa chọn thương hiêu.',
        'noisanxuat_id.required' => 'Chưa chọn chất liệu.',
        'loaisanpham_id.required' => 'Chưa chọn loại.',
        'tensanpham.required' => 'Tên sản phẩm không được bỏ trống.',
        'soluong.required' => 'Số lượng không được bỏ trống.',
        'dongia.required' => 'Đơn giá không được bỏ trống.',
        'baohanh.required' => 'Chưa chọn đối tượng sử dụng.',
        'soluong.min' => 'Số lượng tối thiểu là 1.',
        'dongia.min' => 'Đơn giá tối thiểu là 200000.',

        ]);

        $orm = new SanPham();
        $orm->hangsanxuat_id = $request->hangsanxuat_id;
        $orm->noisanxuat_id = $request->noisanxuat_id;
        $orm->loaisanpham_id = $request->loaisanpham_id;
        $orm->tensanpham = $request->tensanpham;
        $orm->tensanpham_slug = Str::slug($request->tensanpham, '-');
        $orm->soluong = $request->soluong;
        $orm->dongia = $request->dongia;
        $orm->baohanh = $request->baohanh;
        $orm->thumuc = $request->ThuMuc;
        $orm->trangthaisanpham = $request->trangthaisanpham;
        $orm->phantramgia = $request->phantramgia;
        $orm->motasanpham = $request->motasanpham;
        $orm->save();

        return redirect()->route('admin.sanpham')->with('status', 'Thêm mới thành công');;
    }
    
    public function getSua($id)
    {
        $sanpham = SanPham::find($id);
        $noisanxuat = NoiSanXuat::where('xoa',0)->get();
        $hangsanxuat = HangSanXuat::where('xoa',0)->get();
        $loaisanpham = LoaiSanPham::where('xoa',0)->get();
        $danhmuc = DanhMuc::where('xoa',0)->get();
        $nhomsanpham = NhomSanPham::where('xoa',0)->get();

        if(session_status() == PHP_SESSION_NONE)
		{
			session_start();
		}
		$path = config('app.url') . '/storage/app/sanpham/' . str_pad($id, 7, '0', STR_PAD_LEFT) . '/';
		
		if(isset($_SESSION['baseUrl'])) unset($_SESSION['baseUrl']);
		$_SESSION['baseUrl'] = $path;

		if(isset($_SESSION['resourceType'])) unset($_SESSION['resourceType']);
		$_SESSION['resourceType'] = 'Images';
		
		$folder = 'sanpham/' . str_pad($id, 7, '0', STR_PAD_LEFT);

        return view('admin.sanpham.sua', compact('sanpham','hangsanxuat','noisanxuat','loaisanpham','nhomsanpham','danhmuc','folder'));
    }

    public function getNhomSanPhamSua(Request $request)
    {
        $loaisanpham = LoaiSanPham::find($request->id);
        $nhomsanpham = NhomSanPham::where([["id", $loaisanpham->nhomsanpham_id],['xoa',0]])->pluck("tennhomsanpham", "id");
        return response()->json($nhomsanpham);
    }

    public function getDanhMucSua(Request $request)
    {
        $loaisanpham = LoaiSanPham::find($request->id);
        $nhomsanpham = NhomSanPham::where('id',$loaisanpham->nhomsanpham_id)->first();
        $danhmuc = DanhMuc::where([["id", $nhomsanpham->danhmuc_id],['xoa',0]])->pluck("tendanhmuc", "id");
        return response()->json($danhmuc);
    }

    public function postSua(Request $request, $id)
    {   
        $this->validate($request,[
            'hangsanxuat_id' => ['required'],
            'noisanxuat_id' => ['required'],
            'loaisanpham_id' => ['required'],
            'tensanpham' =>['required','max:255','unique:sanpham,tensanpham,' .$id],
            'soluong' =>['required','numeric'],
            'dongia' =>['required','numeric'],
        ]);
 
        $orm = SanPham::find($id);
        $orm->hangsanxuat_id = $request->hangsanxuat_id;
        $orm->noisanxuat_id = $request->noisanxuat_id;
        $orm->loaisanpham_id = $request->loaisanpham_id;
        $orm->tensanpham = $request->tensanpham;
        $orm->tensanpham_slug = Str::slug($request->tensanpham, '-');
        $orm->soluong = $request->soluong;
        $orm->dongia = $request->dongia;
        $orm->baohanh = $request->baohanh;
        $orm->trangthaisanpham = $request->trangthaisanpham;
        $orm->phantramgia = $request->phantramgia;
        $orm->thumuc = $request->ThuMuc;
        $orm->motasanpham = $request->motasanpham;
        $orm->save();
        
    
        return redirect()->route('admin.sanpham')->with('status', 'Cập nhật thành công');;
    }
    
    public function postXoa(Request $request)
    {
        $orm = SanPham::find($request->ID_delete);
        $orm->xoa = 1;
        $orm->save();   
		//Storage::deleteDirectory('sanpham/' . str_pad($request->ID_delete, 7, '0', STR_PAD_LEFT));

        return redirect()->route('admin.sanpham')->with('status', 'Xóa thành công');;

    }

    public function postHinhAnhSanPhamAjax(Request $request)
	{
		if(session_status() == PHP_SESSION_NONE)
		{
			session_start();
		}
		$path = config('app.url') . '/storage/app/sanpham/' . str_pad($request->id, 7, '0', STR_PAD_LEFT) . '/';
		
		if(isset($_SESSION['baseUrl'])) unset($_SESSION['baseUrl']);
		$_SESSION['baseUrl'] = $path;
		if(isset($_SESSION['resourceType'])) unset($_SESSION['resourceType']);
		$_SESSION['resourceType'] = 'Images';
		
		return 1;
	}
}
