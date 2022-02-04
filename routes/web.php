<?php

use App\Http\Livewire\Teste;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;


Route::get('/', function () {
    return view('index');
})->name('dashboard');

Route::prefix('/autores')->group(function () {
    Route::get('/', [AuthorController::class, 'index'])->name('authors');
});

Route::get('/teste', Teste::class);


require __DIR__.'/auth.php';
