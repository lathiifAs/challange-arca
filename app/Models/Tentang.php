<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'tagline',
        'desc',
        'visi',
        'misi',
        'since',
        'address',
        'city',
        'state',
        'logo_path',
        'logo_name',
        'favicon_path',
        'favicon_name',
        'latitude',
        'longitude',
    ];

}
