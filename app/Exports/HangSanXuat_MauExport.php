<?php

namespace App\Exports;

use App\Models\HangSanXuat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class HangSanXuat_MauExport implements FromView
{
    public function view(): View
    {
        return view('admin.exports.hangsanxuat_mau');
    }
}
