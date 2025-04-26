<?php

use App\Http\Controllers\ProfileController; //we created a home controller
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;


use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'show']
// function () {
//     return view('welcome');
// }
);

Route::get('/dashboard', [UserController::class, 'show_logged'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('book_search', [BookController::class, 'book_search'])->middleware(['auth', 'find']); //check if the user is admin

Route::get('findbook', [BookController::class, 'findbook']); //if the user is admin

Route::get('/book_det/{id}', [BookController::class, 'book_details'])->name('book_det');
