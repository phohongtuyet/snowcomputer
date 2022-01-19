<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhomSanPham extends Model
{
    use HasFactory;

    protected $table = 'nhomsanpham';

    protected $fillable = ['tennhomsanpham', 'tennhomsanpham_slug',];

    public function DanhMuc()
    {
        return $this->belongsTo(DanhMuc::class, 'danhmuc_id', 'id');
    }
}
