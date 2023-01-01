<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like_artikel extends Model
{
    use HasFactory;

    protected $fillable = [
        'artikel_id',
        'ip_address',
    ];
}
