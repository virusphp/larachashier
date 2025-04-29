<?php

use App\Livewire\Gudang\Master\Rak;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Auth::routes([
    // 'register' => false,
]);


Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'gudang', 'as' => 'gudang.', 'middleware' => 'auth'], function () {
        Route::group(['namespace' => 'App\Livewire\Gudang\Master\Rak'], function () {
            Route::get('rak', Rak::class)->name('rak.index');
        });
    });
});
