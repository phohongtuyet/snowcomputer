<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoiSanXuat extends Model
{
    use HasFactory;
    protected $table = 'noisanxuat';

    public function SanPham()
    {
        return $this->hasMany(SanPham::class, 'noisanxuat_id', 'id');
    }
}
