<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Models\DonHang_ChiTiet;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BanHangChart extends BaseChart
{
    public function handler(Request $request): Chartisan
    {
        $date = Carbon::today();//lay ngay hien tai
        $doanhthu = DonHang_ChiTiet::leftJoin('donhang', 'donhang.id', '=', 'donhang_chitiet.donhang_id')
                    ->leftJoin('sanpham', 'sanpham.id', '=', 'donhang_chitiet.sanpham_id')
                    ->select('sanpham.*',DB::raw('sum(donhang_chitiet.soluongban) AS tongsoluongban'))
                    ->whereBetween('donhang.created_at', [$date->format('Y-m-d')." 00:00:00", $date->format('Y-m-d')." 23:59:59"])
                    ->where('donhang.tinhtrang_id',10)
                    ->groupBy('sanpham.id')
                    ->get();
        if(!empty($doanhthu))
        {
            return Chartisan::build()
            ->labels(['Chưa có sản phẩm nào được bán hôm nay']);
        }
        else
        {
            return Chartisan::build()
            ->labels([''])
            ->dataset('Tiền', [$doanhthu[0]->dongia])
            ->dataset('Số lượng bán', [$doanhthu[0]->tongsoluongban])
            ->dataset('Tổng tiền', [$doanhthu[0]->tongsoluongban * $doanhthu[0]->dongia]);
        }
    }
}