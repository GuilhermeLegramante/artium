<?php

use App\Http\Livewire\AuthorForm;
use App\Http\Livewire\AuthorTable;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::prefix('/autor')->group(function () {
    Route::name('author.')->group(function () {
        Route::get('/', AuthorTable::class)->name('list');
        Route::get('/inclusao', AuthorForm::class)->name('create');
        Route::get('/{id}', AuthorForm::class)->name('edit');
    });
});

require __DIR__ . '/auth.php';
