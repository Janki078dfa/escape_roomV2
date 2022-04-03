<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * @var mixed|string
     */

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
