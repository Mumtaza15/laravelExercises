<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\c_buku;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function() {
    return view('welcome');
});
//Versi Terbaru
Route::get('/buku', [c_buku::class, 'index']);
Route::get('/buku/create', [c_buku::class, 'create'])->name('buku.create');
Route::post('/buku/store', [c_buku::class, 'store'])->name('buku.store');

Route::post('/buku/delete/{id}', [c_buku::class, 'destroy'])->name('buku.destroy');

Route::get('/buku/update/{id}', [c_buku::class, 'edit'])-> name('buku.edit');
Route::post('/buku/update/{id}', [c_buku::class, 'update'])->name('buku.update');

//Versi 7
// Route::get('/buku', 'c_buku@index');
// Route::get('buku/create','c_buku@create')->name('buku.create');
// Route::post('buku/create','c_buku@store')->name('buku.store');
// Route::post('buku/delete/{id}','c_buku@destroy')->name('buku.destroy');