<?php

use App\Http\Controllers\AkomodasiController;
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


Route::get('/', function (){
    return view('index', [
        'active' => 'index'
    ]);
});
Route::get('/tentang-kami', function (){
    return view('tentang-kami', [
        'active' => 'tentang-kami'
    ]);
});

// Route::get('/akomodasi', function (){
//     return view('akomodasi', [
//         'active' => 'akomodasi'
//     ]);
// });

// Route::get('/akomodasi/{id}', function (){
//     return view('detail-akomodasi', [
//         'active' => 'akomodasi'
//     ]);
// });

Route::resource('/akomodasi', AkomodasiController::class);
