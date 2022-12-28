<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori_artikel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'img_path',
        'img_name',
        'desc'
    ];
}
