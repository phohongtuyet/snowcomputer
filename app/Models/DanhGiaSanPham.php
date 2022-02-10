<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhGiaSanPham extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'danhgiasanpham';


    public function SanPham()
    {
        return $this->belongsTo(SanPham::class, 'sanpham_id', 'id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
}
