<?php

namespace App\Models\Traits;

use App\Models\User;
use Illuminate\Support\Str;

trait BelongsToUser 
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}