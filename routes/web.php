<?php

use App\Http\Controllers\AkomodasiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ProfileController;
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

Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'getProfile']);
    Route::put('/profile', [ProfileController::class, 'updateProfile']);

    Route::get('/logout', [AuthController::class, 'getLogout']);

    Route::get('/booking', function() {
        return view('booking', [
                'title' => 'Booking',
            ]);
    });
});

Route::middleware('guest')->group(function () {
    // Register
    Route::get('/register', [AuthController::class, 'getRegister']);
    Route::post('/register', [AuthController::class, 'postRegister']);

    // Login
    Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'postLogin']);

});

Route::get('/', [WebController::class, 'beranda']);
Route::get('/tentang-kami', [WebController::class, 'tentang_kami']);
Route::resource('/akomodasi', AkomodasiController::class);



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
