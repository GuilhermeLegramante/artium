<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gender extends Model
{
    use HasFactory, BelongsToUser;

    protected $fillable = [
        'user_id',
        'name',
        'description',
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
