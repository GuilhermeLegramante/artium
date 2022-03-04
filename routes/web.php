<?php

use App\Http\Livewire\AuthorForm;
use App\Http\Livewire\AuthorTable;
use App\Http\Livewire\BookForm;
use App\Http\Livewire\BookTable;
use App\Http\Livewire\GenderForm;
use App\Http\Livewire\GenderTable;
use App\Http\Livewire\PublisherForm;
use App\Http\Livewire\PublisherTable;
use App\Http\Livewire\ReadingForm;
use App\Http\Livewire\ReadingTable;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {
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

    Route::prefix('/minha-biblioteca')->group(function () {
        Route::name('book.')->group(function () {
            Route::get('/', BookTable::class)->name('list');
            Route::get('/inclusao', BookForm::class)->name('create');
            Route::get('/{id}', BookForm::class)->name('edit');
        });
    });

    Route::prefix('/leitura')->group(function () {
        Route::name('reading.')->group(function () {
            Route::get('/', ReadingTable::class)->name('list');
            Route::get('/inclusao', ReadingForm::class)->name('create');
            Route::get('/{id}', ReadingForm::class)->name('edit');
        });
    });

});

require __DIR__ . '/auth.php';
