<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{
    use HasFactory, BelongsToUser;

    protected $fillable = [
        'book_id',
        'startDate',
        'endDate',
        'assessment',
        'note',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

}
