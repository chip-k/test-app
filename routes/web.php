<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookCommentController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\BookmarkController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('book', BookController::class)->except(['index', 'bookmark_books']);
    Route::resource('book_comment', BookCommentController::class);
    Route::get('my_page', [MyPageController::class, 'index'])->name('my_page.index');
    Route::post('book/{book}/bookmark', [BookmarkController::class, 'store'])->name('bookmark.store');
    Route::delete('book/{book}/unbookmark', [BookmarkController::class, 'destroy'])->name('bookmark.destroy');
    Route::get('bookmark', [BookController::class, 'bookmark_books'])->name('bookmark');
});

require __DIR__.'/auth.php';

Route::resource('book', BookController::class)->only(['index']);