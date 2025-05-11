<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\Root;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::get('/', [UserController::class, 'show'])->middleware(Root::class)->name('home');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/cart', [CartController::class, 'show'])
    ->name('cart');

Route::post('/cart/add', [CartController::class, 'add'])
    ->name('cart.add');

Route::post('/cart/update', [CartController::class, 'updateQuantity'])
    ->name('cart.update');

Route::post('/cart/remove', [CartController::class, 'remove'])
    ->name('cart.remove');

Route::get('/checkout/customer-info', [CheckoutController::class, 'customer_info'])
    ->name('checkout.customer-info');

Route::post('/checkout/customer-info', [CheckoutController::class, 'storeCustomerInfo'])
    ->name('checkout.customer.store');

Route::get('/checkout/delivery', [CheckoutController::class, 'delivery'])
    ->name('checkout.delivery');

Route::post('/checkout/delivery', [CheckoutController::class, 'storeDeliveryInfo'])
    ->name('checkout.delivery.store');

Route::get('/checkout/payment', [CheckoutController::class, 'payment'])
    ->name('checkout.payment');

Route::post('/checkout/payment', [CheckoutController::class, 'processPayment'])
    ->name('checkout.payment.process');

Route::get('/book_search', [BookController::class, 'book_search'])
    ->middleware(['find']);

Route::get('/admin', [AdminController::class, 'index'])
    ->middleware(['admin'])->name('admin');

Route::get('/admin/addBook', [AdminController::class, 'addBook'])
    ->middleware(['admin'])
    ->name('admin.addBook');

Route::get('/admin/book/{id}', [AdminController::class, 'book'])
    ->middleware(['admin'])
    ->name('admin.book');

Route::put('/admin/book/{id}', [AdminController::class, 'updateBook'])
    ->middleware(['admin'])
    ->name('admin.book.update');

Route::delete('/admin/book/{id}', [AdminController::class, 'deleteBook'])
    ->middleware(['admin'])
    ->name('admin.book.delete');

Route::get('/admin/book_search', [AdminController::class, 'book_search'])
    ->middleware(['admin'])
    ->name('admin.book.search'); //check if the user is admin


Route::get('/book/{id}', [BookController::class, 'book'])
    ->name('book');

Route::get('/category/{name}', [BookController::class, 'category'])
    ->name('category'); //get the category details

Route::get('/category_log/{name}', [BookController::class, 'category_log'])
    ->name('category_log'); //get the category details for logged user

Route::get('/category_admin/{name}', [BookController::class, 'category_admin'])
    ->name('category_admin'); //get the category details

