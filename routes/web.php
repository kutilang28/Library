<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PetugasController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', function () { return view('admin'); })->middleware('checkRole:admin');
Route::resource('buku', BukuController::class)->middleware('checkRole:admin');
Route::get('/petugas', function () { return view('petugas'); })->middleware('checkRole:petugas,admin');
Route::get('/peminjam', function () { return view('peminjam'); })->middleware('checkRole:peminjam,admin');
Route::get('list', function () { return view('list'); })->middleware('checkRole:peminjam');
Route::resource('pinjam', PeminjamanController::class)->middleware('checkRole:peminjam');
Route::resource('kembali', PengembalianController::class)->middleware('checkRole:peminjam');
Route::resource('koleksi', KoleksiController::class)->middleware('checkRole:peminjam');
Route::resource('petugas', PetugasController::class)->middleware('checkRole:admin');
