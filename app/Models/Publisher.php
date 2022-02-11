<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory, BelongsToUser;

    protected $fillable = [
        'name',
        'user_id',
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
