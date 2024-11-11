<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cuser;
use App\Http\Controllers\Cadmin;
use App\Http\Controllers\Clogin;
use App\Http\Controllers\Cbarang;
use App\Http\Controllers\Csuplier;
use App\Http\Controllers\Cpembeli;
use App\Http\Controllers\Cpesanan;
use App\Http\Controllers\Cdashboard;
use App\Http\Controllers\Cpembelian;

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
//masuk type guest
route::middleware(['guest'])->group(function () {
    route::get('/login', [Clogin::class, 'index'])->name('login');
    route::post('/login', [Clogin::class, 'login_proses'])->name('login_proses');
    //rute registrasi
    route::get('/register', [Cuser::class, 'index'])->name('register');
    route::post('/register', [Cuser::class, 'register_proses'])->name('register_proses');
});

//masuk type user
route::middleware(['auth'])->group(function () {

    route::get('/', function () {
        return view('index');
    })->name('home');
    route::get('/', [Cdashboard::class, 'index'])->name('home');

    Route::resource('barang', Cbarang::class)->except(['show']);
    route::get('/barang/cetak', [Cbarang::class, 'cetak'])->name('barang.cetak');
    Route::resource('suplier', Csuplier::class);

    // Route manual pesanan
    Route::get('/pesanan', [Cpesanan::class, 'index'])->name('pesanan.index');
    Route::get('/pesanan/tambah', [Cpesanan::class, 'tambah'])->name('pesanan.tambah');
    Route::post('/pesanan/simpan', [Cpesanan::class, 'simpan'])->name('pesanan.simpan');
    Route::get('/pesanan/edit/{id_pesanan}', [Cpesanan::class, 'edit'])->name('pesanan.edit');
    Route::put('/pesanan/update/{id_pesanan}', [Cpesanan::class, 'update'])->name('pesanan.update');
    Route::delete('/pesanan/hapus/{id_pesanan}', [Cpesanan::class, 'hapus'])->name('pesanan.hapus');
    Route::get('/pesanan/cetak', [Cpesanan::class, 'cetak'])->name('pesanan.cetak');
    Route::get('/pesanan/cetakex', [Cpesanan::class, 'cetakex'])->name('pesanan.cetakex');
    
    //route manual pembeli
    route::get('/pembelian',[Cpembelian::class, 'index'])->name('pembelian.index');

    //route manual pembelian
    Route::get('/pembeli', [Cpembeli::class, 'tampil'])->name('pembeli.tampil');
    Route::get('/pembeli/cetak', [Cpembeli::class, 'cetak'])->name('pembeli.cetak');
    Route::get('/pembeli/tambah', [Cpembeli::class, 'tambah'])->name('pembeli.tambah');
    Route::post('/pembeli/simpan', [Cpembeli::class, 'simpan'])->name('pembeli.simpan');
    Route::get('/pembeli/{id_pembeli}/ubah', [Cpembeli::class, 'ubah'])->name('pembeli.ubah');
    Route::put('/pembeli/{id_pembeli}/update', [Cpembeli::class, 'update'])->name('pembeli.update');
    Route::delete('/pembeli/{id_pembeli}/hapus', [Cpembeli::class], 'hapus')->name('pembeli.hapus');
    //akses tampil admin
    route::middleware(['cek_level:admin'])->group(function () {

        route::get('/admin', [Cadmin::class, 'index'])->name('admin.index');
        route::post('/admin', [Cadmin::class, 'adminregister_proses'])->name('adminregister_proses');
        route::get('/admin/tambah', [Cadmin::class, 'tambah'])->name('admin.tambah');
        route::get('/admin/user/{id}/edit', [Cadmin::class, 'edit'])->name('admin.edit');
        route::put('/admin/user/{id}/update', [Cadmin::class, 'update'])->name('admin.update');
        route::delete('/admin/user/{id}/delete', [Cadmin::class, 'delete'])->name('admin.delete');
    });
//rute logout|keluar
route::get('/logout', [Clogin::class, 'logout'])->name('logout');
});