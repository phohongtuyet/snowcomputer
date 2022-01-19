<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    use HasFactory;
    protected $table = 'loaisanpham';

    protected $fillable = ['tenloai', 'tenloai_slug',];

    public function SanPham()
    {
        return $this->hasMany(SanPham::class, 'loaisanpham_id', 'id');
    }

    public function NhomSanPham()
    {
        return $this->belongsTo(NhomSanPham::class, 'nhomsanpham_id', 'id');
    }
}
