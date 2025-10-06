<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FirstController extends Controller
{
    public function MainPage()
    {
        $result = Category::get();
        return view('welcome', ['categories' => $result]);
    }

    public function GetAllCategoriesWithProduct() {
    $result = Category::all();
    $result2 = Product::all();
    return view('category',['categories'=>$result , 'products'=>$result2]);
}
}
