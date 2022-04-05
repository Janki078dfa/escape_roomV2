<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date',
        'available',
        'game_id',
    ];


    protected $table = "rooms";
    public $timestamps = false;

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
