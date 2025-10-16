<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\search;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//language
Route::get('/lang/{locale}',[LangController::class,'SetLang'] )->name('lang');
// Authentication Routes
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
// main page
Route::get('/',[FirstController::class,'MainPage']);
// category
Route::get('/category', [FirstController::class,'GetAllCategoriesWithProduct']);

// product and addproduct and story
Route::get('/product/{cat_id?}',[ProductController::class,'Products'] )->name('product');
Route::get('/showproduct/{pro_id}',[ProductController::class,'ShowProduct']);
Route::post('/search',[ProductController::class,'SearchProduct']);


//product table

// cart
Route::get('/cart',[CartController::class,'CartPage'] )->middleware('auth');
Route::get('/addtocart/{pro_id}',[CartController::class,'AddToCart'] )->middleware('auth');
Route::get('/removecart/{cart_id?}',[CartController::class,'RemoveCart'] )->middleware('auth');
Route::post('/updatecart/{cart_id}',[CartController::class,'UpdateCart'] )->middleware('auth');
Route::get('/completeorder',[CartController::class,'CompleteOrder'] )->middleware('auth');
Route::post('/storeorder',[CartController::class,'StoreOrder'] )->middleware('auth');
Route::get('/myorders',[CartController::class,'MyOrders'] )->middleware('auth');
route::get('/coupons',[FirstController::class,'Coupons'])->middleware('auth')->name('apply.coupons');

//reviews
Route::get('/reviews',[ReviewController::class,'AllReviews'] );
Route::post('/storereview',[ReviewController::class,'StoreReview'] );






