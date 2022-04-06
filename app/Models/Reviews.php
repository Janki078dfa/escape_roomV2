<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'rate',
        'user_id',
        'room_id',
    ];

    protected $table = "reviews";
}
