<?php

use App\Http\Controllers\authorcontroller;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\publishercontroller;
use App\Models\book;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/show/{id}', [BookController::class, 'show'])->name('book.show');
Route::get('/edit/{id}', [BookController::class, 'edit'])->name('book.edit');
Route::put('/edit/{id}', [BookController::class, 'update'])->name('book.update');
Route::get('/create', [BookController::class, 'create'])->name('create');
route::post('/create', [BookController::class, 'store'])->name('book.store');
Route::get('/dashboard', [BookController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
Route::delete('/delete/{id}', [BookController::class, 'destroy'])->name('book.destroy');



route::get('/authorr/show', [authorcontroller::class, 'index'])->name('authorr.index');
route::get('/authorr/create', [authorcontroller::class, 'create'])->name('authorr.create');
route::post('/authorr/create', [authorcontroller::class, 'store'])->name('authorr.store');
Route::get('authorr/edit/{id}', [authorcontroller::class, 'edit'])->name('authorr.edit');
Route::put('authorr/edit/{id}', [authorcontroller::class, 'update'])->name('authorr.update');
Route::delete('authorr/delete/{id}', [authorcontroller::class, 'destroy'])->name('authorr.destroy');



route::get('/publisherr/show', [publishercontroller::class, 'index'])->name('publisherr.index');
route::get('/publisherr/create', [publishercontroller::class, 'create'])->name('publisherr.create');
route::post('/publisherr/create', [publishercontroller::class, 'store'])->name('publisherr.store');
Route::get('publisherr/edit/{id}', [publishercontroller::class, 'edit'])->name('publisherr.edit');
Route::put('publisherr/edit/{id}', [publishercontroller::class, 'update'])->name('publisherr.update');
Route::delete('publisherr/delete/{id}', [publishercontroller::class, 'destroy'])->name('publisherr.destroy');

// Route::get('/', 'BookController@index');
Route::get('/search', [BookController::class, 'search'])->name('search');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
