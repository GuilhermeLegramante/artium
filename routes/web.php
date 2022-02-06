<?php

use App\Http\Livewire\AuthorForm;
use App\Http\Livewire\AuthorTable;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('dashboard');

Route::get('autores/', AuthorTable::class)->name('authors');
Route::get('/novo-autor', AuthorForm::class)->name('author');

require __DIR__ . '/auth.php';
