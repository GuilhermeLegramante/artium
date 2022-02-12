<?php

use App\Http\Livewire\AuthorForm;
use App\Http\Livewire\GenderForm;
use App\Http\Livewire\AuthorTable;
use App\Http\Livewire\GenderTable;
use App\Http\Livewire\PublisherForm;
use App\Http\Livewire\PublisherTable;
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

Route::prefix('/editora')->group(function () {
    Route::name('publisher.')->group(function () {
        Route::get('/', PublisherTable::class)->name('list');
        Route::get('/inclusao', PublisherForm::class)->name('create');
        Route::get('/{id}', PublisherForm::class)->name('edit');
    });
});

Route::prefix('/genero')->group(function () {
    Route::name('gender.')->group(function () {
        Route::get('/', GenderTable::class)->name('list');
        Route::get('/inclusao', GenderForm::class)->name('create');
        Route::get('/{id}', GenderForm::class)->name('edit');
    });
});

require __DIR__ . '/auth.php';
