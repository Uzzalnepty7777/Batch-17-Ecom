<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index']);
Route::get('/shop', [HomeController::class, 'shop']);
Route::get('/return-process', [HomeController::class, 'returnProcess']);
Route::get('/view-cart', [HomeController::class, 'viewCart']);
Route::get('/checkout', [HomeController::class, 'checkOut']);
Route::get('/category-products', [HomeController::class, 'categoryProducts']);
Route::get('/sub-category-products', [HomeController::class, 'subCategoryProducts']);
Route::get('/product-details', [HomeController::class, 'productDetails']);
Route::get('/view-type-products', [HomeController::class, 'viewTypeProducts']);
Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy']);
Route::get('/terms-conditions', [HomeController::class, 'termsConditions']);
Route::get('/refund-policy', [HomeController::class, 'refundPolicy']);
Route::get('/payment-policy', [HomeController::class, 'paymentPolicy']);
Route::get('/about-us', [HomeController::class, 'aboutUs']);
Route::get('/contact-us', [HomeController::class, 'contactUs']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
