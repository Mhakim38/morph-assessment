<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Form Routing
Route::get('/items', [App\Http\Controllers\ItemController::class, 'index'])->name('FetchItems');
Route::post('/submit-form', [App\Http\Controllers\ItemController::class, 'submitForm'])->name('StoreItems');
