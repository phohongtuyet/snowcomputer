<?php
namespace App\Http\Controllers;
use App\Models\DonHang;
use App\Models\SanPham;
use App\Models\DonHang_ChiTiet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\BinhLuan;


class AdminController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }
   
   public function getHome()
   {
      if(Auth::user()->role == 'admin' || Auth::user()->role == 'staff' && Auth::user()->khoa ===0  )
        {
            $donhang = DonHang::where('tinhtrang_id',1)->get();
            $user = User::all();
            $sanpham = SanPham::where('soluong',0)->get();
            $date = Carbon::today();//lay ngay hien tai

            $doanhthu = DonHang_ChiTiet::leftJoin('donhang', 'donhang.id', '=', 'donhang_chitiet.donhang_id')
                ->leftJoin('sanpham', 'sanpham.id', '=', 'donhang_chitiet.sanpham_id')
                ->select('sanpham.*',
                        DB::raw('sum(donhang_chitiet.soluongban) AS tongsoluongban'),
                        DB::raw('(select donhang_chitiet.dongiaban from donhang_chitiet limit 1) as dongiaban')
                        )
                ->whereBetween('donhang.created_at', [$date->format('Y-m-d')." 00:00:00", $date->format('Y-m-d')." 23:59:59"])
                ->where('donhang.tinhtrang_id',10)
                ->groupBy('sanpham.id')
                ->get();

            $binhluan = BinhLuan::all();
            return view('admin.index',compact('donhang','user','sanpham','doanhthu','binhluan'));
        } 
        elseif(Auth::user()->khoa === 1)
        {
            Auth::logout();
            return redirect()->route('login')->with('warning', 'Tài khoản của bạn đã bị tạm khóa. Vui lòng liên hệ quản trị viên');
        }      
        else
            return view('errors.404');
   }

   public function getForbidden()
	{
		return view('errors.403');
	}
}
