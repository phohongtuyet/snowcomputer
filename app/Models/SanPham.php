<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;

    protected $table = 'sanpham';

    protected $fillable = [
        'hangsanxuat_id',
        'noisanxuat_id',
        'loaisanpham_id',
        'tensanpham',
        'tensanpham_slug',
        'baohanh',
        'soluong',
        'dongia',
        'thumuc',
        'motasanpham',
    ];
 
    public function LoaiSanPham()
    {
        return $this->belongsTo(LoaiSanPham::class, 'loaisanpham_id', 'id');
    }
    
    public function HangSanXuat()
    {
        return $this->belongsTo(HangSanXuat::class, 'hangsanxuat_id', 'id');
    }

    public function NoiSanXuat()
    {
        return $this->belongsTo(NoiSanXuat::class, 'noisanxuat_id', 'id');
    }

    public function HinhAnh()
    {
        return $this->hasMany(HinhAnh::class, 'sanpham_id', 'id');
    }

    public function DonHang_ChiTiet()
    {
        return $this->hasMany(DonHang_ChiTiet::class, 'sanpham_id', 'id');
    }
}
