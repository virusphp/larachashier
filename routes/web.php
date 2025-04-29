<?php

use App\Livewire\Dashboard;
use App\Livewire\Gudang\Master\Rak;
use App\Livewire\Gudang\Master\RakCreate;
use App\Livewire\Gudang\Master\RakEdit;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Auth::routes([
    // 'register' => false,
]);


Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', Dashboard::class)->name('dashboard');

    Route::group(['prefix' => 'gudang', 'as' => 'gudang.', 'middleware' => 'auth'], function () {
        Route::group(['namespace' => 'App\Livewire\Gudang\Master'], function () {
            Route::get('rak', Rak::class)->name('rak.index');
            Route::get('rak/create', RakCreate::class)->name('rak.create');
            Route::get('rak/{rak}/edit', RakEdit::class)->name('rak.edit');
            Route::put('rak/update', RakEdit::class)->name('rak.update');
        });
    });
});
