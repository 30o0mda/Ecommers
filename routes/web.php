<?php

use App\Http\Controllers\FirstController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Product;

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

Route::get('/',[FirstController::class,'MainPage'] );

Route::get('/product/{cat_id?}',[ProductController::class,'GetCategoryProducts'] );

Route::get('/category', [FirstController::class,'GetAllCategoriesWithProduct']);

Route::get('/addproduct',[ProductController::class,'AddProduct']);
