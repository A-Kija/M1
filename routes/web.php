<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZverisController;
use App\Http\Controllers\CalcController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('rodyk-bebra', function () {
//     return 'BEBRAS';
// });

Route::get('rodyk-bebra/{page}/spalva/{color?}', [ZverisController::class, 'bebras']);

Route::get('prasau/rodyk-barsuka/{color}', [ZverisController::class, 'barsukas']);


Route::get('puslapis1', [ZverisController::class, 'p1'])->name('jonas');
Route::get('puslapis2', [ZverisController::class, 'p2'])->name('ona');


Route::get('calc', [CalcController::class, 'show'])->name('show');
Route::post('calc', [CalcController::class, 'do'])->name('do');
