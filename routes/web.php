<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('dashboard');
})->name('teste');

Route::prefix('/local')->group(function () {
    Route::get('/', 'Parameter\PlaceController@index')->name('parameter.place');
});