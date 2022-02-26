<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    use HasFactory;
    protected $table = 'danhmuc';

    protected $fillable = ['tendanhmuc','tendanhmuc_slug','hinhanh'];

    public function NhomSanPham()
    {
        return $this->hasMany(NhomSanPham::class, 'danhmuc_id', 'id');
    }
}
