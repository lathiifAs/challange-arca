<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'layanan_id',
        'name',
        'tanggal',
        'img_thumb_path',
        'img_thumb_name',
        'img_porto_path',
        'img_porto_1_name',
        'img_porto_2_name',
        'img_porto_3_name',
        'img_porto_4_name',
        'desc'
    ];
}
