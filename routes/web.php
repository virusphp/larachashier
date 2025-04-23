<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes([
    // 'register' => false,
]);

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
