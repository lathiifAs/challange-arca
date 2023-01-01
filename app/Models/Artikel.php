<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_id',
        'title',
        'content',
        'slug',
        'st_publish',
        'thumbnail_path',
        'thumbnail_name'
    ];
}
