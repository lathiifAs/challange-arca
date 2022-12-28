<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;

    protected $fillable = [
        'whatsapp',
        'instagram',
        'facebook',
        'tiktok',
        'linkedin',
        'twitter',
        'youtube',
        'email',
        'telp',
    ];
}
