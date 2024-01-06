<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FoodController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/', [DemoController::class, 'index'])->name('index');
Route::get('/index', [DemoController::class, 'index']);
Route::get('/about', [DemoController::class, 'about']);

Route::get('/email/verify', function () {
      return view('auth.verify-email');
})
    ->middleware('auth')
    ->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/index');})
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');


Route::get('/products', [
    FoodController::class, 'showAllProducts'
])
    ->name('showAllProducts');

Route::get('/products/{id}/detail', [
    FoodController::class, 'showProduct'
])
    ->name('showProduct')
    ->middleware(['auth', 'checkCookie']);

Route::get('/products/{id}/initiate-payment', [
    FoodController::class, 'initiatePayment'
])
    ->name('product.initiatePayment')
    ->middleware(['auth', 'checkCookie']);

Route::post('/products/{foodId}/payment', [
    FoodController::class, 'processPayment'
])
    ->name('product.payment')
    ->middleware(['auth', 'checkCookie']);

Route::post('/products/{foodId}/addToCart', [
    FoodController::class, 'addToCart'
])
    ->name('product.addToCart')
    ->middleware(['auth', 'checkCookie']);

Route::get('/contact', [DemoController::class, 'contact']);
Route::get('/contact', [DemoController::class, 'contact']);

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/profile', [
    ProfileController::class, 'showProfile'
])
    ->name('profile')->middleware(['auth', 'verified']);;

Route::get('/profile/edit', [
    ProfileController::class, 'editProfile'
])
    ->name('profile.edit')
    ->middleware(['auth', 'checkCookie']);

Route::patch('/profile/update', [
    ProfileController::class, 'updateProfile'
])
    ->name('profile.update')
    ->middleware(['auth', 'checkCookie']);

Route::group(['middleware' => ['auth', 'checkAdmin']], function () {
    // Admin-only routes go here
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/addfood', [AdminController::class, 'showAddFoodForm'])->name('addFoodForm');
    Route::post('/admin/addfood', [AdminController::class, 'addFood'])->name('addFood');
    Route::get('/admin/userdetails', [AdminController::class, 'showUserDetails'])->name('showUserDetails');
    Route::delete('/admin/userdetails/delete-user/{id}', [AdminController::class, 'deleteUser'])->name('deleteUser');
});
