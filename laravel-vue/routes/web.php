<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Form Routing
Route::post('/submit-form', [App\Http\Controllers\Controller::class, 'submitForm'])->name('StoreItems');
