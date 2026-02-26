// Library Route
use App\Http\Controllers\LibraryController;
Route::get('/library', [LibraryController::class, 'index'])->name('library.index');
// Checkout Routes
use App\Http\Controllers\CheckoutController;
Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.show');
Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
// Cart Routes
use App\Http\Controllers\CartController;
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{bookId}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{bookId}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
// Authentication Routes
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('throttle:5,1');

// Password Reset Routes
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email')->middleware('throttle:3,1');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update')->middleware('throttle:3,1');
<?php

use Illuminate\Support\Facades\Route;


// User Interface Routes
Route::get('/', [App\Http\Controllers\BookController::class, 'index'])->name('home');
Route::get('/books', [App\Http\Controllers\BookController::class, 'list'])->name('books.list');
Route::get('/books/{id}', [App\Http\Controllers\BookController::class, 'show'])->name('books.show');
Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{slug}', [App\Http\Controllers\CategoryController::class, 'show'])->name('categories.show');
// ...existing code...

// Admin Dashboard Routes (protected by 'auth' middleware in real app)
Route::prefix('admin')->group(function () {
	Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
	Route::get('/books', [App\Http\Controllers\Admin\BookController::class, 'index'])->name('admin.books.index');
	Route::get('/books/create', [App\Http\Controllers\Admin\BookController::class, 'create'])->name('admin.books.create');
	Route::post('/books', [App\Http\Controllers\Admin\BookController::class, 'store'])->name('admin.books.store');
	Route::get('/books/{id}/edit', [App\Http\Controllers\Admin\BookController::class, 'edit'])->name('admin.books.edit');
	Route::put('/books/{id}', [App\Http\Controllers\Admin\BookController::class, 'update'])->name('admin.books.update');
	Route::delete('/books/{id}', [App\Http\Controllers\Admin\BookController::class, 'destroy'])->name('admin.books.destroy');

	Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
	Route::get('/categories', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.categories.index');
	Route::get('/reports', [App\Http\Controllers\Admin\ReportController::class, 'index'])->name('admin.reports.index');
});
