<?php

namespace App\Models;

use App\Models\WishlistItem;
use App\Models\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wishlist extends Model
{
    use HasFactory, BelongsToUser;

    protected $fillable = [
        'title',
        'creationDate',
    ];

    public function items()
    {
        return $this->hasMany(WishlistItem::class);
    }

}
