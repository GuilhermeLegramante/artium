<?php

namespace App\Models;

use App\Models\Author;
use App\Models\Gender;
use App\Models\Publisher;
use App\Models\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory, BelongsToUser;

    protected $fillable = [
        'user_id',
        'title',
        'author_id',
        'publisher_id',
        'gender_id',
        'edition',
        'pages',
        'firstPublicationYear',
        'editionYear',
        'acquisitionDate',
        'note',
        'source',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

}
