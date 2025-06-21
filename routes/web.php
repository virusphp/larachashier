<?php

use App\Livewire\Dashboard;
use App\Livewire\Gudang\Master\BarangFarmasi;
use App\Livewire\Gudang\Master\FormBarangFarmasi;
use App\Livewire\Gudang\Master\GolonganBarang;
use App\Livewire\Gudang\Master\JenisBarang;
use App\Livewire\Gudang\Master\KelompokBarang;
use App\Livewire\Gudang\Master\Pabrik;
use App\Livewire\Gudang\Master\Rak;
use App\Livewire\Gudang\Master\Satuan;
use App\Livewire\Gudang\Master\Suplier;
use App\Livewire\Gudang\Master\UnitBagian;
use App\Livewire\Gudang\Surat\CreateSpj;
use App\Livewire\Gudang\Surat\Spj;
use Illuminate\Support\Facades\Auth;
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
            Route::get('barang', BarangFarmasi::class)->name('barang.index');
            Route::get('form-barang', FormBarangFarmasi::class)->name('barang.form');

            Route::get('rak', Rak::class)->name('rak.index');
            Route::get('unit-bagian', UnitBagian::class)->name('unit-bagian.index');
            Route::get('satuan', Satuan::class)->name('satuan.index');
            Route::get('jenis-barang', JenisBarang::class)->name('jenis-barang.index');
            Route::get('kelompok-barang', KelompokBarang::class)->name('kelompok-barang.index');
            Route::get('golongan-barang', GolonganBarang::class)->name('golongan-barang.index');
            Route::get('suplier', Suplier::class)->name('suplier.index');
            Route::get('pabrik', Pabrik::class)->name('pabrik.index');
        });

        Route::group(['namespace' => 'App\Livewire\Gudang\Surat', 'prefix' => 'surat'], function () {
            Route::get('spj', Spj::class)->name('rak.index');
            Route::get('spj/create', CreateSpj::class)->name('rak.create');
        });
    });
});
