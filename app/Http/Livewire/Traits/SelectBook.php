<?php

namespace App\Http\Livewire\Traits;

use App\Repositories\BookRepository;
use Illuminate\Support\Facades\App;

trait SelectBook
{
    public $book_id;
    public $bookTitle;

    public function selectBook($id)
    {
        $repository = App::make(BookRepository::class);
        $book = $repository->findById($id);
        $this->book_id = $book->id;
        $this->bookTitle = $book->title;
        $this->resetValidation('book_id');
    }
}
