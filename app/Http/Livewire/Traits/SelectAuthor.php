<?php

namespace App\Http\Livewire\Traits;

use Illuminate\Support\Facades\App;
use App\Repositories\AuthorRepository;

trait SelectAuthor 
{
    public $author_id;
    public $authorName;
    
    public function selectAuthor($id)
    {
        $repository = App::make(AuthorRepository::class);
        $author = $repository->findById($id);
        $this->author_id = $author->id;
        $this->authorName = $author->name;
        $this->resetValidation('author_id');
    }
}