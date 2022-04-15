<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use App\Models\DonHang_ChiTiet;
use App\Models\TinhTrang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DonHangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getDanhSach()
    {
        $donhang = DonHang::orderBy('created_at', 'desc')->where('xoa',0)->get();
        $tinhtrang = TinhTrang::where('xoa',0)->get();
        return view('admin.donhang.danhsach', compact('donhang','tinhtrang'));
    }

    public function getDanhSachNgay()
    {
        $date = Carbon::today();//lay ngay hien tai
        $donhang = DonHang::whereBetween('donhang.created_at', [$date->format('Y-m-d')." 00:00:00", $date->format('Y-m-d')." 23:59:59"])
                    ->orderBy('created_at', 'desc')->get();
        return view('admin.donhang.danhsach', compact('donhang'));
    }

    public function getDanhSachDonHangMoi()
    {
        $donhang = DonHang::where('tinhtrang_id', '1')->orderBy('created_at', 'desc')->get();
        return view('admin.donhang.moi', compact('donhang'));
    }
    
    public function getThem()
    {
    }
    
    public function postThem(Request $request)
    {   
    }
    
    public function getSua($id)
    {
        $donhang = DonHang::find($id);
        return view('admin.donhang.sua', compact('donhang'));
    }
    
    public function postSua(Request $request, $id)
    {
        $this->validate($request, [
            'dienthoai' => ['required', 'max:20'],
            'diachi' => ['required', 'max:255'],
            'tinhtrang' => ['required'],
        ]);
            
        $orm = DonHang::find($id);
        $orm->dienthoaigiaohang = $request->dienthoai;
        $orm->diachigiaohang = $request->diachi;
        $orm->tinhtrang_id = $request->tinhtrang;
        $orm->save();
        
        return redirect()->route('admin.donhang');
        
    }
    
    public function postXoa(Request $request )
    {
        $orm = DonHang::find($request->ID_delete);
        $orm->xoa = 1;
        $orm->save();
        return redirect()->route('admin.donhang');
    }

    public function postTrangThai(Request $request, $id)
    {
        $orm = DonHang::find($id);
        
            if($request->select == 10 || $request->select1 == 10 )
            {
                $orm->tinhtrang_id = 10;
                $orm->save();

            }
            elseif($request->select == 9 || $request->select1 == 9) 
            {
                $orm->tinhtrang_id = 9;
                $orm->save();
            }
            elseif($request->select == 8 || $request->select1 == 8) 
            {
                $orm->tinhtrang_id = 8;
                $orm->save();
            }
            elseif($request->select == 7 || $request->select1 == 7) 
            {
                $orm->tinhtrang_id = 7;
                $orm->save();       
            }
            elseif($request->select == 6 || $request->select1 == 6) 
            {
                $orm->tinhtrang_id = 6;
                $orm->save();     
            }
            elseif($request->select == 5 || $request->select1 == 5)  
            {
                $orm->tinhtrang_id = 5;
                $orm->save();  
            }
            elseif($request->select == 4 || $request->select1 == 4) 
            {
                $orm->tinhtrang_id = 4;
                $orm->save();      
            }
            elseif($request->select == 3 || $request->select1 == 3) 
            {
                $orm->tinhtrang_id = 3;
                $orm->save();       
            }
            elseif($request->select == 2 || $request->select1 == 2) 
            {
                $orm->tinhtrang_id = 2;
                $orm->save();
            }
            else
            {
                $orm->tinhtrang_id = 1;
                $orm->save();
            }
        
            if($request->select1)
                return redirect()->route('admin.donhang.moi');
            else        
                return redirect()->route('admin.donhang');
    }
    
    public function getDoanhThu(Request $request)
    {
        if($request->dateStart != '' && $request->dateEnd != '')
        {
            switch($request->btndoanhthu) {
                case 'doanhthu': 
                    $doanhthu = DonHang_ChiTiet::leftJoin('donhang', 'donhang.id', '=', 'donhang_chitiet.donhang_id')
                    ->leftJoin('sanpham', 'sanpham.id', '=', 'donhang_chitiet.sanpham_id')
                    ->select('sanpham.*',DB::raw('sum(donhang_chitiet.soluongban) AS tongsoluongban'),'donhang.khuyenmai as khuyenmai' )
                    ->where( 'donhang.tinhtrang_id',10)
                    ->whereBetween('donhang.created_at', [ Carbon::parse($request->dateStart)->format('Y-m-d')." 00:00:00", Carbon::parse($request->dateEnd)->format('Y-m-d')." 23:59:59"])
                    ->groupBy('sanpham.id')
                    ->groupBy('donhang.id')
                    ->get();
                    //dd(json_decode($doanhthu->khuyenmai));
                    $session_title_dateStart = $request->dateStart;
                    $session_title_dateEnd = $request->dateEnd;
                    $dh='';
                    return view('admin.donhang.doanhthu',compact('dh','doanhthu','session_title_dateStart','session_title_dateEnd'));  
                break;
            
                case 'chartdoanhthu': 
                    $doanhthu = DonHang_ChiTiet::leftJoin('donhang', 'donhang.id', '=', 'donhang_chitiet.donhang_id')
                    ->leftJoin('sanpham', 'sanpham.id', '=', 'donhang_chitiet.sanpham_id')
                    ->select('sanpham.*',DB::raw('sum(donhang_chitiet.soluongban) AS tongsoluongban'))
                    ->where('donhang.tinhtrang_id',10)
                    ->whereBetween('donhang.created_at', [ Carbon::parse($request->dateStart)->format('Y-m-d')." 00:00:00", Carbon::parse($request->dateEnd)->format('Y-m-d')." 23:59:59"])
                    ->groupBy('sanpham.id')
                    ->get();
                    //dd($doanhthu);
                    foreach($doanhthu as $item)
                    {
                        $chart[] = array(
                                            'tongsoluongban'=> $item->tongsoluongban,
                                            'dongia'=> $item->dongia,
                                            'ngaydathang'=> Carbon::parse($item['created_at'])->format('m'),
                                            'tensanpham'=> $item->tensanpham,
                                            'tongtien'=> $item->dongia * $item->tongsoluongban,
                                        );
                    }
                    return view('admin.donhang.doanhthu')->with('dh', json_encode($chart));
                break;
            }           
        }
        return view('admin.donhang.doanhthu')->with('dh');
    }
}