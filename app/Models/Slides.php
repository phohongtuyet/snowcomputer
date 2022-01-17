<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slides extends Model
{
    use HasFactory;

    protected $fillable = ['hinhanh','hienthi'];

    protected $table = 'slides';
}
