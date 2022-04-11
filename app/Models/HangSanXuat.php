<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HangSanXuat extends Model
{
    use HasFactory;

    protected $table = 'hangsanxuat';

    protected $fillable = [
        'tenhangsanxuat',
        'tenhangsanxuat_slug',
        'hinhanh',
        'xoa'       
    ];

    public function SanPham()
    {
        return $this->hasMany(SanPham::class, 'hangsanxuat_id', 'id');
    }
}
