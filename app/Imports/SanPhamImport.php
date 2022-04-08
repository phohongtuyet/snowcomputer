<?php

namespace App\Imports;

use App\Models\SanPham;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\WithValidation;

class SanPhamImport implements ToModel, WithHeadingRow, WithValidation
{
    
    public function model(array $row)
    {
        return new SanPham([
            'loaisanpham_id' => $row['loai_san_pham'],
            'hangsanxuat_id' => $row['hang_san_xuat'],
            'noisanxuat_id' => $row['noi_san_xuat'],
            'tensanpham' => $row['ten_san_pham'],
            'tensanpham_slug' => Str::slug($row['ten_san_pham']),
            'baohanh' => $row['bao_hanh'],
            'soluong' => $row['so_luong'],
            'dongia' => $row['don_gia'],
            'thumuc' => $row['thu_muc'],
        ]);
    }

    public function rules(): array
    {
        return [
            'loai_san_pham' => 'required',
            'hang_san_xuat' => 'required',
            'noi_san_xuat' => 'required',
        ];
    }
}
