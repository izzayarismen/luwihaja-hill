<?php

use App\Http\Controllers\AkomodasiController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [WebController::class, 'beranda']);
Route::get('/tentang-kami', [WebController::class, 'tentang_kami']);
Route::resource('/akomodasi', AkomodasiController::class);
Route::get('/booking', function() {
    return view('booking', [
            'active' => 'booking',
        ]);
});

Route::get('/admin', function() {
    return view('admin/index', [
            'active' => 'admin',
        ]);
});


Route::get('/admin/produk', function() {
    return view('admin/produk', [
            'active' => 'admin',
        ]);
});

Route::get('/admin/verifikasi', function() {
    return view('admin/verifikasi', [
            'active' => 'admin',
        ]);
});

Route::get('/admin/booking', function() {
    return view('admin/booking', [
            'active' => 'admin',
        ]);
});


Route::resource('/admin/faq-ulasan', FaqController::class);
