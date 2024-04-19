<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\hitungpajakController; 
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('home', hitungpajakController::class);
Route::post('hitungpajak', [hitungpajakController::class, 'store']);
