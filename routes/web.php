<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZverisController;
use App\Http\Controllers\CalcController;

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

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
Route::post('calc', [CalcController::class, 'do']);


Route::group(['prefix' => 'authors'], function(){
    Route::get('', [AuthorController::class, 'index'])->name('author.index');
    Route::get('create', [AuthorController::class, 'create'])->name('author.create');
    Route::post('store', [AuthorController::class, 'store'])->name('author.store');
    Route::get('edit/{author}', [AuthorController::class, 'edit'])->name('author.edit');
    Route::post('update/{author}', [AuthorController::class, 'update'])->name('author.update');
    Route::post('delete/{author}', [AuthorController::class, 'destroy'])->name('author.destroy');
    Route::get('show/{author}', [AuthorController::class, 'show'])->name('author.show');

    Route::get('pdf/{author}', [AuthorController::class, 'pdf'])->name('author.pdf');
    Route::get('mail/{author}', [AuthorController::class, 'mail'])->name('author.mail');
});


Route::group(['prefix' => 'books'], function(){
    Route::get('', [BookController::class, 'index'])->name('book.index');
    Route::get('create', [BookController::class, 'create'])->name('book.create');
    Route::post('store', [BookController::class, 'store'])->name('book.store');
    Route::get('edit/{book}', [BookController::class, 'edit'])->name('book.edit');
    Route::post('update/{book}', [BookController::class, 'update'])->name('book.update');
    Route::post('delete/{book}', [BookController::class, 'destroy'])->name('book.destroy');
    Route::get('show/{book}', [BookController::class, 'show'])->name('book.show');
 });



 
 

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
