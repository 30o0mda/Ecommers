<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $result = DB::table('categories')->get();
    return view('welcome',['categories'=>$result]);
});

Route::get('/product/{category}', function ($category = null) {
    if($category == null){
        $result = DB::table('products')->get();
    }else{
        $result = DB::table('products')->where('category_id','=',$category)->get();
    }
    return view('product',['products'=>$result]);
});
