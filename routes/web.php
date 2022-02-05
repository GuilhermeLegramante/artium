<?php

use App\Http\Livewire\Teste;
use App\Http\Livewire\AuthorForm;
use App\Http\Livewire\AuthorTable;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Livewire\Author\TableComponent;


Route::get('/', function () {
    return view('index');
})->name('dashboard');

Route::prefix('/autores')->group(function () {
    Route::get('/', AuthorTable::class)->name('authors');
    Route::get('/{id?}', AuthorForm::class)->name('authors');
});

require __DIR__.'/auth.php';
