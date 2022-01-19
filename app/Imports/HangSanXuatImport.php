<?php

namespace App\Imports;

use App\Models\HangSanXuat;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;

class HangSanXuatImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new HangSanXuat([
            'tenhangsanxuat' => $row['ten_hang_san_xuat'],
            'tenhangsanxuat_slug' =>Str::slug($row['ten_hang_san_xuat']),
            'hinhanh' => $row['hinh_anh'],
        ]);
    }
}
