<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZverisController;

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
