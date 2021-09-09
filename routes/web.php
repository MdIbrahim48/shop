<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SocialIconController;
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
// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', function () {
    return view('backend.dashboard');
});
Route::get('/aa',function(){
    return view('frontend.shop');
});
// Category
Route::resource('categories',CategoryController::class);
Route::get('/category/{id}',[CategoryController::class,'status'])->name('category.status');

// Sub Category
Route::resource('subCategories',SubCategoryController::class);

// Brands
Route::resource('brands',BrandController::class);
Route::get('/brand/{id}',[BrandController::class,'status'])->name('brand.status');

// Products
Route::resource('products',ProductController::class);

// Setting
Route::resource('settings',SettingController::class);

// Social Icon
Route::resource('socialIcon',SocialIconController::class);

