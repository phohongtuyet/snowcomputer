<?php

namespace App\Exports;

use App\Models\SanPham;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SanPham_MauExport implements FromView
{
    public function view(): View
    {
        return view('admin.exports.sanpham_mau');
    }
}
