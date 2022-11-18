<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ========================== Category ==========================
Route::group(['prefix' => 'countries'], function(){
    Route::get('', [Category::class, 'index'])->name('category.index')->middleware('rp:user');
    Route::get('create', [Category::class, 'create'])->name('category.create')->middleware('rp:admin');
    Route::post('store', [Category::class, 'store'])->name('category.store')->middleware('rp:admin');
    Route::get('edit/{category}', [Category::class, 'edit'])->name('category.edit')->middleware('rp:admin');
    Route::put('update/{category}', [Category::class, 'update'])->name('category.update')->middleware('rp:admin');
    Route::post('delete/{category}', [Category::class, 'destroy'])->name('category.destroy')->middleware('rp:admin');
    Route::get('show/{category}', [Category::class, 'show'])->name('category.show')->middleware('rp:user');
 });

// ========================== Book ==========================
 Route::prefix('books')->controller(Book::class)->group(function(){
    Route::get('', 'index')->name('book.index')->middleware('rp:user');
    Route::get('create', 'create')->name('book.create')->middleware('rp:admin');
    Route::post('store', 'store')->name('book.store')->middleware('rp:admin');
    Route::get('edit/{book}', 'edit')->name('book.edit')->middleware('rp:admin');
    Route::put('update/{book}', 'update')->name('book.update')->middleware('rp:admin');
    Route::post('delete/{book}', 'destroy')->name('book.destroy')->middleware('rp:admin');
    Route::get('show/{book}', 'show')->name('book.show')->middleware('rp:user');
    Route::put('delete-picture/{book}', 'deletePicture')->name('books.delete-picture')->middleware('rp:admin');
 });


 // ========================== Reservation ==========================

    Route::prefix('reservations')->controller(ReservationController::class)->name('reservation.')->group(function () {
        Route::get('', 'index')->name('index')->middleware('rp:admin');
        Route::post('add', 'add')->name('add');
        Route::post('delete/{reservation}', 'destroy')->name('destroy')->middleware('rp:admin');
        Route::put('status/{reservation}', 'setStatus')->name('status')->middleware('rp:admin');
        Route::get('show','showMyReservations')->name('show');

    });
