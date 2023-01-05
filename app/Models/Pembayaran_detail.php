<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran_detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'pembayaran_id',
        'presentase',
        'buruh_id',
        'hasil_bonus',
    ];
}
