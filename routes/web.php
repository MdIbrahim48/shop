<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SocialIconController;
use App\Http\Controllers\Backend\SubsCriptionController;
use App\Http\Controllers\Backend\NotificationController;
use App\Http\Controllers\Frontend\WebsiteController;
use App\Http\Controllers\Frontend\AddToCartController;
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

Route::group(['prefix'=>'backend'],function(){
    Route::get('/', function () {
        return view('backend.dashboard');
    })->name('dashboard');
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
    Route::get('/social-icon/{id}',[SocialIconController::class,'status'])->name('socialicon.status');
    
});

// frontend
 Route::get('/',[WebsiteController::class,'index']);
 Route::get('/single-shop/{slug}',[WebsiteController::class,'singleShop'])->name('single.shop');
//  category
 Route::get('/category/{slug}',[WebsiteController::class,'category'])->name('category');
 //  category item
 Route::get('/category-item/{slug}',[WebsiteController::class,'subCategoryItem'])->name('category.item');
 //  add To Cart
 Route::POST('/add-cart',[AddToCartController::class,'addToCart'])->name('add.cart');

// search
 Route::post('/search',[WebsiteController::class,'search'])->name('search');

// subscription
Route::resource('subscribe',SubsCriptionController::class)->only(['index','store']);
Route::get('notification',[NotificationController::class,'checkNotification'])->name('check.notification');