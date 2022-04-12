<?php

namespace App\Imports;

use App\Models\SanPham;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
class SanPhamImport implements ToModel, WithValidation, WithHeadingRow, SkipsOnError
{
    use Importable,SkipsErrors;

    public function model(array $row)
    {
        return new SanPham([
            'hangsanxuat_id' => $row['hang_san_xuat'],
            'noisanxuat_id' => $row['noi_san_xuat'],
            'loaisanpham_id' => $row['loai_san_pham'],
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
            'hang_san_xuat'      => ['required'],
            'noi_san_xuat'       => ['required'],
            'loai_san_pham'      => ['required'],
            'ten_san_pham'       => ['required'],
            'bao_hanh'           => ['required'],
            'so_luong'           => ['required'],
            'don_gia'           => ['required'],
            'thu_muc'            => ['required'],
        ];
    }
}
