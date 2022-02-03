<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;


Route::get('/', function () {
    return view('dashboard');
})->name('teste');

Route::prefix('/autores')->group(function () {
    Route::get('/', [AuthorController::class, 'index'])->name('authors');
});