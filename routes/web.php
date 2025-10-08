<?php

use App\Http\Controllers\FirstController;
use App\Http\Controllers\HomeController;
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

Route::get('/dashbord',function(){
    return view('dashbord.test');
});
// Authentication Routes
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
// main page
Route::get('/',[FirstController::class,'MainPage']);
// category
Route::get('/category', [FirstController::class,'GetAllCategoriesWithProduct']);

// product and addproduct and story
Route::get('/product/{cat_id?}',[ProductController::class,'Products'] )->name('product');
Route::get('/addproduct',[ProductController::class,'AddProduct']);
Route::post('/storeproduct',[ProductController::class,'StoreProduct']);
Route::get('/showproduct/{pro_id}',[ProductController::class,'ShowProduct'])->name('showproduct');
Route::post('/updateproduct',[ProductController::class,'UpdateProduct']);
Route::get('/editproduct/{pro_id?}',[ProductController::class,'EditProduct']);
Route::post('/search',[ProductController::class,'SearchProduct']);
Route::get('/removeproduct/{pro_id?}',[ProductController::class,'RemoveProduct']);
//reviews
Route::get('/reviews',[ReviewController::class,'AllReviews'] );
Route::post('/storereview',[ReviewController::class,'StoreReview'] );



