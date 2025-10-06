<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
     public function GetCategoryProducts($cat_id = null)
    {
        if ($cat_id == null) {
            $result = Product::get();
        } else {
            $result = Product::where('category_id', '=', $cat_id)->get();
        }
        return view('product', ['products' => $result]);
    }

    public function AddProduct()
    {
        return view('products.addproduct',[]);
    }
}
