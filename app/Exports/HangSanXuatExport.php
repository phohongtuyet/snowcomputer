<?php

namespace App\Exports;

use App\Models\HangSanXuat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class HangSanXuatExport implements FromView
{
    public function view(): View
    {
        return view('admin.exports.hangsanxuat', [
            'hangsanxuat' => HangSanXuat::all()
        ]);
    }
}
