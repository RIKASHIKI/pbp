<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cbarang;
use App\Http\Controllers\Csuplier;
use App\Http\Controllers\Cpembeli;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/beranda', function () {
    return view('index');
})->name('home');

Route::resource('barang', Cbarang::class);
Route::resource('suplier',Csuplier::class);
//route manual pembeli
Route::get('/pembeli', [Cpembeli::class, 'tampil'])->name('pembeli.tampil');
Route::get('/pembeli/tambah', [Cpembeli::class, 'tambah'])->name('pembeli.tambah');
Route::post('/pembeli/simpan', [Cpembeli::class, 'simpan'])->name('pembeli.simpan');
Route::get('/pembeli/{id_pembeli}/ubah', [Cpembeli::class, 'ubah'])->name('pembeli.ubah');
Route::put('/pembeli/{id_pembeli/update', [Cpembeli::class, 'update'])->name('pembeli.update');
Route::delete('/pembeli/{id_pembeli}/hapus', [Cpembeli::class], 'hapus')->name('pembeli.hapus');