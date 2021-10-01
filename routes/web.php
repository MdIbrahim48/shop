<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CommentController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\DivisionController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SocialIconController;
use App\Http\Controllers\Backend\SubsCriptionController;
use App\Http\Controllers\Backend\NotificationController;
use App\Http\Controllers\Backend\ReplyController;
use App\Http\Controllers\Backend\ReviewController as BackendReviews;

use App\Http\Controllers\Frontend\WebsiteController;
use App\Http\Controllers\Frontend\AddToCartController;
use App\Http\Controllers\Frontend\CustomerLoginController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\SingleCartController;
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


Route::resource('/login', LoginController::class)->only(['index', 'store']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'customer', 'middleware' => ['auth' => 'customer']], function () {

});
Route::group(['prefix' => 'backend', 'middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('backend.dashboard');
    })->name('dashboard');
    // Category
    Route::resource('categories', CategoryController::class);
    Route::get('/category/{id}', [CategoryController::class, 'status'])->name('category.status');

    // Sub Category
    Route::resource('subCategories', SubCategoryController::class);

    // Brands
    Route::resource('brands', BrandController::class);
    Route::get('/brand/{id}', [BrandController::class, 'status'])->name('brand.status');

    // Products
    Route::resource('products', ProductController::class);
    //Route::get('get-subcategory/{category_id}',[ProductController::class,'subcategory']);

    // Setting
    Route::resource('settings', SettingController::class);

    // Social Icon
    Route::resource('socialIcon', SocialIconController::class);
    Route::get('/social-icon/{id}', [SocialIconController::class, 'status'])->name('socialicon.status');

    // reviews
    Route::resource('reting', BackendReviews::class);
    Route::get('/review/{id}', [BackendReviews::class, 'status'])->name('review.status');

    // replies
    Route::resource('reply', ReplyController::class);
    Route::get('replies/{id}',[ReplyController::class, 'replies'])->name('replies');
    // comments
    Route::resource('comments', CommentController::class);
    Route::get('comment-status/{id}',[CommentController::class,'status'])->name('comment.status');

    // Division
    Route::resource('divisions',DivisionController::class);
    Route::resource('districts',DistrictController::class);


});
Route::group(['prefix' => 'customer', 'middleware' => ['customer']], function () {

});
// frontend
Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/single-shop/{slug}', [WebsiteController::class, 'singleShop'])->name('single.shop');
//  category
Route::get('/category/{slug}', [WebsiteController::class, 'category'])->name('category');
//  category item
Route::get('/category-item/{slug}', [WebsiteController::class, 'subCategoryItem'])->name('category.item');
//  single Cart
Route::get('/single-cart/{id}', [SingleCartController::class, 'singleCart'])->name('single.cart');
//  add To Cart
Route::get('/add-cart', [AddToCartController::class, 'addToCart'])->name('add.cart');
// show cart
Route::get('/show-cart', [AddToCartController::class, 'showCart'])->name('show.cart');

// update to cart
//Route::post('/update-to-cart', [AddToCartController::class, 'updatetocart'])->name('updatetocart');


//  customer login
Route::resource('customer', CustomerLoginController::class);
Route::post('/customer-login', [CustomerLoginController::class, 'customerLogin'])->name('customer.login');

// search
Route::post('/search', [WebsiteController::class, 'search'])->name('search');

// subscription
Route::resource('subscribe', SubsCriptionController::class)->only(['index', 'store']);
Route::get('notification', [NotificationController::class, 'checkNotification'])->name('check.notification');

// review
Route::resource('reviews', ReviewController::class);
