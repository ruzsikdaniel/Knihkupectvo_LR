<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::get('/', [UserController::class, 'show'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('cart', [CartController::class, 'show'])->name('cart');

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');

Route::post('/cart/update', [CartController::class, 'updateQuantity'])->name('cart.update');

Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/checkout/customer-info', [CheckoutController::class, 'customer_info'])->name('checkout.customer-info');

Route::post('/checkout/customer-info', [CheckoutController::class, 'storeCustomerInfo'])->name('checkout.customer.store');

Route::get('/checkout/delivery', [CheckoutController::class, 'delivery'])->name('checkout.delivery');

Route::post('/checkout/delivery', [CheckoutController::class, 'storeDeliveryInfo'])->name('checkout.delivery.store');

Route::get('/checkout/payment', [CheckoutController::class, 'payment'])->name('checkout.payment');

Route::post('/checkout/payment', [CheckoutController::class, 'processPayment'])->name('checkout.payment.process');


Route::get('book_search', [BookController::class, 'book_search'])->middleware(['find']); //check if the user is admin

Route::get('admin/book_search', [BookController::class, 'book_search'])->middleware(['find']); //check if the user is admin

Route::get('/findbook/{id}', [BookController::class, 'findbook']); //if the user is admin

Route::get('/book_details/{id}', [BookController::class, 'book_details'])->name('book_details');

Route::get('admin_book_det/{id}', [BookController::class, 'admin_book_details'])->name('admin_book_det');

Route::get('/category_details/{name}', [BookController::class, 'category'])->name('category_details'); //get the category details

Route::get('/category_details_log/{name}', [BookController::class, 'category_log'])->name('category_details_log'); //get the category details for logged user

Route::get('/category_details_admin/{name}', [BookController::class, 'category_admin'])->name('category_details_admin'); //get the category details

