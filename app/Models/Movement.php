<?php

namespace App\Models;

use App\Models\Book;
use App\Models\User;
use App\Models\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movement extends Model
{
    use HasFactory, BelongsToUser;

    protected $fillable = [
        'book_id',
        'date',
        'type',
        'note',
    ];

    public $typeOptions = [
        'D' => 'Doação',
        'P' => 'Perda',
        'V' => 'Venda',
        'E' => 'Empréstimo',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    
}
