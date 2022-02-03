<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Wishlist;
use App\Models\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WishlistItem extends Model
{
    use HasFactory, BelongsToUser;

    protected $fillable = [
        'book_id',
        'Wishlist_id',
        'price',
        'url',
        'inclusionDate',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function wishlist()
    {
        return $this->belongsTo(Wishlist::class);
    }
}
