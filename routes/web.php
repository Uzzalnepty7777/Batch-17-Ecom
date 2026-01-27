<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

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

//Admin login
Route::get('/admin/login',[AuthController::class, 'adminLoginForm']);

Auth::routes(); 

Route::get('/admin/dashboard',[AdminController::class, 'adminDashboard']);

// Category Routes...
Route::get('/admin/create/category',[CategoryController::class, 'createCategory']);
Route::post('/admin/store/category',[CategoryController::class, 'storeCategory']);
Route::get('/admin/list/category',[CategoryController::class, 'listCategory']);
Route::get('/admin/delete/category/{id}',[CategoryController::class, 'deleteCategory']);
Route::get('/admin/edit/category/{id}',[CategoryController::class, 'editCategory']);
Route::post('/admin/update/category/{id}',[CategoryController::class, 'updateCategory']);

// Sub Category Routes...
Route::get('/admin/create/sub-category',[SubCategoryController::class, 'createSubCategory']);
Route::post('/admin/store/sub-category',[SubCategoryController::class, 'storeSubCategory']);
Route::get('/admin/list/sub-category',[SubCategoryController::class, 'listSubCategory']);
Route::get('/admin/delete/sub-category/{id}',[SubCategoryController::class, 'deleteSubCategory']);
Route::get('/admin/edit/sub-category/{id}',[SubCategoryController::class, 'editSubCategory']);
Route::post('/admin/update/sub-category/{id}',[SubCategoryController::class, 'updateSubCategory']);

// Product Routes...
Route::get('admin/create/product', [ProductController::class, 'createProduct']);
Route::post('admin/store/product', [ProductController::class, 'storeProduct']);
Route::get('admin/list/product', [ProductController::class, 'listProduct']);

