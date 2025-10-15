<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ReviewController;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
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


Route::prefix('admin')->group(function () {
    Route::get('/users', [UserController::class, 'User'])->name('users.index');
    Route::get('/users/{id}', [UserController::class, 'Show'])->name('users.show');

});

Route::get('dashboard' ,function(){
    return view('Dashboard.master');
});
//product table
Route::get('/producttable',[ProductController::class,'ProductTable'])->name('admin.producttable');
Route::get('/addproduct',[ProductController::class,'AddProduct'])->name('admin.addproduct');
Route::get('/editproduct/{pro_id?}',[ProductController::class,'EditProduct'])->name('admin.editproduct');
Route::post('/updateproduct',[ProductController::class,'UpdateProduct']);
Route::get('/showproductadmin/{pro_id}', [ProductController::class, 'ShowProductAdmin'])->name('admin.showproduct');
Route::delete('/removeproduct/{pro_id?}',[ProductController::class,'RemoveProduct'])->name('admin.removeproduct');
Route::post('/storeproduct',[ProductController::class,'StoreProduct'])->name('admin.storeproduct');
Route::get('/addimagetoproduct/{pro_id?}',[ProductController::class,'AddImageToProduct'] )->name('admin.addimagetoproduct');
Route::post('/storeproductimage',[ProductController::class,'StoreProductImage'] )->name('admin.storeproductimage');
Route::get('/removeproductimage/{img_id?}',[ProductController::class,'RemoveProductImage'] )->name('admin.removeproductimage');

//category table
Route::get('/categorytable',[CategoryController::class,'CategoryTable'])->name('admin.categorytable');
Route::get('/addcategory',[CategoryController::class,'AddCategory'])->name('admin.addcategory');
Route::get('/editcategory/{cat_id?}',[CategoryController::class,'EditCategory'])->name('admin.editcategory');
Route::get('/showcategory/{cat_id}', [CategoryController::class, 'ShowCategory'])->name('admin.showcategory');

Route::post('/updatecategory/{cat_id}',[CategoryController::class,'UpdateCategory'])->name('admin.updatecategory');
Route::delete('/removecategory/{cat_id?}',[CategoryController::class,'RemoveCategory'])->name('admin.removecategory');
Route::post('/storecategory',[CategoryController::class,'StoreCategory'])->name('admin.storecategory');




