<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\NovelController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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

Route::get('/pembeli', [PembeliController::class, 'index'])->name('pembeli.index');
Route::get('/pembeli.add', [PembeliController::class, 'create'])->name('pembeli.create');
Route::post('/pembeli.store', [PembeliController::class, 'store'])->name('pembeli.store');
Route::get('/pembeli.edit/{id}', [PembeliController::class, 'edit'])->name('pembeli.edit');
Route::post('/pembeli.update/{id}', [PembeliController::class, 'update'])->name('pembeli.update');
Route::post('/pembeli.delete/{id}', [PembeliController::class, 'delete'])->name('pembeli.delete');
Route::get('/pembeli.search', [PembeliController::class,'search'])->name('pembeli.search');

Route::get('/novel', [NovelController::class, 'index'])->name('novel.index');
Route::get('/novel.add', [NovelController::class, 'create'])->name('novel.create');
Route::post('/novel.store', [NovelController::class, 'store'])->name('novel.store');
Route::get('/novel.edit/{id}', [NovelController::class, 'edit'])->name('novel.edit');
Route::post('/novel.update/{id}', [NovelController::class, 'update'])->name('novel.update');
Route::get('/novel/restore/{id}', [NovelController::class, 'restore'])->name('novel.restore');
Route::get('/novel.search', [NovelController::class,'search'])->name('novel.search');
Route::post('/novel/softDeleted/{id}', [NovelController::class, 'softDeleted'])->name('novel.softDeleted');
Route::get('/novel/trash', [NovelController::class, 'trash'])->name('novel.trash');
Route::post('/novel/delete/{id}', [NovelController::class, 'delete'])->name('novel.delete');

Route::get('/pemesanan', [PemesananController::class, 'index'])->name('pemesanan.index');
Route::get('add', [PemesananController::class, 'create'])->name('pemesanan.create');
Route::post('store', [PemesananController::class, 'store'])->name('pemesanan.store');
Route::get('edit/{id}', [PemesananController::class, 'edit'])->name('pemesanan.edit');
Route::post('update/{id}', [PemesananController::class, 'update'])->name('pemesanan.update');
Route::post('delete/{id}', [PemesananController::class, 'delete'])->name('pemesanan.delete');
Route::get('/pemesanan.search', [PemesananController::class,'search'])->name('pemesanan.search');

Route::get('/detail', [DetailController::class, 'index'])->name('detail.index');

Route::get('/', [LoginController::class, 'index'])->name('login.index');
Route::post('/', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');